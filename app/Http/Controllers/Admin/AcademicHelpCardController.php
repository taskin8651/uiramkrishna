<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCoursePage;
use App\Models\AcademicHelpCard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicHelpCardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academic_help_card_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $helpCards = AcademicHelpCard::with('page')
            ->orderBy('academic_course_page_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.academic-help-cards.index', compact('helpCards'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_help_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = AcademicCoursePage::orderBy('hero_title')->pluck('hero_title', 'id');

        return view('admin.academic-help-cards.create', compact('pages'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('academic_help_card_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'academic_course_page_id' => 'required|exists:academic_course_pages,id',
            'sort_order'             => 'nullable|integer|min:0',
            'icon_class'             => 'nullable|string|max:255',
            'title'                  => 'required|string|max:255',
            'description'            => 'nullable|string',
            'status'                 => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        AcademicHelpCard::create($data);

        return redirect()
            ->route('admin.academic-help-cards.index')
            ->with('message', 'Academic help card created successfully.');
    }

    public function show(AcademicHelpCard $academicHelpCard)
    {
        abort_if(Gate::denies('academic_help_card_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicHelpCard->load('page');

        return view('admin.academic-help-cards.show', compact('academicHelpCard'));
    }

    public function edit(AcademicHelpCard $academicHelpCard)
    {
        abort_if(Gate::denies('academic_help_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = AcademicCoursePage::orderBy('hero_title')->pluck('hero_title', 'id');

        return view('admin.academic-help-cards.edit', compact('academicHelpCard', 'pages'));
    }

    public function update(Request $request, AcademicHelpCard $academicHelpCard)
    {
        abort_if(Gate::denies('academic_help_card_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'academic_course_page_id' => 'required|exists:academic_course_pages,id',
            'sort_order'             => 'nullable|integer|min:0',
            'icon_class'             => 'nullable|string|max:255',
            'title'                  => 'required|string|max:255',
            'description'            => 'nullable|string',
            'status'                 => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $academicHelpCard->update($data);

        return redirect()
            ->route('admin.academic-help-cards.index')
            ->with('message', 'Academic help card updated successfully.');
    }

    public function destroy(AcademicHelpCard $academicHelpCard)
    {
        abort_if(Gate::denies('academic_help_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicHelpCard->delete();

        return back()->with('message', 'Academic help card deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('academic_help_card_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AcademicHelpCard::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
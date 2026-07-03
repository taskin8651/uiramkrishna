<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCoursePage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AcademicCoursePageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academic_course_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = AcademicCoursePage::withCount(['courses', 'helpCards'])
            ->orderBy('id')
            ->get();

        return view('admin.academic-course-pages.index', compact('pages'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_course_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-course-pages.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('academic_course_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'slug'                 => 'required|string|max:255|unique:academic_course_pages,slug',
            'css_prefix'           => 'nullable|string|max:50',

            'kicker_text'          => 'nullable|string|max:255',
            'hero_title'           => 'nullable|string|max:255',
            'hero_description'     => 'nullable|string',

            'summary_label'        => 'nullable|string|max:255',
            'summary_title'        => 'nullable|string|max:255',
            'summary_description'  => 'nullable|string',

            'summary_stats'        => 'nullable|array',
            'summary_stats.*.value'=> 'nullable|string|max:100',
            'summary_stats.*.label'=> 'nullable|string|max:100',

            'note_title'           => 'nullable|string|max:255',
            'note_description'     => 'nullable|string',

            'panel_label'          => 'nullable|string|max:255',
            'panel_title'          => 'nullable|string|max:255',
            'button_text'          => 'nullable|string|max:255',
            'button_url'           => 'nullable|string|max:255',

            'table_label'          => 'nullable|string|max:255',
            'table_title'          => 'nullable|string|max:255',
            'download_button_text' => 'nullable|string|max:255',
            'download_button_url'  => 'nullable|string|max:255',

            'status'               => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $data['summary_stats'] = collect($request->summary_stats ?? [])
            ->filter(fn ($item) => filled($item['value'] ?? null) || filled($item['label'] ?? null))
            ->values()
            ->all();

        AcademicCoursePage::create($data);

        return redirect()
            ->route('admin.academic-course-pages.index')
            ->with('message', 'Academic course page created successfully.');
    }

    public function show(AcademicCoursePage $academicCoursePage)
    {
        abort_if(Gate::denies('academic_course_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicCoursePage->load(['courses', 'helpCards']);

        return view('admin.academic-course-pages.show', compact('academicCoursePage'));
    }

    public function edit(AcademicCoursePage $academicCoursePage)
    {
        abort_if(Gate::denies('academic_course_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-course-pages.edit', compact('academicCoursePage'));
    }

    public function update(Request $request, AcademicCoursePage $academicCoursePage)
    {
        abort_if(Gate::denies('academic_course_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'slug'                 => [
                'required',
                'string',
                'max:255',
                Rule::unique('academic_course_pages', 'slug')->ignore($academicCoursePage->id),
            ],
            'css_prefix'           => 'nullable|string|max:50',

            'kicker_text'          => 'nullable|string|max:255',
            'hero_title'           => 'nullable|string|max:255',
            'hero_description'     => 'nullable|string',

            'summary_label'        => 'nullable|string|max:255',
            'summary_title'        => 'nullable|string|max:255',
            'summary_description'  => 'nullable|string',

            'summary_stats'        => 'nullable|array',
            'summary_stats.*.value'=> 'nullable|string|max:100',
            'summary_stats.*.label'=> 'nullable|string|max:100',

            'note_title'           => 'nullable|string|max:255',
            'note_description'     => 'nullable|string',

            'panel_label'          => 'nullable|string|max:255',
            'panel_title'          => 'nullable|string|max:255',
            'button_text'          => 'nullable|string|max:255',
            'button_url'           => 'nullable|string|max:255',

            'table_label'          => 'nullable|string|max:255',
            'table_title'          => 'nullable|string|max:255',
            'download_button_text' => 'nullable|string|max:255',
            'download_button_url'  => 'nullable|string|max:255',

            'status'               => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $data['summary_stats'] = collect($request->summary_stats ?? [])
            ->filter(fn ($item) => filled($item['value'] ?? null) || filled($item['label'] ?? null))
            ->values()
            ->all();

        $academicCoursePage->update($data);

        return redirect()
            ->route('admin.academic-course-pages.index')
            ->with('message', 'Academic course page updated successfully.');
    }

    public function destroy(AcademicCoursePage $academicCoursePage)
    {
        abort_if(Gate::denies('academic_course_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicCoursePage->delete();

        return back()->with('message', 'Academic course page deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('academic_course_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AcademicCoursePage::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicInfoPage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AcademicInfoPageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academic_info_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicInfoPages = AcademicInfoPage::orderBy('id')->get();

        return view('admin.academic-info-pages.index', compact('academicInfoPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_info_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-info-pages.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('academic_info_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AcademicInfoPage::create($this->validatedData($request));

        return redirect()
            ->route('admin.academic-info-pages.index')
            ->with('message', 'Academic info page created successfully.');
    }

    public function edit(AcademicInfoPage $academicInfoPage)
    {
        abort_if(Gate::denies('academic_info_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.academic-info-pages.edit', compact('academicInfoPage'));
    }

    public function update(Request $request, AcademicInfoPage $academicInfoPage)
    {
        abort_if(Gate::denies('academic_info_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicInfoPage->update($this->validatedData($request, $academicInfoPage));

        return redirect()
            ->route('admin.academic-info-pages.index')
            ->with('message', 'Academic info page updated successfully.');
    }

    public function destroy(AcademicInfoPage $academicInfoPage)
    {
        abort_if(Gate::denies('academic_info_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicInfoPage->delete();

        return back()->with('message', 'Academic info page deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('academic_info_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AcademicInfoPage::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function validatedData(Request $request, ?AcademicInfoPage $academicInfoPage = null): array
    {
        $data = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('academic_info_pages', 'slug')->ignore($academicInfoPage),
            ],
            'kicker_text'             => 'nullable|string|max:255',
            'hero_title'              => 'nullable|string|max:255',
            'hero_description'        => 'nullable|string',
            'section_label'           => 'nullable|string|max:255',
            'section_title'           => 'nullable|string|max:255',
            'section_description'     => 'nullable|string',
            'cards'                   => 'nullable|array',
            'cards.*.icon'            => 'nullable|string|max:255',
            'cards.*.title'           => 'nullable|string|max:255',
            'cards.*.description'     => 'nullable|string',
            'table_rows'              => 'nullable|array',
            'table_rows.*.title'      => 'nullable|string|max:255',
            'table_rows.*.details'    => 'nullable|string',
            'status'                  => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        foreach (['cards', 'table_rows'] as $field) {
            $data[$field] = collect($data[$field] ?? [])
                ->filter(function ($row) {
                    return collect($row)->filter(fn ($value) => filled($value))->isNotEmpty();
                })
                ->values()
                ->all();
        }

        return $data;
    }
}

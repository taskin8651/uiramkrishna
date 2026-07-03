<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCourse;
use App\Models\AcademicCoursePage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicCourseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academic_course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = AcademicCourse::with('page')
            ->orderBy('academic_course_page_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.academic-courses.index', compact('courses'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = AcademicCoursePage::orderBy('hero_title')->pluck('hero_title', 'id');

        return view('admin.academic-courses.create', compact('pages'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('academic_course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'academic_course_page_id' => 'required|exists:academic_course_pages,id',
            'sort_order'             => 'nullable|integer|min:0',
            'icon_class'             => 'nullable|string|max:255',
            'stream_label'           => 'nullable|string|max:255',
            'course_name'            => 'required|string|max:255',
            'description'            => 'nullable|string',
            'duration'               => 'nullable|string|max:255',
            'eligibility'            => 'nullable|string|max:255',
            'type_label'             => 'nullable|string|max:255',
            'status'                 => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        AcademicCourse::create($data);

        return redirect()
            ->route('admin.academic-courses.index')
            ->with('message', 'Academic course created successfully.');
    }

    public function show(AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicCourse->load('page');

        return view('admin.academic-courses.show', compact('academicCourse'));
    }

    public function edit(AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = AcademicCoursePage::orderBy('hero_title')->pluck('hero_title', 'id');

        return view('admin.academic-courses.edit', compact('academicCourse', 'pages'));
    }

    public function update(Request $request, AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'academic_course_page_id' => 'required|exists:academic_course_pages,id',
            'sort_order'             => 'nullable|integer|min:0',
            'icon_class'             => 'nullable|string|max:255',
            'stream_label'           => 'nullable|string|max:255',
            'course_name'            => 'required|string|max:255',
            'description'            => 'nullable|string',
            'duration'               => 'nullable|string|max:255',
            'eligibility'            => 'nullable|string|max:255',
            'type_label'             => 'nullable|string|max:255',
            'status'                 => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $academicCourse->update($data);

        return redirect()
            ->route('admin.academic-courses.index')
            ->with('message', 'Academic course updated successfully.');
    }

    public function destroy(AcademicCourse $academicCourse)
    {
        abort_if(Gate::denies('academic_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicCourse->delete();

        return back()->with('message', 'Academic course deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('academic_course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AcademicCourse::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicCoursePage;
use App\Models\DepartmentStream;
use App\Models\StaffMember;
use App\Models\DownloadCategory;
use App\Models\DownloadItem;
use App\Models\AcademicInfoPage;

class AcademicController extends Controller
{
    public function seniorSecondary()
    {
        return $this->coursePage('senior-secondary');
    }

    public function underGraduation()
    {
        return $this->coursePage('ug');
    }

    public function postGraduate()
    {
        return $this->coursePage('pg');
    }

    public function vocational()
    {
        return $this->coursePage('vocational');
    }

    private function coursePage($slug)
    {
        $page = AcademicCoursePage::with([
                'courses' => function ($query) {
                    $query->where('status', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
                'helpCards' => function ($query) {
                    $query->where('status', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
            ])
            ->where('slug', $slug)
            ->where('status', true)
            ->first();

        return view('frontend.academics.course-page', compact('page', 'slug'));
    }

    public function departments()
    {
        $streams = DepartmentStream::with([
                'departments' => function ($query) {
                    $query->where('status', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
            ])
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.academics.departments', compact('streams'));
    }

    public function staff()
    {
        $staffMembers = StaffMember::with('department.stream')
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.academics.staff', compact('staffMembers'));
    }

    public function downloads()
    {
        $categories = DownloadCategory::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $downloads = DownloadItem::with('category')
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.academics.downloads', compact('categories', 'downloads'));
    }

    public function faculty()
{
    $staffMembers = StaffMember::with('department')
        ->active()
        ->teaching()
        ->ordered()
        ->get();

    return view('frontend.academics.faculty', compact('staffMembers'));
}

public function nonTeachingStaff()
{
    $staffMembers = StaffMember::with('department')
        ->active()
        ->nonTeaching()
        ->ordered()
        ->get();

    return view('frontend.academics.non-teaching-staff', compact('staffMembers'));
}

public function poPso()
{
    $page = AcademicInfoPage::active()
        ->where('slug', 'po-pso')
        ->first();

    return view('frontend.academics.info-page', compact('page'));
}

public function alumni()
{
    $page = AcademicInfoPage::active()
        ->where('slug', 'alumni')
        ->first();

    return view('frontend.academics.info-page', compact('page'));
}

public function academicCalendar()
{
    return $this->downloadDetail('academic-calendar');
}

public function syllabus()
{
    return $this->downloadDetail('syllabus');
}

public function prospectus()
{
    return $this->downloadDetail('prospectus');
}

public function feeStructure()
{
    return $this->downloadDetail('fee-structure');
}

public function eContent()
{
    return $this->downloadDetail('e-content');
}

private function downloadDetail($slug)
{
    $download = DownloadItem::with('category')
        ->active()
        ->where('slug', $slug)
        ->first();

    return view('frontend.academics.download-detail', compact('download', 'slug'));
}
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\QualityDocumentPage;

class QualityDocumentPageController extends Controller
{
    public function aqar()
    {
        return $this->page('aqar');
    }

    public function naac()
    {
        return $this->page('naac');
    }

    public function iqac()
    {
        return $this->page('iqac');
    }

    public function ict()
    {
        return $this->page('ict');
    }

    public function ssr()
    {
        return $this->page('ssr');
    }

    public function ncc()
    {
        return $this->page('ncc');
    }

    public function nss()
    {
        return $this->page('nss');
    }

    public function sports()
    {
        return $this->page('sports');
    }

    public function cultural()
    {
        return $this->page('cultural');
    }

    public function icc()
    {
        return $this->page('icc');
    }

    public function genderSensitization()
    {
        return $this->page('gender-sensitization');
    }

    public function placementCell()
    {
        return $this->page('placement-cell');
    }

    public function counsellingCell()
    {
        return $this->page('counselling-cell');
    }

    public function skillDevelopmentEntrepreneurshipCell()
    {
        return $this->page('skill-development-entrepreneurship-cell');
    }

    public function departmentalActivities()
    {
        return $this->page('departmental-activities');
    }

    public function webinar()
    {
        return $this->page('webinar');
    }

    public function workshopActivities()
    {
        return $this->page('workshop-activities');
    }

    public function collegeEvents()
    {
        return $this->page('college-events');
    }

    private function page($slug)
    {
        $page = QualityDocumentPage::active()
            ->where('slug', $slug)
            ->first();

        return view('frontend.quality-documents.show', compact('page', 'slug'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LearningFacility;

class LearningFacilityController extends Controller
{
    public function computerRoom()
    {
        return $this->page('computer-room');
    }

    public function eLibrary()
    {
        return $this->page('e-library');
    }

    public function library()
    {
        return $this->page('library');
    }

    public function ictTrainingCenter()
    {
        return $this->page('ict-training-center');
    }

    public function physicsLab()
    {
        return $this->page('physics-lab');
    }

    public function psychologyLab()
    {
        return $this->page('psychology-lab');
    }

    public function geographyLab()
    {
        return $this->page('geography-lab');
    }

    public function bscItLab()
    {
        return $this->page('bsc-it-lab');
    }

    public function bcaLab()
    {
        return $this->page('bca-lab');
    }

    public function zoologyLab()
    {
        return $this->page('zoology-lab');
    }

    public function botanyLab()
    {
        return $this->page('botany-lab');
    }

    public function chemistryLab()
    {
        return $this->page('chemistry-lab');
    }

    private function page($slug)
    {
        $facility = LearningFacility::active()
            ->where('slug', $slug)
            ->first();

        return view('frontend.learning.facility', compact('facility', 'slug'));
    }
}
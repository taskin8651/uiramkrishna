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

    private function page($slug)
    {
        $facility = LearningFacility::active()
            ->where('slug', $slug)
            ->first();

        return view('frontend.learning.facility', compact('facility', 'slug'));
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CampusFacility;

class CampusFacilityController extends Controller
{
    public function conferenceRoom()
    {
        return $this->facilityPage('conference-room');
    }

    public function smartRoom()
    {
        return $this->facilityPage('smart-room');
    }

    public function seminarHall()
    {
        return $this->facilityPage('seminar-hall');
    }

    public function canteen()
    {
        return $this->facilityPage('canteen');
    }

    private function facilityPage($slug)
    {
        $facility = CampusFacility::active()
            ->where('slug', $slug)
            ->first();

        return view('frontend.campus.facility', compact('facility', 'slug'));
    }
}
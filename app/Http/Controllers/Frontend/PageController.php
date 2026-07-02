<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CollegeAboutPage;

class PageController extends Controller
{
    public function about()
    {
        $about = CollegeAboutPage::where('status', true)->first();

        return view('frontend.about', compact('about'));
    }
}
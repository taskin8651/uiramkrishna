<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CollegeAboutPage;
use App\Models\CollegePrincipalMessage;

class PageController extends Controller
{
    public function about()
    {
        $about = CollegeAboutPage::where('status', true)->first();

        return view('frontend.about', compact('about'));
    }

    public function principalMessage()
    {
        $principal = CollegePrincipalMessage::where('status', true)->first();

        return view('frontend.principal-message', compact('principal'));
    }
}
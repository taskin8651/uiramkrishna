<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CollegeAboutPage;
use App\Models\CollegePrincipalMessage;
use App\Models\CollegeExPrincipal;

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

    public function exPrincipals()
{
    $exPrincipals = CollegeExPrincipal::where('status', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    return view('frontend.ex-principals', compact('exPrincipals'));
}
}
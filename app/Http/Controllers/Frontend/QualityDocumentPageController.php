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

    private function page($slug)
    {
        $page = QualityDocumentPage::active()
            ->where('slug', $slug)
            ->first();

        return view('frontend.quality-documents.show', compact('page', 'slug'));
    }
}
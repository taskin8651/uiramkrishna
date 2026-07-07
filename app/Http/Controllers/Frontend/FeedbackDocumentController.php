<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FeedbackDocument;

class FeedbackDocumentController extends Controller
{
    public function student()
    {
        return $this->show('student');
    }

    public function teacher()
    {
        return $this->show('teacher');
    }

    public function alumni()
    {
        return $this->show('alumni');
    }

    private function show(string $type)
    {
        $defaults = $this->defaults($type);
        $document = FeedbackDocument::active()->where('type', $type)->first();

        return view('frontend.feedback-document', compact('type', 'defaults', 'document'));
    }

    private function defaults(string $type): array
    {
        return [
            'student' => [
                'title' => 'Student Feedback',
                'document_title' => 'Student Feedback Form',
                'description' => 'Official Student Feedback Form of Ram Krishna Dwarika College, Patna.',
                'icon' => 'bi bi-chat-square-text-fill',
                'download_text' => 'View / Download Student Feedback',
                'iframe_title' => 'Student Feedback Form PDF',
                'url' => 'https://rkdcollegepatna.org/Downloads/Student%20Feedback%20form%20RKD.pdf',
                'confidential_text' => 'Information provided by students will be kept confidential.',
            ],
            'teacher' => [
                'title' => 'Teacher Feedback',
                'document_title' => 'Teachers Feedback Form',
                'description' => 'Official Teachers Feedback Form of Ram Krishna Dwarika College, Patna.',
                'icon' => 'bi bi-person-badge-fill',
                'download_text' => 'View / Download Teacher Feedback',
                'iframe_title' => 'Teachers Feedback Form PDF',
                'url' => 'https://rkdcollegepatna.org/Downloads/Teachers%20Feedback%20form%20RKD.pdf',
                'confidential_text' => 'Information provided by teachers will be kept confidential.',
            ],
            'alumni' => [
                'title' => 'Alumni Feedback',
                'document_title' => 'Alumni Feedback Form',
                'description' => 'Official Alumni Feedback Form of Ram Krishna Dwarika College, Patna.',
                'icon' => 'bi bi-people-fill',
                'download_text' => 'View / Download Alumni Feedback',
                'iframe_title' => 'Alumni Feedback Form PDF',
                'url' => 'https://rkdcollegepatna.org/Downloads/Alumni%20Feedback%20form%20RKD.pdf',
                'confidential_text' => 'Ram Krishna Dwarika College, Patna',
            ],
        ][$type];
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackDocument;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class FeedbackDocumentController extends Controller
{
    private array $types = [
        'student' => 'Student Feedback',
        'teacher' => 'Teacher Feedback',
        'alumni'  => 'Alumni Feedback',
    ];

    public function index()
    {
        abort_if(Gate::denies('feedback_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbackDocuments = FeedbackDocument::ordered()->get();

        return view('admin.feedback-documents.index', compact('feedbackDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('feedback_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = $this->types;

        return view('admin.feedback-documents.create', compact('types'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('feedback_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validated($request);

        $feedbackDocument = FeedbackDocument::create(collect($data)->except('file')->toArray());

        if ($request->hasFile('file')) {
            $feedbackDocument->addMediaFromRequest('file')->toMediaCollection('feedback_file');
        }

        return redirect()
            ->route('admin.feedback-documents.index')
            ->with('message', 'Feedback document created successfully.');
    }

    public function edit(FeedbackDocument $feedbackDocument)
    {
        abort_if(Gate::denies('feedback_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = $this->types;

        return view('admin.feedback-documents.edit', compact('feedbackDocument', 'types'));
    }

    public function update(Request $request, FeedbackDocument $feedbackDocument)
    {
        abort_if(Gate::denies('feedback_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validated($request, $feedbackDocument->id);

        $feedbackDocument->update(collect($data)->except('file')->toArray());

        if ($request->hasFile('file')) {
            $feedbackDocument->clearMediaCollection('feedback_file');
            $feedbackDocument->addMediaFromRequest('file')->toMediaCollection('feedback_file');
        }

        return redirect()
            ->route('admin.feedback-documents.index')
            ->with('message', 'Feedback document updated successfully.');
    }

    public function destroy(FeedbackDocument $feedbackDocument)
    {
        abort_if(Gate::denies('feedback_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbackDocument->delete();

        return back()->with('message', 'Feedback document deleted successfully.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        $data = $request->validate([
            'type' => [
                'required',
                Rule::in(array_keys($this->types)),
                Rule::unique('feedback_documents', 'type')->ignore($id),
            ],
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'file'        => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'status'      => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');
        $data['title'] = $data['title'] ?: $this->types[$data['type']];

        return $data;
    }
}

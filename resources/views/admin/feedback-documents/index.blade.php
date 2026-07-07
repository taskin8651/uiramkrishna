@extends('layouts.admin')

@section('page-title', 'Feedback Documents')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Feedback Documents</h2>
        <p class="admin-page-subtitle">Manage student, teacher and alumni feedback files.</p>
    </div>

    @can('feedback_document_create')
        <a href="{{ route('admin.feedback-documents.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Feedback
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Feedback Documents</p>
    </div>

    <div class="page-card-table">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($feedbackDocuments as $document)
                    <tr>
                        <td><span class="id-text">#{{ $document->id }}</span></td>
                        <td>{{ ucfirst($document->type) }}</td>
                        <td>
                            <p class="table-main-text">{{ $document->title }}</p>
                            <p class="table-sub-text">{{ $document->description }}</p>
                        </td>
                        <td>
                            @if($document->file_url)
                                <a href="{{ $document->file_url }}" target="_blank" class="btn-outline btn-outline-edit">
                                    <i class="fas fa-file-pdf"></i>
                                    Open
                                </a>
                            @else
                                <span style="color:#64748b;">No file</span>
                            @endif
                        </td>
                        <td>
                            @if($document->status)
                                <span style="font-size:12.5px;color:#166534;">Active</span>
                            @else
                                <span style="font-size:12.5px;color:#92400e;">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-row">
                                @can('feedback_document_edit')
                                    <a href="{{ route('admin.feedback-documents.edit', $document) }}" class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('feedback_document_delete')
                                    <form action="{{ route('admin.feedback-documents.destroy', $document) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

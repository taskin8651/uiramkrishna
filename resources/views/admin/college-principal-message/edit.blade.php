@extends('layouts.admin')

@section('page-title', 'Principal Message')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.home') }}" class="admin-back-link">
            ← Back to Dashboard
        </a>

        <h2 class="admin-page-title">
            Principal Message
        </h2>

        <p class="admin-page-subtitle">
            Manage principal profile, message content, highlight section and contact button
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.college-principal-message.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- PRINCIPAL PROFILE --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Principal Profile</p>
                    <p class="form-card-subtitle">Profile image and basic information</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="principal_image">
                        Principal Image
                    </label>

                    <input type="file"
                           name="principal_image"
                           id="principal_image"
                           class="field-input {{ $errors->has('principal_image') ? 'error' : '' }}">

                    @if($errors->has('principal_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('principal_image') }}
                        </p>
                    @else
                        <p class="field-hint">Upload jpg, jpeg, png or webp image. Max size 4MB.</p>
                    @endif

                    @if($principal->principal_image_url)
                        <div style="margin-top:14px;">
                            <img src="{{ $principal->principal_image_url }}"
                                 alt="Principal Image"
                                 style="width:170px;height:190px;object-fit:cover;border-radius:18px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="principal_label">
                        Profile Badge Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-award icon"></i>

                        <input type="text"
                               name="principal_label"
                               id="principal_label"
                               value="{{ old('principal_label', $principal->principal_label) }}"
                               placeholder="Principal"
                               class="field-input {{ $errors->has('principal_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('principal_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('principal_label') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="principal_name">
                        Principal Name
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="principal_name"
                               id="principal_name"
                               value="{{ old('principal_name', $principal->principal_name) }}"
                               placeholder="Prof. (Dr.) Diwakar Prasad"
                               class="field-input {{ $errors->has('principal_name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('principal_name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('principal_name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="principal_designation">
                        Principal Designation / Address
                    </label>

                    <textarea name="principal_designation"
                              id="principal_designation"
                              rows="4"
                              placeholder="Principal, Ram Krishna Dwarika College"
                              class="field-textarea {{ $errors->has('principal_designation') ? 'error' : '' }}">{{ old('principal_designation', $principal->principal_designation) }}</textarea>

                    <p class="field-hint">Line break ke liye &lt;br&gt; use kar sakte ho.</p>

                    @if($errors->has('principal_designation'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('principal_designation') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Profile Points
                    </label>

                    @for($i = 0; $i < 2; $i++)
                        <div class="input-icon-wrap" style="margin-bottom:10px;">
                            <i class="fas fa-check-circle icon"></i>

                            <input type="text"
                                   name="profile_points[{{ $i }}][title]"
                                   value="{{ old('profile_points.' . $i . '.title', data_get($principal->profile_points, $i . '.title')) }}"
                                   placeholder="Profile Point {{ $i + 1 }}"
                                   class="field-input">
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        {{-- MESSAGE CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>

                <div>
                    <p class="form-card-title">Principal Desk Message</p>
                    <p class="form-card-subtitle">Main message content shown on frontend</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="desk_label">
                        Desk Badge Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-left icon"></i>

                        <input type="text"
                               name="desk_label"
                               id="desk_label"
                               value="{{ old('desk_label', $principal->desk_label) }}"
                               placeholder="Principal Desk"
                               class="field-input {{ $errors->has('desk_label') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('desk_label'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('desk_label') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="greeting_title">
                        Greeting Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="greeting_title"
                               id="greeting_title"
                               value="{{ old('greeting_title', $principal->greeting_title) }}"
                               placeholder="Dear Students,"
                               class="field-input {{ $errors->has('greeting_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('greeting_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('greeting_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label">
                        Message Paragraphs
                    </label>

                    @for($i = 0; $i < 4; $i++)
                        <textarea name="message_paragraphs[]"
                                  rows="4"
                                  placeholder="Message paragraph {{ $i + 1 }}"
                                  class="field-textarea"
                                  style="margin-bottom:10px;">{{ old('message_paragraphs.' . $i, data_get($principal->message_paragraphs, $i)) }}</textarea>
                    @endfor
                </div>

            </div>
        </div>

        {{-- HIGHLIGHT BOX --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>

                <div>
                    <p class="form-card-title">Highlight Box</p>
                    <p class="form-card-subtitle">NEP or important message box</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="highlight_title">
                        Highlight Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <input type="text"
                               name="highlight_title"
                               id="highlight_title"
                               value="{{ old('highlight_title', $principal->highlight_title) }}"
                               placeholder="Committed to NEP-2020"
                               class="field-input {{ $errors->has('highlight_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('highlight_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('highlight_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="highlight_description">
                        Highlight Description
                    </label>

                    <textarea name="highlight_description"
                              id="highlight_description"
                              rows="5"
                              placeholder="Enter highlight description"
                              class="field-textarea {{ $errors->has('highlight_description') ? 'error' : '' }}">{{ old('highlight_description', $principal->highlight_description) }}</textarea>

                    @if($errors->has('highlight_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('highlight_description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- SIGNATURE AND BUTTON --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-signature"></i>
                </div>

                <div>
                    <p class="form-card-title">Signature & Button</p>
                    <p class="form-card-subtitle">Footer signature and contact button</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="signature_name">
                        Signature Name
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user-check icon"></i>

                        <input type="text"
                               name="signature_name"
                               id="signature_name"
                               value="{{ old('signature_name', $principal->signature_name) }}"
                               placeholder="Prof. (Dr.) Diwakar Prasad"
                               class="field-input {{ $errors->has('signature_name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('signature_name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('signature_name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="signature_designation">
                        Signature Designation
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <input type="text"
                               name="signature_designation"
                               id="signature_designation"
                               value="{{ old('signature_designation', $principal->signature_designation) }}"
                               placeholder="Principal, R.K.D College, Lohia Nagar Patna-20"
                               class="field-input {{ $errors->has('signature_designation') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('signature_designation'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('signature_designation') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_text">
                        Button Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_text"
                               id="button_text"
                               value="{{ old('button_text', $principal->button_text) }}"
                               placeholder="Contact Office"
                               class="field-input {{ $errors->has('button_text') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('button_text'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('button_text') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_url">
                        Button URL
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-external-link-alt icon"></i>

                        <input type="text"
                               name="button_url"
                               id="button_url"
                               value="{{ old('button_url', $principal->button_url) }}"
                               placeholder="contact.html"
                               class="field-input {{ $errors->has('button_url') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('button_url'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('button_url') }}
                        </p>
                    @endif
                </div>

                <label class="role-checkbox-item {{ old('status', $principal->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $principal->status) ? 'checked' : '' }}>

                    <div class="check-icon"></div>

                    <span class="checkbox-text">Show principal message on website</span>
                </label>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Frontend icons and design remain static. Content, button and image update dynamically.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Message
        </button>

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            Cancel
        </a>
    </div>

</form>

@endsection
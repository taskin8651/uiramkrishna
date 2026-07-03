@extends('layouts.admin')

@section('page-title', 'Edit Staff Member')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.staff-members.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Staff Member</h2>
        <p class="admin-page-subtitle">Update faculty or staff profile.</p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.staff-members.update', $staffMember) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <p class="form-card-title">Profile Details</p>
                    <p class="form-card-subtitle">Staff basic profile and image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="staff_image">Staff Image</label>

                    <input type="file"
                           name="staff_image"
                           id="staff_image"
                           class="field-input {{ $errors->has('staff_image') ? 'error' : '' }}">

                    @if($errors->has('staff_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('staff_image') }}
                        </p>
                    @else
                        <p class="field-hint">Upload new image only if you want to replace old image.</p>
                    @endif

                    @if($staffMember->staff_image_url)
                        <div style="margin-top:14px;">
                            <img src="{{ $staffMember->staff_image_url }}"
                                 alt="{{ $staffMember->name }}"
                                 style="width:120px;height:120px;object-fit:cover;border-radius:18px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="department_id">Department</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-columns icon"></i>

                        <select name="department_id"
                                id="department_id"
                                class="field-input {{ $errors->has('department_id') ? 'error' : '' }}">
                            <option value="">Select Department</option>

                            @foreach($departments as $id => $department)
                                <option value="{{ $id }}" {{ old('department_id', $staffMember->department_id) == $id ? 'selected' : '' }}>
                                    {{ $department }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($errors->has('department_id'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('department_id') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $staffMember->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="name">Name <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $staffMember->name) }}"
                               required
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="designation">Designation</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-id-badge icon"></i>

                        <input type="text"
                               name="designation"
                               id="designation"
                               value="{{ old('designation', $staffMember->designation) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="qualification">Qualification</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-graduation-cap icon"></i>

                        <input type="text"
                               name="qualification"
                               id="qualification"
                               value="{{ old('qualification', $staffMember->qualification) }}"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-address-card"></i>
                </div>

                <div>
                    <p class="form-card-title">Contact & Bio</p>
                    <p class="form-card-subtitle">Optional contact information and profile description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="email">Email</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-envelope icon"></i>

                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email', $staffMember->email) }}"
                               class="field-input {{ $errors->has('email') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('email'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="phone">Phone</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-phone icon"></i>

                        <input type="text"
                               name="phone"
                               id="phone"
                               value="{{ old('phone', $staffMember->phone) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="bio">Bio</label>

                    <textarea name="bio"
                              id="bio"
                              rows="6"
                              class="field-textarea">{{ old('bio', $staffMember->bio) }}</textarea>
                </div>

                <label class="role-checkbox-item {{ old('status', $staffMember->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $staffMember->status) ? 'checked' : '' }}>

                    <div class="check-icon"></div>
                    <span class="checkbox-text">Show on website</span>
                </label>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update
        </button>

        <a href="{{ route('admin.staff-members.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection
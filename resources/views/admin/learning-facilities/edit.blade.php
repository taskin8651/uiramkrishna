@extends('layouts.admin')

@section('page-title', 'Edit Learning Facility')

@section('content')

@php
    $featureRows = old('features', $learningFacility->features ?? []);

    for ($i = count($featureRows); $i < 4; $i++) {
        $featureRows[] = [
            'icon' => '',
            'title' => '',
            'description' => '',
        ];
    }

    $galleryRows = old('gallery_items', $learningFacility->gallery_items ?? []);

    for ($i = count($galleryRows); $i < 10; $i++) {
        $galleryRows[] = [
            'type' => 'image',
            'image_url' => '',
            'image_alt' => '',
            'title' => '',
            'size_class' => '',
            'link_url' => '',
            'icon' => '',
            'subtitle' => '',
        ];
    }

    $detailRows = old('detail_items', $learningFacility->detail_items ?? []);

    for ($i = count($detailRows); $i < 4; $i++) {
        $detailRows[] = [
            'title' => '',
            'description' => '',
        ];
    }
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.learning-facilities.index') }}" class="admin-back-link">
            ← Back to List
        </a>

        <h2 class="admin-page-title">Edit Learning Facility</h2>
        <p class="admin-page-subtitle">Update dynamic learning facility page content.</p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.learning-facilities.update', $learningFacility) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- HERO CONTENT --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>

                <div>
                    <p class="form-card-title">Hero Content</p>
                    <p class="form-card-subtitle">Top page heading and breadcrumb section</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="slug">Slug <span class="req">*</span></label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug', $learningFacility->slug) }}"
                               required
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('slug'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('slug') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="css_prefix">CSS Prefix</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-code icon"></i>

                        <input type="text"
                               name="css_prefix"
                               id="css_prefix"
                               value="{{ old('css_prefix', $learningFacility->css_prefix) }}"
                               class="field-input {{ $errors->has('css_prefix') ? 'error' : '' }}">
                    </div>

                    <p class="field-hint">Example: comp, elib, library, ict, phy, psy, geo, bsit, bca, zoo, botany, chem</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_icon">Hero Icon</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="hero_icon"
                               id="hero_icon"
                               value="{{ old('hero_icon', $learningFacility->hero_icon) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_kicker">Hero Kicker</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="hero_kicker"
                               id="hero_kicker"
                               value="{{ old('hero_kicker', $learningFacility->hero_kicker) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_title">Hero Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="hero_title"
                               id="hero_title"
                               value="{{ old('hero_title', $learningFacility->hero_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="hero_description">Hero Description</label>

                    <textarea name="hero_description"
                              id="hero_description"
                              rows="4"
                              class="field-textarea">{{ old('hero_description', $learningFacility->hero_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- MAIN IMAGE CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Image Card Content</p>
                    <p class="form-card-subtitle">Left image and facility short information</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="main_image">Main Image</label>

                    <input type="file"
                           name="main_image"
                           id="main_image"
                           class="field-input {{ $errors->has('main_image') ? 'error' : '' }}">

                    @if($errors->has('main_image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('main_image') }}
                        </p>
                    @else
                        <p class="field-hint">Upload new image only if you want to replace old image.</p>
                    @endif

                    @if($learningFacility->main_image_url)
                        <div style="margin-top:14px;">
                            <img src="{{ $learningFacility->main_image_url }}"
                                 alt="{{ $learningFacility->image_alt }}"
                                 style="width:160px;height:110px;object-fit:cover;border-radius:18px;border:1px solid #e5e7eb;">
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_badge">Image Badge</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="image_badge"
                               id="image_badge"
                               value="{{ old('image_badge', $learningFacility->image_badge) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_alt">Image Alt</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-image icon"></i>

                        <input type="text"
                               name="image_alt"
                               id="image_alt"
                               value="{{ old('image_alt', $learningFacility->image_alt) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_title">Image Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="image_title"
                               id="image_title"
                               value="{{ old('image_title', $learningFacility->image_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="image_description">Image Description</label>

                    <textarea name="image_description"
                              id="image_description"
                              rows="4"
                              class="field-textarea">{{ old('image_description', $learningFacility->image_description) }}</textarea>
                </div>

            </div>
        </div>

        {{-- RIGHT PANEL --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <div>
                    <p class="form-card-title">Right Panel Content</p>
                    <p class="form-card-subtitle">Overview heading, lead text and button</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="panel_subtitle">Panel Subtitle</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-info-circle icon"></i>

                        <input type="text"
                               name="panel_subtitle"
                               id="panel_subtitle"
                               value="{{ old('panel_subtitle', $learningFacility->panel_subtitle) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="panel_title">Panel Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="panel_title"
                               id="panel_title"
                               value="{{ old('panel_title', $learningFacility->panel_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="lead_description">Lead Description</label>

                    <textarea name="lead_description"
                              id="lead_description"
                              rows="6"
                              class="field-textarea">{{ old('lead_description', $learningFacility->lead_description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_text">Button Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="button_text"
                               id="button_text"
                               value="{{ old('button_text', $learningFacility->button_text) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_url">Button URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="button_url"
                               id="button_url"
                               value="{{ old('button_url', $learningFacility->button_url) }}"
                               class="field-input">
                    </div>
                </div>

                <label class="role-checkbox-item {{ old('button_external', $learningFacility->button_external) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="button_external"
                           value="1"
                           class="role-checkbox"
                           {{ old('button_external', $learningFacility->button_external) ? 'checked' : '' }}>

                    <div class="check-icon"></div>
                    <span class="checkbox-text">Open button in new tab</span>
                </label>

            </div>
        </div>

        {{-- FEATURES --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-th-large"></i>
                </div>

                <div>
                    <p class="form-card-title">Feature Cards</p>
                    <p class="form-card-subtitle">Facility highlight cards</p>
                </div>
            </div>

            <div class="form-card-body">

                @foreach($featureRows as $i => $feature)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">Feature {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Icon Class</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>

                                <input type="text"
                                       name="features[{{ $i }}][icon]"
                                       value="{{ data_get($feature, 'icon') }}"
                                       placeholder="bi bi-bezier2"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Title</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>

                                <input type="text"
                                       name="features[{{ $i }}][title]"
                                       value="{{ data_get($feature, 'title') }}"
                                       placeholder="Practical Experiments"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Description</label>

                            <textarea name="features[{{ $i }}][description]"
                                      rows="3"
                                      class="field-textarea">{{ data_get($feature, 'description') }}</textarea>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- GALLERY --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="form-card-title">Gallery Content</p>
                    <p class="form-card-subtitle">Gallery images and link visual cards</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="gallery_label">Gallery Label</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="gallery_label"
                               id="gallery_label"
                               value="{{ old('gallery_label', $learningFacility->gallery_label) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="gallery_title">Gallery Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="gallery_title"
                               id="gallery_title"
                               value="{{ old('gallery_title', $learningFacility->gallery_title) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="gallery_description">Gallery Description</label>

                    <textarea name="gallery_description"
                              id="gallery_description"
                              rows="4"
                              class="field-textarea">{{ old('gallery_description', $learningFacility->gallery_description) }}</textarea>
                </div>

                @foreach($galleryRows as $i => $item)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">Gallery Item {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Type</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-layer-group icon"></i>

                                <select name="gallery_items[{{ $i }}][type]" class="field-input">
                                    <option value="image" {{ data_get($item, 'type', 'image') == 'image' ? 'selected' : '' }}>
                                        Image
                                    </option>
                                    <option value="link" {{ data_get($item, 'type') == 'link' ? 'selected' : '' }}>
                                        Link Visual
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Image URL</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>

                                <input type="text"
                                       name="gallery_items[{{ $i }}][image_url]"
                                       value="{{ data_get($item, 'image_url') }}"
                                       placeholder="https://example.com/image.jpeg"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Image Alt</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-image icon"></i>

                                <input type="text"
                                       name="gallery_items[{{ $i }}][image_alt]"
                                       value="{{ data_get($item, 'image_alt') }}"
                                       placeholder="Physics Lab Image 1"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Title</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>

                                <input type="text"
                                       name="gallery_items[{{ $i }}][title]"
                                       value="{{ data_get($item, 'title') }}"
                                       placeholder="Physics Lab View"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Size Class</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-expand-arrows-alt icon"></i>

                                <select name="gallery_items[{{ $i }}][size_class]" class="field-input">
                                    <option value="" {{ data_get($item, 'size_class') == '' ? 'selected' : '' }}>Normal</option>
                                    <option value="large" {{ data_get($item, 'size_class') == 'large' ? 'selected' : '' }}>Large</option>
                                    <option value="wide" {{ data_get($item, 'size_class') == 'wide' ? 'selected' : '' }}>Wide</option>
                                </select>
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Link URL</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-link icon"></i>

                                <input type="text"
                                       name="gallery_items[{{ $i }}][link_url]"
                                       value="{{ data_get($item, 'link_url') }}"
                                       placeholder="chemistry-lab.html"
                                       class="field-input">
                            </div>

                            <p class="field-hint">Only for Link Visual type.</p>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Link Icon</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-icons icon"></i>

                                <input type="text"
                                       name="gallery_items[{{ $i }}][icon]"
                                       value="{{ data_get($item, 'icon') }}"
                                       placeholder="bi bi-flask"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Subtitle</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-align-left icon"></i>

                                <input type="text"
                                       name="gallery_items[{{ $i }}][subtitle]"
                                       value="{{ data_get($item, 'subtitle') }}"
                                       placeholder="View related science laboratory"
                                       class="field-input">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- DETAIL SECTION --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Detail / Uses Section</p>
                    <p class="form-card-subtitle">Optional section for lab uses and extra details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Detail Label</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="detail_label"
                               value="{{ old('detail_label', $learningFacility->detail_label) }}"
                               placeholder="Facility Uses"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Detail Title</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="detail_title"
                               value="{{ old('detail_title', $learningFacility->detail_title) }}"
                               placeholder="Geography Lab Uses"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Detail Button Text</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="detail_button_text"
                               value="{{ old('detail_button_text', $learningFacility->detail_button_text) }}"
                               placeholder="Psychology Lab"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Detail Button URL</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>

                        <input type="text"
                               name="detail_button_url"
                               value="{{ old('detail_button_url', $learningFacility->detail_button_url) }}"
                               placeholder="psychology-lab.html"
                               class="field-input">
                    </div>
                </div>

                @foreach($detailRows as $i => $detailItem)
                    <div style="padding:14px;border:1px solid #e5e7eb;border-radius:16px;margin-bottom:14px;">
                        <p class="field-label" style="margin-bottom:10px;">Use {{ $i + 1 }}</p>

                        <div class="field-group">
                            <label class="field-label">Title</label>

                            <div class="input-icon-wrap">
                                <i class="fas fa-heading icon"></i>

                                <input type="text"
                                       name="detail_items[{{ $i }}][title]"
                                       value="{{ data_get($detailItem, 'title') }}"
                                       placeholder="Map Practical"
                                       class="field-input">
                            </div>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Description</label>

                            <textarea name="detail_items[{{ $i }}][description]"
                                      rows="3"
                                      class="field-textarea">{{ data_get($detailItem, 'description') }}</textarea>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- STATUS --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-toggle-on"></i>
                </div>

                <div>
                    <p class="form-card-title">Publish Settings</p>
                    <p class="form-card-subtitle">Control frontend visibility</p>
                </div>
            </div>

            <div class="form-card-body">
                <label class="role-checkbox-item {{ old('status', $learningFacility->status) ? 'checked' : '' }}">
                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="role-checkbox"
                           {{ old('status', $learningFacility->status) ? 'checked' : '' }}>

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

        <a href="{{ route('admin.learning-facilities.index') }}" class="btn-ghost">
            Cancel
        </a>
    </div>
</form>

@endsection
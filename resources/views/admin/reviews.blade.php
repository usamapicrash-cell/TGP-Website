@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Reviews Page Manager</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-settings">⚙️ Page Settings</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-widget">🌐 Google Widget</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-promise">🤝 Promise CTA Bar</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-settings" role="tabpanel">
                    <form action="{{ route('admin.reviews.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">SEO & Meta Data</h6></div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Browser Title (Tag)</label>
                                <input type="text" class="form-control" name="title" value="{{ $setting->title }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="2">{{ $setting->meta_description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="2">{{ $setting->meta_keywords }}</textarea>
                            </div>

                            <hr class="my-4">

                            <div class="col-12 d-flex justify-content-between">
                                <h6 class="fw-bold text-primary mb-3">Hero Section Details</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="hero_status" {{ $setting->hero_status ? 'checked' : '' }}>
                                    <label class="form-check-label"><strong>Hero ON/OFF</strong></label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Heading (H1)</label>
                                <input type="text" class="form-control" name="hero_heading" value="{{ $setting->hero_heading }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Sub-heading (H4)</label>
                                <input type="text" class="form-control" name="hero_subheading" value="{{ $setting->hero_subheading }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Hero Description Text (Editor)</label>
                                <textarea class="form-control" name="hero_description" id="editor_hero" rows="5">{{ $setting->hero_description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Side Image</label>
                                <input type="file" class="form-control" name="hero_image">
                                @if($setting->hero_image)
                                    <img src="{{ asset($setting->hero_image) }}" width="100" class="mt-2 border rounded">
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Breadform Component</label>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="breadform_status" {{ $setting->breadform_status ? 'checked' : '' }}>
                                    <label class="form-check-label">Show Breadform on Reviews Page</label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Review Section Headings</h6></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Section Sub-title (Small Text)</label>
                                <input type="text" class="form-control" name="review_heading" value="{{ $setting->review_heading }}" placeholder="e.g. Testimonials">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Short Descrption</label>
                                <input type="text" class="form-control" name="review_description" value="{{ $setting->review_description }}" placeholder="e.g. What Our Customers Say">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Update Page Settings</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-widget" role="tabpanel">
                    <form action="{{ route('admin.reviews.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Google Reviews Integration</h6></div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Embed Script / Widget Code</label>
                                <textarea class="form-control font-monospace text-info bg-dark" name="google_widget_code" rows="8" placeholder="Paste your Google Review script here...">{{ $setting->google_widget_code }}</textarea>
                                <div class="form-text mt-2">Yahan script paste karein, hum ise frontend par automatically center kar denge.</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save Widget Code</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-promise" role="tabpanel">
                    <form action="{{ route('admin.reviews.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Neighborly Promise CTA Bar</h6></div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Promise Bar Text (Use &lt;br&gt; or &lt;strong&gt; tags if needed)</label>
                                <textarea class="form-control" name="promise_text" rows="3">{{ $setting->promise_text }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">CTA Button Link</label>
                                <input type="text" class="form-control" name="promise_link" value="{{ $setting->promise_link }}" placeholder="/request-quote">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Promise Bar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor_hero');
</script>
@endsection
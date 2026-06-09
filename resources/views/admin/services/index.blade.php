@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Services Manager</h4>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-settings">⚙️ Page Settings</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-list">📋 All Services</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-add">➕ Add New Service</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-settings" role="tabpanel">
                    <form action="{{ route('admin.services.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">SEO & Meta Data</h6></div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Meta Title (Browser Tag)</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $settings->meta_title }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_desc" rows="2">{{ $settings->meta_desc }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="2">{{ $settings->meta_keywords }}</textarea>
                            </div>

                            <hr class="my-4">

                            <div class="col-12 d-flex justify-content-between">
                                <h6 class="fw-bold text-primary mb-3">Hero Section Details</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="hero_status" {{ $settings->hero_status ? 'checked' : '' }}>
                                    <label class="form-check-label"><strong>Hero ON/OFF</strong></label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Main Heading (H1)</label>
                                <input type="text" class="form-control" name="hero_h1" value="{{ $settings->hero_h1 }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Sub-heading (H4)</label>
                                <input type="text" class="form-control" name="hero_h4" value="{{ $settings->hero_h4 }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Hero Description Text</label>
                                <textarea class="form-control" name="hero_desc" id="editor1" rows="5">{{ $settings->hero_desc }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Background/Side Image</label>
                                <input type="file" class="form-control" name="hero_img">
                                @if($settings->hero_img)
                                    <img src="{{ asset($settings->hero_img) }}" width="120" class="mt-2 border rounded shadow-sm">
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Breadcrumb Form Visibility</label>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="breadform_status" {{ $settings->breadform_status ? 'checked' : '' }}>
                                    <label class="form-check-label">Show Form on Services Page</label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Services Intro Section</h6></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Intro Sub-title (Small)</label>
                                <input type="text" class="form-control" name="intro_subtitle" value="{{ $settings->intro_subtitle }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Intro Main Heading (Bold)</label>
                                <input type="text" class="form-control" name="intro_heading" value="{{ $settings->intro_heading }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Intro Main Description</label>
                                <textarea class="form-control" name="intro_main_desc" rows="2">{{ $settings->intro_main_desc }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Save Page Settings</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-list" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Image</th>
                                    <th>Service Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $s)
                                <tr>
                                    <td><span class="badge bg-label-secondary">{{ $s->order }}</span></td>
                                    <td><img src="{{ asset($s->image) }}" width="70" class="rounded shadow-sm border"></td>
                                    <td>
                                        <span class="text-primary fw-bold">{{ $s->label }}</span><br>
                                        <small class="fw-semibold">{{ $s->heading }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.services.edit', $s->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <a href="{{ route('admin.services.delete', $s->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this service?')">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="navs-add" role="tabpanel">
                    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label fw-bold">Small Label</label>
                <input type="text" name="label" class="form-control" placeholder="COMMERCIAL">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Blue Main Heading</label>
                <input type="text" name="heading" class="form-control" placeholder="Your Vision, Our Expertise..." required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label fw-bold">Display Order</label>
                <input type="number" name="order" value="0" class="form-control">
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold text-primary">Tagline (Uppercase text)</label>
                <input type="text" name="short_desc" class="form-control" placeholder="WE DO EVERYTHING IN CUSTOM GLASS!">
            </div>

            <div class="col-md-12 mb-4">
                <label class="form-label fw-bold">Main Body Description</label>
                <textarea name="full_description" class="form-control" rows="3" placeholder="Dream it, and we'll create it..."></textarea>
            </div>

            <hr class="my-3">

            <div class="col-md-6">
                <div class="p-3 border rounded bg-light mb-3">
                    <h6 class="fw-bold mb-3">⬅️ LEFT COLUMN (e.g. Finishes)</h6>
                    <div class="mb-3">
                        <label class="form-label">Column Title</label>
                        <input type="text" name="left_heading" class="form-control" placeholder="Finishes & Designs">
                    </div>
                    <div>
                        <label class="form-label">List Items (Separated by commas)</label>
                        <textarea name="items_left" class="form-control" rows="3" placeholder="Item 1, Item 2, Item 3"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-3 border rounded bg-light mb-3">
                    <h6 class="fw-bold mb-3">➡️ RIGHT COLUMN (e.g. Projects)</h6>
                    <div class="mb-3">
                        <label class="form-label">Column Title</label>
                        <input type="text" name="right_heading" class="form-control" placeholder="Unique Projects">
                    </div>
                    <div>
                        <label class="form-label">List Items (Separated by commas)</label>
                        <textarea name="items_right" class="form-control" rows="3" placeholder="Item A, Item B, Item C"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Upload Showcase Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary btn-lg px-5">🚀 Create Section</button>
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
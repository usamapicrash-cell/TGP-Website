@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Portfolio Gallery Manager</h4>

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
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-images">📸 Add Images</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-subcats">📂 Sub-Categories</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-maincats">📁 Main Categories</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-settings" role="tabpanel">
                    <form action="{{ route('admin.gallery.update') }}" method="POST" enctype="multipart/form-data">
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
                                <textarea class="form-control" name="hero_description" id="editor1" rows="5">
                                    {{ $setting->hero_description }}
                                </textarea>
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
                                    <label class="form-check-label">Show Breadform on Gallery Page</label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Portfolio Section Headings</h6></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Portfolio Sub-title (Small)</label>
                                <input type="text" class="form-control" name="portfolio_subtitle" value="{{ $setting->portfolio_subtitle }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Portfolio Main Heading (Bold)</label>
                                <input type="text" class="form-control" name="portfolio_heading" value="{{ $setting->portfolio_heading }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Update Page Settings</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-images" role="tabpanel">
                    <form action="{{ route('admin.gallery.item.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Sub-Category</label>
                                <select class="form-select" name="gallery_sub_category_id" required>
                                    <option value="">-- Select Sub-Category --</option>
                                    @foreach($subCategories as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->category->name }} > {{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Upload Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image Title/Description</label>
                                <input type="text" class="form-control" name="title" placeholder="e.g. Fogged Window Replacement" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location (Optional)</label>
                                <input type="text" class="form-control" name="location" placeholder="e.g. Hillsboro, OR">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </form>

                    <hr class="my-4">
                    
                    <h5 class="mb-3">Uploaded Images</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Sub-Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td><img src="{{ asset($item->image) }}" width="60" class="rounded"></td>
                                    <td>{{ $item->title }} <br><small class="text-muted">{{ $item->location }}</small></td>
                                    <td><span class="badge bg-info">{{ $item->subCategory->name }}</span></td>
                                    <td>
                                        <form action="{{ route('admin.gallery.item.delete', $item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="navs-subcats" role="tabpanel">
                    <form action="{{ route('admin.gallery.subcategory.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Select Main Category</label>
                                <select class="form-select" name="gallery_category_id" required>
                                    <option value="">-- Choose --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label">Sub-Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="e.g. Windows, Mirrors" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-success w-100">Add</button>
                            </div>
                        </div>
                    </form>
                    
                    <hr>
                    <ul class="list-group">
                        @foreach($subCategories as $sub)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $sub->name }}
                                <span class="badge bg-primary">Under: {{ $sub->category->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-pane fade" id="navs-maincats" role="tabpanel">
                    <form action="{{ route('admin.gallery.category.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Main Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="e.g. Residential, Commercial" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button type="submit" class="btn btn-success w-100">Add Main Category</button>
                            </div>
                        </div>
                    </form>
                    
                    <hr>
                    <ul class="list-group">
                        @foreach($categories as $cat)
                            <li class="list-group-item">{{ $cat->name }} (Slug: {{ $cat->slug }})</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
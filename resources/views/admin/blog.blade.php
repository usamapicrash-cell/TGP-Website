@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Blog Manager</h4>

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
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-posts">✍️ Add Blog Posts</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-maincats">📁 Blog Categories</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-settings" role="tabpanel">
                    <form action="{{ route('admin.blog.update') }}" method="POST" enctype="multipart/form-data">
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
                                <textarea class="form-control" name="hero_description" id="editor_hero" rows="5">
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
                                    <label class="form-check-label">Show Breadform on Blog Page</label>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Blog Section Headings</h6></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Blog Sub-title (Small Text)</label>
                                <input type="text" class="form-control" name="blog_subtitle" value="{{ $setting->blog_subtitle ?? 'Expert Insights & Updates' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Blog Main Heading (Bold)</label>
                                <input type="text" class="form-control" name="blog_heading" value="{{ $setting->blog_heading ?? 'Latest From Our Blog' }}">
                            </div>

                            <div class="col-12 mt-2">
                                <small class="text-muted"><strong>Pro-tip:</strong> "{{ $setting->meta_description ?? "Stay updated with Portland's latest glass trends, maintenance tips, and industry news." }}" ko Meta Description mein lazmi rakhein.</small>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-lg mt-3">Update Blog Settings</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-posts" role="tabpanel">
                    <form action="{{ route('admin.blog.post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Select Category</label>
                                <select class="form-select" name="blog_category_id" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Post Featured Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Blog Title</label>
                                <input type="text" class="form-control" name="title" placeholder="e.g. 5 Tips for Glass Maintenance" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Short Excerpt (Intro)</label>
                                <textarea class="form-control" name="excerpt" rows="2" placeholder="Brief summary of the post..."></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Full Blog Content</label>
                                <textarea class="form-control" name="content" id="editor_post"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Publish Post</button>
                    </form>

                    <hr class="my-4">
                    
                    <h5 class="mb-3">Recent Blog Posts</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td><img src="{{ asset($post->image) }}" width="60" class="rounded"></td>
                                    <td>{{ $post->title }}</td>
                                    <td><span class="badge bg-info">{{ $post->category->name }}</span></td>
                                    <td>
                                        <form action="{{ route('admin.blog.post.delete', $post->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="navs-maincats" role="tabpanel">
                    <form action="{{ route('admin.blog.category.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-8 mb-3">
                                <label class="form-label">Blog Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="e.g. Industry News, Maintenance Tips" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button type="submit" class="btn btn-success w-100">Add Category</button>
                            </div>
                        </div>
                    </form>
                    
                    <hr>
                    <ul class="list-group">
                        @foreach($categories as $cat)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $cat->name }}
                                <span class="badge bg-primary">{{ $cat->posts->count() }} Posts</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('editor_hero', { height: 150 });
    CKEDITOR.replace('editor_post', { height: 400 });
</script>
@endsection
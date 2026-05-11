@extends('layouts.appadmin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Edit Page: {{ $page->page_name }}</h4>

    <form action="{{ route('admin.custom-pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <h5 class="card-header border-bottom">Hero Section Settings</h5>
                    <div class="card-body pt-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Admin Page Name *</label>
                            <input type="text" name="page_name" value="{{ $page->page_name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Hero Status</label>
                            <select name="hero_status" class="form-control">
                                <option value="1" {{ $page->hero_status ? 'selected' : '' }}>Show Hero Section</option>
                                <option value="0" {{ !$page->hero_status ? 'selected' : '' }}>Hide Hero Section</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero H1</label>
                            <input type="text" name="hero_h1" value="{{ $page->hero_h1 }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero H4</label>
                            <input type="text" name="hero_h4" value="{{ $page->hero_h4 }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Description</label>
                            <textarea name="hero_desc" class="form-control" rows="2">{{ $page->hero_desc }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Background Image</label>
                            @if($page->hero_img)
                                <div class="mb-2">
                                    <img src="{{ asset($page->hero_img) }}" class="rounded border" width="100%">
                                </div>
                            @endif
                            <input type="file" name="hero_img" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header border-bottom text-primary"><i class="bx bx-search-alt-2 me-1"></i> SEO Meta Tags</h5>
                    <div class="card-body pt-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $page->meta_title }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="2">{{ $page->meta_keywords }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4">{{ $page->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="mb-0"><i class="bx bx-layer me-1"></i> Page Content Builder</h5>
                        <button type="button" id="add-section" class="btn btn-primary btn-sm">+ Add New Section</button>
                    </div>
                    <div class="card-body pt-4">
                        <div id="sections-wrapper">
                            @if($page->content_json && count($page->content_json) > 0)
                                @foreach($page->content_json as $index => $section)
                                <div class="section-item card border border-primary p-3 mb-4 shadow-none bg-label-secondary position-relative" data-index="{{ $index }}">
                                    <button type="button" class="btn-close remove-section position-absolute top-0 end-0 m-3"></button>
                                    <div class="row g-3">
                                        <div class="col-md-4 border-end">
                                            <label class="form-label fw-bold">Layout Style</label>
                                            <select name="sections[{{ $index }}][type]" class="form-control select-type bg-white" required>
                                                <option value="text_only" {{ $section['type'] == 'text_only' ? 'selected' : '' }}>Full Width Text</option>
                                                <option value="left_img_right_text" {{ $section['type'] == 'left_img_right_text' ? 'selected' : '' }}>Image Left | Text Right</option>
                                                <option value="right_img_left_text" {{ $section['type'] == 'right_img_left_text' ? 'selected' : '' }}>Text Left | Image Right</option>
                                                <option value="google_map" {{ $section['type'] == 'google_map' ? 'selected' : '' }}>Google Map / Iframe</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 content-fields">
                                            @if($section['type'] !== 'google_map')
                                                <label class="form-label small fw-bold">Heading</label>
                                                <input type="text" name="sections[{{ $index }}][heading]" value="{{ $section['heading'] ?? '' }}" class="form-control mb-2">
                                                
                                                <label class="form-label small fw-bold">Content</label>
                                                <textarea name="sections[{{ $index }}][text]" class="form-control" rows="5">{{ $section['text'] ?? '' }}</textarea>
                                            @endif

                                            @if(strpos($section['type'], 'img') !== false)
                                                <div class="mt-2">
                                                    <label class="form-label small fw-bold">Current Image</label>
                                                    @if(isset($section['image']))
                                                        <input type="hidden" name="sections[{{ $index }}][old_image]" value="{{ $section['image'] }}">
                                                        <img src="{{ asset($section['image']) }}" class="d-block mb-2 border rounded" width="80">
                                                    @endif
                                                    <input type="file" name="sections[{{ $index }}][file]" class="form-control">
                                                </div>
                                            @endif

                                            @if($section['type'] === 'google_map')
                                                <label class="form-label small fw-bold text-danger">Iframe URL</label>
                                                <input type="text" name="sections[{{ $index }}][map]" value="{{ $section['map'] ?? '' }}" class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="text-center py-5 no-section border rounded bg-light mb-3">
                                    <p class="text-muted mb-0">No sections found.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
// Yahan index count wahan se start hoga jahan purane sections khatam ho rahe hain
let sectionCount = {{ $page->content_json ? count($page->content_json) : 0 }};

document.getElementById('add-section').addEventListener('click', function() {
    const noSectionPlaceholder = document.querySelector('.no-section');
    if (noSectionPlaceholder) noSectionPlaceholder.remove();

    const wrapper = document.getElementById('sections-wrapper');
    const html = `
    <div class="section-item card border border-primary p-3 mb-4 shadow-none bg-label-secondary position-relative" data-index="${sectionCount}">
        <button type="button" class="btn-close remove-section position-absolute top-0 end-0 m-3"></button>
        <div class="row g-3">
            <div class="col-md-4 border-end">
                <label class="form-label fw-bold text-dark">Layout Style</label>
                <select name="sections[${sectionCount}][type]" class="form-control select-type bg-white" required>
                    <option value="">-- Choose Layout --</option>
                    <option value="text_only">Full Width Content (Text)</option>
                    <option value="left_img_right_text">Image Left | Text Right</option>
                    <option value="right_img_left_text">Text Left | Image Right</option>
                    <option value="google_map">Google Map / Iframe</option>
                </select>
            </div>
            <div class="col-md-8 content-fields">
                <div class="text-center py-4 text-muted small italic text-center border rounded bg-white">Select a layout</div>
            </div>
        </div>
    </div>`;
    wrapper.insertAdjacentHTML('beforeend', html);
    sectionCount++;
});

document.addEventListener('change', function(e) {
    if (e.target.classList.contains('select-type')) {
        const parent = e.target.closest('.section-item');
        const index = parent.getAttribute('data-index');
        const container = parent.querySelector('.content-fields');
        const type = e.target.value;
        let html = '';

        if (type === 'text_only' || type.includes('text')) {
            html += `<label class="form-label small fw-bold">Heading</label>
                     <input type="text" name="sections[${index}][heading]" class="form-control mb-2">
                     <label class="form-label small fw-bold">Main Content</label>
                     <textarea name="sections[${index}][text]" class="form-control" rows="5"></textarea>`;
        }
        if (type.includes('img')) {
            html += `<div class="mt-2">
                        <label class="form-label small fw-bold">Upload Image</label>
                        <input type="file" name="sections[${index}][file]" class="form-control">
                     </div>`;
        }
        if (type === 'google_map') {
            html += `<label class="form-label small fw-bold text-danger">Iframe URL</label>
                     <input type="text" name="sections[${index}][map]" class="form-control" placeholder="https://...">`;
        }
        container.innerHTML = html;
    }
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-section')) {
        if(confirm('Remove this section?')) {
            e.target.closest('.section-item').remove();
        }
    }
});
</script>

<style>
    .section-item { border-style: dashed !important; }
    .bg-label-secondary { background-color: #f8f9fa !important; }
</style>
@endsection
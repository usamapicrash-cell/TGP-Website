@extends('layouts.appadmin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Create Custom SEO Page</h4>

    <form action="{{ route('admin.custom-pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <h5 class="card-header border-bottom">Hero Section Settings</h5>
                    <div class="card-body pt-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Admin Page Name *</label>
                            <input type="text" name="page_name" class="form-control" placeholder="e.g. Services Page" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Hero Status</label>
                            <select name="hero_status" class="form-control">
                                <option value="1">Show Hero Section</option>
                                <option value="0">Hide Hero Section</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero H1 (Main Title)</label>
                            <input type="text" name="hero_h1" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero H4 (Sub Title)</label>
                            <input type="text" name="hero_h4" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Description</label>
                            <textarea name="hero_desc" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Background Image</label>
                            <input type="file" name="hero_img" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header border-bottom text-primary"><i class="bx bx-search-alt-2 me-1"></i> SEO Meta Tags</h5>
                    <div class="card-body pt-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" rows="2" placeholder="glass repair, commercial glass, etc"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                        <h5 class="mb-0"><i class="bx bx-layer me-1"></i> Page Content Builder</h5>
                        <button type="button" id="add-section" class="btn btn-primary btn-sm">
                            <i class="bx bx-plus me-1"></i> Add New Layout Section
                        </button>
                    </div>
                    <div class="card-body pt-4">
                        <div id="sections-wrapper">
                            <div class="text-center py-5 no-section border rounded bg-light mb-3">
                                <i class="bx bx-customize fs-1 text-muted mb-2"></i>
                                <p class="text-muted mb-0">No sections have been added yet.</p>
                                <small>Click the "Add New Section" button above to start building your page.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bx bx-paper-plane me-1"></i> Save & Publish Custom Page
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
let sectionCount = 0; // Tracking unique index for each section

document.getElementById('add-section').addEventListener('click', function() {
    // Remove "No section" placeholder
    const noSectionPlaceholder = document.querySelector('.no-section');
    if (noSectionPlaceholder) noSectionPlaceholder.remove();

    const wrapper = document.getElementById('sections-wrapper');
    
    // Create new section HTML with unique index
    const html = `
    <div class="section-item card border border-primary p-3 mb-4 shadow-none bg-label-secondary position-relative" data-index="${sectionCount}">
        <button type="button" class="btn-close remove-section position-absolute top-0 end-0 m-3"></button>
        <div class="row g-3">
            <div class="col-md-12">
                <span class="badge bg-primary mb-2">Section #${sectionCount + 1}</span>
            </div>
            <div class="col-md-4 border-end">
                <label class="form-label fw-bold text-dark">Layout Style</label>
                <select name="sections[${sectionCount}][type]" class="form-control select-type bg-white" required>
                    <option value="">-- Choose Layout --</option>
                    <option value="text_only">Full Width Content (Text)</option>
                    <option value="left_img_right_text">Image Left | Text Right</option>
                    <option value="right_img_left_text">Text Left | Image Right</option>
                    <option value="google_map">Google Map / Iframe</option>
                </select>
                <div class="mt-3 image-preview-container d-none text-center">
                    <small class="d-block text-muted mb-1">Image Preview</small>
                    <img src="" class="img-thumbnail" style="max-height: 100px;">
                </div>
            </div>
            <div class="col-md-8 content-fields">
                <div class="text-center py-4 text-muted small italic">
                    <i class="bx bx-mouse-alt mb-1"></i><br>Select a layout style to see fields
                </div>
            </div>
        </div>
    </div>`;

    wrapper.insertAdjacentHTML('beforeend', html);
    sectionCount++;
});

// Layout Selection Logic
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('select-type')) {
        const parent = e.target.closest('.section-item');
        const index = parent.getAttribute('data-index');
        const container = parent.querySelector('.content-fields');
        const type = e.target.value;
        let html = '';

        if (type === 'text_only' || type.includes('text')) {
            html += `<div class="mb-2">
                        <label class="form-label small fw-bold">Section Heading (Optional)</label>
                        <input type="text" name="sections[${index}][heading]" class="form-control mb-2" placeholder="Section title...">
                        <label class="form-label small fw-bold">Main Content</label>
                        <textarea name="sections[${index}][text]" class="form-control" rows="6" placeholder="Enter text or HTML here..."></textarea>
                     </div>`;
        }
        
        if (type.includes('img')) {
            html += `<div class="mt-2">
                        <label class="form-label small fw-bold">Upload Image</label>
                        <input type="file" name="sections[${index}][file]" class="form-control">
                        <p class="text-muted small mt-1">Preferable size: 800x600px</p>
                     </div>`;
        }
        
        if (type === 'google_map') {
            html += `<div class="mt-2">
                        <label class="form-label small fw-bold text-danger">Google Map Iframe URL</label>
                        <input type="text" name="sections[${index}][map]" class="form-control" placeholder="https://www.google.com/maps/embed?pb=...">
                        <small class="text-muted">Google maps se embed code uthayen aur sirf 'src' wala URL paste karein.</small>
                     </div>`;
        }

        container.innerHTML = html;
    }
});

// Remove Section Logic
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-section')) {
        if(confirm('Kya aap waqai ye section remove karna chahte hain?')) {
            e.target.closest('.section-item').remove();
        }
    }
});
</script>

<style>
    .section-item { border-style: dashed !important; transition: all 0.3s ease; }
    .section-item:hover { border-style: solid !important; background-color: #fcfcfc !important; }
    .bg-label-secondary { background-color: #f8f9fa !important; }
</style>
@endsection
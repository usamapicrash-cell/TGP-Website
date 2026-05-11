@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Home Page Manager</h4>

        @if(session('success'))
            <div class="alert alert-success border-left-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs flex-wrap" role="tablist">
                    <li class="nav-item"><button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#navs-seo">🔍 SEO</button></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#navs-hero">🖼️ Hero</button></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#navs-about">📖 About</button></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#navs-service">🛠️ Services</button></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#navs-project">🏗️ Projects</button></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#navs-why">🌟 Why Choose Us</button></li>
                    <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#navs-contractor">📝 Contractor Form</button></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-seo" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">SEO Title</label>
                                <input type="text" class="form-control" name="seo_title" value="{{ $setting->seo_title ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="seo_meta_description" rows="3">{{ $setting->seo_meta_description ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <textarea class="form-control" name="seo_meta_keywords" rows="3">{{ $setting->seo_meta_keywords ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="navs-hero" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Hero Heading</label><input type="text" class="form-control" name="hero_heading" value="{{ $setting->hero_heading ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Hero Sub-heading</label><input type="text" class="form-control" name="hero_subheading" value="{{ $setting->hero_subheading ?? '' }}"></div>
                            <div class="col-md-12 mb-3"><label class="form-label">Hero Description</label><textarea class="form-control" name="hero_description" id="editor1" rows="2">{{ $setting->hero_description ?? '' }}</textarea></div>
                            
                            <div class="col-md-3 mb-3"><label class="form-label">Star Label 1</label><input type="text" class="form-control" name="hero_star_label1" value="{{ $setting->hero_star_label1 ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Star Label 2</label><input type="text" class="form-control" name="hero_star_label2" value="{{ $setting->hero_star_label2 ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Star Label 3</label><input type="text" class="form-control" name="hero_star_label3" value="{{ $setting->hero_star_label3 ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Star Label 4</label><input type="text" class="form-control" name="hero_star_label4" value="{{ $setting->hero_star_label4 ?? '' }}"></div>

                            <div class="col-md-3 mb-3"><label class="form-label">Btn 1 Text</label><input type="text" class="form-control" name="hero_btn1_text" value="{{ $setting->hero_btn1_text ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Btn 1 Link</label><input type="text" class="form-control" name="hero_btn1_link" value="{{ $setting->hero_btn1_link ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Btn 2 Text</label><input type="text" class="form-control" name="hero_btn2_text" value="{{ $setting->hero_btn2_text ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Btn 2 Link</label><input type="text" class="form-control" name="hero_btn2_link" value="{{ $setting->hero_btn2_link ?? '' }}"></div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Background Image</label>
                                <input type="file" class="form-control" name="hero_image">
                                @if(isset($setting->hero_image))<img src="{{ asset($setting->hero_image) }}" width="100" class="mt-2 rounded shadow-sm">@endif
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="navs-about" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 mb-3"><label class="form-label">About Heading</label><input type="text" class="form-control" name="about_heading" value="{{ $setting->about_heading ?? '' }}"></div>
                            <div class="col-md-12 mb-3"><label class="form-label">About Description (CKEditor)</label><textarea id="editor" name="about_description" class="form-control">{{ $setting->about_description ?? '' }}</textarea></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Image 1</label><input type="file" class="form-control" name="about_image_1">@if(isset($setting->about_image_1))<img src="{{ asset($setting->about_image_1) }}" width="80" class="mt-2 rounded">@endif</div>
                            <div class="col-md-6 mb-3"><label class="form-label">Image 2</label><input type="file" class="form-control" name="about_image_2">@if(isset($setting->about_image_2))<img src="{{ asset($setting->about_image_2) }}" width="80" class="mt-2 rounded">@endif</div>
                            
                            <div class="col-12"><hr></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Text</label><input type="text" class="form-control" name="about_cta_text" value="{{ $setting->about_cta_text ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Button Text</label><input type="text" class="form-control" name="about_cta_btn_text" value="{{ $setting->about_cta_btn_text ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Button Link</label><input type="text" class="form-control" name="about_cta_btn_link" value="{{ $setting->about_cta_btn_link ?? '' }}"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="navs-service" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 mb-3"><label class="form-label">Service Heading</label><input type="text" class="form-control" name="service_heading" value="{{ $setting->service_heading ?? '' }}"></div>
                            <div class="col-md-12 mb-3"><label class="form-label">Service Text</label><textarea class="form-control" name="service_text" rows="3">{{ $setting->service_text ?? '' }}</textarea></div>
                            
                            <div class="col-12"><hr></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Text</label><input type="text" class="form-control" name="service_cta_text" value="{{ $setting->service_cta_text ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Button Text</label><input type="text" class="form-control" name="service_cta_btn_text" value="{{ $setting->service_cta_btn_text ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Button Link</label><input type="text" class="form-control" name="service_cta_btn_link" value="{{ $setting->service_cta_btn_link ?? '' }}"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="navs-project" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12 mb-3"><label class="form-label">Project Heading</label><input type="text" class="form-control" name="project_heading" value="{{ $setting->project_heading ?? '' }}"></div>
                            <div class="col-md-12 mb-3"><label class="form-label">Project Text</label><textarea class="form-control" name="project_text" rows="3">{{ $setting->project_text ?? '' }}</textarea></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="navs-why" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Heading</label><input type="text" class="form-control" name="why_choose_heading" value="{{ $setting->why_choose_heading ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Description Text</label><input type="text" class="form-control" name="why_choose_text" value="{{ $setting->why_choose_text ?? '' }}"></div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label">Badges (Grid Items - JSON)</label>
                                <div id="badge-repeater">
                                    @if(is_array($setting->why_choose_badges))
                                        @foreach($setting->why_choose_badges as $index => $badge)
                                        <div class="row mb-2 border p-2 rounded">
                                            <div class="col-md-3"><input type="text" name="why_choose_badges[{{$index}}][title]" class="form-control" placeholder="Title" value="{{ $badge['title'] ?? '' }}"></div>
                                            <div class="col-md-6"><input type="text" name="why_choose_badges[{{$index}}][desc]" class="form-control" placeholder="Description" value="{{ $badge['desc'] ?? '' }}"></div>
                                            <div class="col-md-2"><input type="text" name="why_choose_badges[{{$index}}][icon]" class="form-control" placeholder="Icon Class" value="{{ $badge['icon'] ?? '' }}"></div>
                                            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-item">X</button></div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" id="add-badge" class="btn btn-sm btn-secondary mt-2">+ Add Badge</button>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Side/Below Image</label>
                                <input type="file" class="form-control" name="why_choose_side_image">
                                @if(isset($setting->why_choose_side_image))<img src="{{ asset($setting->why_choose_side_image) }}" width="80" class="mt-2 rounded shadow-sm">@endif
                            </div>

                            <div class="col-12"><hr></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Text</label><input type="text" class="form-control" name="why_choose_cta_text" value="{{ $setting->why_choose_cta_text ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Button Text</label><input type="text" class="form-control" name="why_choose_cta_btn_text" value="{{ $setting->why_choose_cta_btn_text ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">CTA Button Link</label><input type="text" class="form-control" name="why_choose_cta_btn_link" value="{{ $setting->why_choose_cta_btn_link ?? '' }}"></div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="navs-contractor" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-3"><label class="form-label">Heading</label><input type="text" class="form-control" name="contractor_heading" value="{{ $setting->contractor_heading ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Sub-heading</label><input type="text" class="form-control" name="contractor_subheading" value="{{ $setting->contractor_subheading ?? '' }}"></div>
                            <div class="col-md-12 mb-3"><label class="form-label">Description</label><textarea class="form-control" name="contractor_description" rows="2">{{ $setting->contractor_description ?? '' }}</textarea></div>
                            
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Bullet Points (JSON)</label>
                                <div id="bullet-repeater">
                                    @if(is_array($setting->contractor_bullets))
                                        @foreach($setting->contractor_bullets as $bullet)
                                        <div class="input-group mb-2">
                                            <input type="text" name="contractor_bullets[]" class="form-control" value="{{ $bullet }}">
                                            <button class="btn btn-outline-danger remove-item" type="button">Remove</button>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" id="add-bullet" class="btn btn-sm btn-secondary">+ Add Bullet</button>
                            </div>

                            <div class="col-md-3 mb-3"><label class="form-label">Btn 1 Text</label><input type="text" class="form-control" name="contractor_btn1_text" value="{{ $setting->contractor_btn1_text ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Btn 1 Link</label><input type="text" class="form-control" name="contractor_btn1_link" value="{{ $setting->contractor_btn1_link ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Btn 2 Text</label><input type="text" class="form-control" name="contractor_btn2_text" value="{{ $setting->contractor_btn2_text ?? '' }}"></div>
                            <div class="col-md-3 mb-3"><label class="form-label">Btn 2 Link</label><input type="text" class="form-control" name="contractor_btn2_link" value="{{ $setting->contractor_btn2_link ?? '' }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg mt-3 w-100 shadow-sm">Save All Settings</button>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');

    // Repeater for Badges
    document.getElementById('add-badge').addEventListener('click', function() {
        let container = document.getElementById('badge-repeater');
        let index = container.children.length;
        let html = `<div class="row mb-2 border p-2 rounded">
            <div class="col-md-3"><input type="text" name="why_choose_badges[${index}][title]" class="form-control" placeholder="Title"></div>
            <div class="col-md-6"><input type="text" name="why_choose_badges[${index}][desc]" class="form-control" placeholder="Description"></div>
            <div class="col-md-2"><input type="text" name="why_choose_badges[${index}][icon]" class="form-control" placeholder="Icon Class"></div>
            <div class="col-md-1"><button type="button" class="btn btn-danger btn-sm remove-item">X</button></div>
        </div>`;
        container.insertAdjacentHTML('beforeend', html);
    });

    // Repeater for Bullets
    document.getElementById('add-bullet').addEventListener('click', function() {
        let html = `<div class="input-group mb-2">
            <input type="text" name="contractor_bullets[]" class="form-control" placeholder="New Bullet Point">
            <button class="btn btn-outline-danger remove-item" type="button">Remove</button>
        </div>`;
        document.getElementById('bullet-repeater').insertAdjacentHTML('beforeend', html);
    });

    // Remove item logic
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            e.target.closest('.row, .input-group').remove();
        }
    });
</script>
@endsection
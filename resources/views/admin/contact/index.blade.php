@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Contact & Page Manager</h4>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-hero">🛡️ Hero & SEO</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-info">📞 Contact & Socials</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-areas">📍 Service Areas</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-faq">❓ FAQs</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-hero" role="tabpanel">
                    <form action="{{ route('admin.contact.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold text-primary mb-0">Hero Section Details</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_hero_visible" value="1" {{ ($setting->is_hero_visible ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label"><strong>Hero ON/OFF</strong></label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Heading (H1)</label>
                                <input type="text" class="form-control" name="hero_heading" value="{{ $setting->hero_heading ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Sub-heading</label>
                                <input type="text" class="form-control" name="hero_subheading" value="{{ $setting->hero_subheading ?? '' }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Hero Description</label>
                                <textarea class="form-control" name="hero_description" id="hero_desc" rows="3">{{ $setting->hero_description ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Hero Image</label>
                                <input type="file" class="form-control" name="hero_image">
                                @if(isset($setting->hero_image)) 
                                    <img src="{{ asset($setting->hero_image) }}" width="120" class="mt-2 rounded border shadow-sm"> 
                                @endif
                            </div>

                            <div class="col-12"><hr class="my-4"></div>
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">SEO Meta Data</h6></div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Browser Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $setting->meta_title ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="2">{{ $setting->meta_description ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="2">{{ $setting->meta_keywords ?? '' }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Update Hero & SEO</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-info" role="tabpanel">
                    <form action="{{ route('admin.contact.update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Estimate Section</h6></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Estimate Title</label>
                                <input type="text" class="form-control" name="estimate_title" value="{{ $setting->estimate_title ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Estimate Description</label>
                                <input type="text" class="form-control" name="estimate_description" value="{{ $setting->estimate_description ?? '' }}">
                            </div>

                            <div class="col-12"><hr class="my-3"></div>
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Contact Details</h6></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Phone</label><input type="text" class="form-control" name="phone" value="{{ $setting->phone ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">WhatsApp</label><input type="text" class="form-control" name="whatsapp" value="{{ $setting->whatsapp ?? '' }}"></div>
                            <div class="col-md-4 mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="{{ $setting->email ?? '' }}"></div>
                            <div class="col-md-12 mb-3"><label class="form-label">Full Address</label><input type="text" class="form-control" name="address" value="{{ $setting->address ?? '' }}"></div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Google Map Iframe Link (URL Only)</label>
                                <textarea class="form-control" name="map_iframe" rows="2">{{ $setting->map_iframe ?? '' }}</textarea>
                            </div>

                            <div class="col-12"><hr class="my-3"></div>
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Social Media & Footer</h6></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Facebook URL</label><input type="text" class="form-control" name="facebook" value="{{ $setting->facebook ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Instagram URL</label><input type="text" class="form-control" name="instagram" value="{{ $setting->instagram ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Twitter/X URL</label><input type="text" class="form-control" name="twitter" value="{{ $setting->twitter ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Linkedin URL</label><input type="text" class="form-control" name="linkedin" value="{{ $setting->linkedin ?? '' }}"></div>
                            <div class="col-md-6 mb-3"><label class="form-label">Telegram URL</label><input type="text" class="form-control" name="telegram" value="{{ $setting->telegram ?? '' }}"></div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Social Follow Text</label>
                                <input type="text" class="form-control" name="social_follow_text" value="{{ $setting->social_follow_text ?? '' }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Footer Short Description</label>
                                <textarea class="form-control" name="footer_short_desc" rows="3">{{ $setting->footer_short_desc ?? '' }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Save All Info</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="navs-areas" role="tabpanel">
                    <form action="{{ route('admin.contact.update') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3">Service Area Page & Footer Content</h6></div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Service Area Title (Heading)</label>
                                <input type="text" name="service_area_title" class="form-control" value="{{ $setting->service_area_title ?? '' }}" placeholder="Proudly Serving the Greater Portland Area">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Service Area Paragraph</label>
                                <input type="text" name="service_area_para" class="form-control" value="{{ $setting->service_area_para ?? '' }}" placeholder="Service ki head aur para">
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label">Footer Service Area Description (Long Text)</label>
                                <textarea name="service_area_footer_text" class="form-control" rows="3">{{ $setting->service_area_footer_text ?? '' }}</textarea>
                            </div>
                            
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-primary">Update Service Area Content</button>
                            </div>
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-md-5 border-end">
                            <h6 class="fw-bold mb-3">📍 Add New City/Area</h6>
                            <form action="{{ route('admin.contact.service_area.store') }}" method="POST" class="bg-light p-3 rounded border">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">City/Area Name</label>
                                    <input type="text" name="city_name" class="form-control" placeholder="e.g. Portland" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Add City</button>
                            </form>
                        </div>
                        
                        <div class="col-md-7">
                            <h6 class="fw-bold mb-3">Current Service Locations</h6>
                            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>City Name</th>
                                            <th width="100">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($areas as $area)
                                        <tr>
                                            <td>{{ $area->city_name }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.contact.service_area.delete', $area->id) }}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete karein?')">❌</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="2" class="text-center">No cities added yet.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="navs-faq" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h6 class="fw-bold text-primary">Add New FAQ</h6>
                            <form action="{{ route('admin.contact.faq.store') }}" method="POST" class="bg-light p-3 rounded border">
                                @csrf
                                <div class="mb-3"><label class="form-label">Question</label><input type="text" name="question" class="form-control" required></div>
                                <div class="mb-3"><label class="form-label">Answer</label><textarea name="answer" class="form-control" rows="3" required></textarea></div>
                                <button type="submit" class="btn btn-success">Add FAQ</button>
                            </form>
                        </div>
                        <div class="col-12">
                            <h6 class="fw-bold">Existing FAQs</h6>
                            @forelse($faqs as $faq)
                            <div class="card mb-2 shadow-none border">
                                <div class="card-body py-2 d-flex justify-content-between align-items-center">
                                    <div><strong>Q:</strong> {{ $faq->question }}</div>
                                    <form action="{{ route('admin.contact.faq.delete', $faq->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm text-danger border-0">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @empty
                            <p class="text-center text-muted">No FAQs found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('hero_desc', { height: 150 });
</script>
@endsection
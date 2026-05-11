@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> About Page Manager</h4>

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
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-story">📖 Our Story</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-checklists">✅ Checklists & CTA</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-team">👥 Team Section</button>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-settings" role="tabpanel">
          <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12"><h6 class="fw-bold text-primary mb-3">SEO & Meta Data</h6></div>

              <div class="col-md-12 mb-3">
                <label class="form-label">Browser Title (Tag)</label>
                <input type="text" name="meta_title" class="form-control" value="{{ $about->meta_title ?? '' }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2">{{ $about->meta_description ?? '' }}</textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control" rows="2">{{ $about->meta_keywords ?? '' }}</textarea>
              </div>

              <hr class="my-4">

              <div class="col-12 d-flex justify-content-between align-items-center">
                <h6 class="fw-bold text-primary mb-3">Hero Section Details</h6>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="hero_status" {{ ($about->hero_status ?? false) ? 'checked' : '' }}>
                  <label class="form-check-label"><strong>Hero ON/OFF</strong></label>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Hero Heading (H1)</label>
                <input type="text" name="hero_h1" class="form-control" value="{{ $about->hero_h1 ?? '' }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Hero Sub-heading (H4)</label>
                <input type="text" name="hero_h4" class="form-control" value="{{ $about->hero_h4 ?? '' }}">
              </div>
              <div class="col-md-12 mb-3">
                <label class="form-label">Hero Description Text</label>
                <textarea name="hero_desc" class="form-control" id="editor1" rows="5">{{ $about->hero_desc ?? '' }}</textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Hero Side Image</label>
                <input type="file" name="hero_img" class="form-control">
                @if(isset($about->hero_img))
                  <img src="{{ asset($about->hero_img) }}" width="100" class="mt-2 border rounded">
                @endif
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Breadform Component</label>
                <div class="form-check form-switch mt-2">
                  <input class="form-check-input" type="checkbox" name="breadform_status" {{ ($about->breadform_status ?? false) ? 'checked' : '' }}>
                  <label class="form-check-label">Show Breadform on About Page</label>
                </div>
              </div>
            </div>
              <button type="submit" class="btn btn-primary btn-lg mt-3">Update Page Settings</button>
          </form>
        </div>

        <div class="tab-pane fade" id="navs-story" role="tabpanel">
          <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12"><h6 class="fw-bold text-primary mb-3">Our Story Section</h6></div>
              
              <div class="col-md-6 mb-3">
                <label class="form-label">Story Subtitle</label>
                <input type="text" name="story_subtitle" class="form-control" value="{{ $about->story_subtitle ?? '' }}">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Story Main Heading (H2)</label>
                <input type="text" name="story_h2" class="form-control" value="{{ $about->story_h2 ?? '' }}">
              </div>
              <div class="col-md-12 mb-3">
                <label class="form-label">Story Paragraph 1</label>
                <textarea name="story_p1" id="story_p1" class="form-control" rows="3">{{ $about->story_p1 ?? '' }}</textarea>
              </div>
              <div class="col-md-12 mb-3">
                <label class="form-label">Story Paragraph 2</label>
                <textarea name="story_p2" id="story_p2" class="form-control" rows="3">{{ $about->story_p2 ?? '' }}</textarea>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Story Side Image</label>
                <input type="file" name="story_img" class="form-control">
                @if(isset($about->story_img))
                  <img src="{{ asset($about->story_img) }}" width="100" class="mt-2 border rounded">
                @endif
              </div>
              <div class="col-md-3 mb-3">
                <label class="form-label">Stats Count</label>
                <input type="text" name="stats_count" class="form-control" value="{{ $about->stats_count ?? '' }}">
              </div>
              <div class="col-md-3 mb-3">
                <label class="form-label">Stats Label</label>
                <input type="text" name="stats_label" class="form-control" value="{{ $about->stats_label ?? '' }}">
              </div>
            </div>
              <button type="submit" class="btn btn-primary btn-lg mt-3">Update Story</button>
          </form>
        </div>

        <div class="tab-pane fade" id="navs-checklists" role="tabpanel">
          <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 border-end p-3">
                <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Checklist Left Column</h6>
                <div class="mb-3">
                  <label class="form-label">Items (Comma separated)</label>
                  <textarea name="checklist_left" class="form-control" rows="3">{{ $about->checklist_left ?? '' }}</textarea>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label class="form-label">Icon</label>
                    <input type="text" name="checklist_left_icon" class="form-control" value="{{ $about->checklist_left_icon ?? '' }}">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Icon Color</label>
                    <input type="color" name="checklist_left_color" class="form-control form-control-color w-100" value="{{ $about->checklist_left_color ?? '#2F437E' }}">
                  </div>
                </div>
              </div>

              <div class="col-md-6 p-3">
                <h6 class="fw-bold text-warning mb-3 border-bottom pb-2">Checklist Right Column</h6>
                <div class="mb-3">
                  <label class="form-label">Items (Comma separated)</label>
                  <textarea name="checklist_right" class="form-control" rows="3">{{ $about->checklist_right ?? '' }}</textarea>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label class="form-label">Icon</label>
                    <input type="text" name="checklist_right_icon" class="form-control" value="{{ $about->checklist_right_icon ?? '' }}">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Icon Color</label>
                    <input type="color" name="checklist_right_color" class="form-control form-control-color w-100" value="{{ $about->checklist_right_color ?? '#ffc107' }}">
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <div class="col-12"><h6 class="fw-bold text-primary mb-3">Call to Action & Locations</h6></div>

              <div class="col-md-4 mb-3">
                <label class="form-label">CTA Button Text</label>
                <input type="text" name="cta_text" class="form-control" value="{{ $about->cta_text ?? '' }}">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">CTA Button Link</label>
                <input type="text" name="cta_link" class="form-control" value="{{ $about->cta_link ?? '' }}">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Button Color</label>
                <input type="color" name="cta_bg_color" class="form-control form-control-color w-100" value="{{ $about->cta_bg_color ?? '#2F437E' }}">
              </div>
              <div class="col-md-12 mb-3">
                <label class="form-label">Service Locations (Pipe | separated)</label>
                <input type="text" name="service_locations" class="form-control" value="{{ $about->service_locations ?? '' }}">
              </div>

            </div>
            <button type="submit" class="btn btn-primary btn-lg mt-3">Update Checklists & CTA</button>
          </form>
        </div>

        <div class="tab-pane fade" id="navs-team" role="tabpanel">
    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Section Subtitle</label>
                <input type="text" name="team_subtitle" class="form-control" value="{{ $about->team_subtitle ?? '' }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Section Title</label>
                <input type="text" name="team_title" class="form-control" value="{{ $about->team_title ?? '' }}">
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label">Section Description</label>
                <textarea name="team_description" class="form-control" id="team_editor">{{ $about->team_description ?? '' }}</textarea>
            </div>
            
            <div class="col-md-3 mb-3">
                <label class="form-label">Stat 1 Value</label>
                <input type="text" name="team_stat_1_value" class="form-control" value="{{ $about->team_stat_1_value ?? '' }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Stat 1 Label</label>
                <input type="text" name="team_stat_1_label" class="form-control" value="{{ $about->team_stat_1_label ?? '' }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Stat 2 Value</label>
                <input type="text" name="team_stat_2_value" class="form-control" value="{{ $about->team_stat_2_value ?? '' }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Stat 2 Label</label>
                <input type="text" name="team_stat_2_label" class="form-control" value="{{ $about->team_stat_2_label ?? '' }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Save Team Headings</button>
    </form>

    <hr>

    <div class="row mt-4">
        <div class="col-md-4 border-end">
            <h6 class="fw-bold">Add New Member</h6>
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label class="form-label">Name</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Designation</label>
                    <input type="text" name="subtitle" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-2">Add Member</button>
            </form>
        </div>
        <div class="col-md-8">
            <h6 class="fw-bold">Current Members</h6>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($team as $m)
                        <tr>
                            <td><img src="{{ asset($m->image) }}" width="150" class="rounded"></td>
                            <td><strong>{{ $m->title }}</strong><br><small>{{ $m->subtitle }}</small></td>
                            <td>
                                <a href="{{ route('admin.team.delete', $m->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete karein?')">❌</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    CKEDITOR.replace('story_p1', { height: 150 });
    CKEDITOR.replace('story_p2', { height: 150 });
    // You can also apply CKEditor to team_description if needed
    CKEDITOR.replace('team_description', { height: 100 });
</script>
@endsection
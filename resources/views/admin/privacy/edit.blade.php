@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Privacy Policy Manager</h4>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Edit Privacy Policy Content</h5>
            </div>
            
            <div class="card-body mt-4">
                <form action="{{ route('admin.privacy.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="row">
                            <div class="col-12"><h6 class="fw-bold text-primary mb-3"><i class='bx bx-search-alt-2'></i> SEO & Meta Data</h6></div>
                            
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-semibold">Browser Title (Tag)</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $privacy->meta_title ?? $term->meta_title ?? '' }}" placeholder="Search Engine Title">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="2" placeholder="Brief summary for search results...">{{ $privacy->meta_description ?? $term->meta_description ?? '' }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Meta Keywords</label>
                                <textarea class="form-control" name="meta_keywords" rows="2" placeholder="e.g. privacy, terms, legal, policy">{{ $privacy->meta_keywords ?? $term->meta_keywords ?? '' }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Main Heading (H1)</label>
                            <input type="text" class="form-control" name="heading_1" value="{{ $privacy->heading_1 ?? '' }}" placeholder="e.g. Privacy Policy">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Sub Heading (H2)</label>
                            <input type="text" class="form-control" name="heading_2" value="{{ $privacy->heading_2 ?? '' }}" placeholder="e.g. How we handle your data">
                        </div>

                        <div class="col-12 mb-4">
                            <label class="form-label fw-semibold">Detail Description</label>
                            <textarea class="form-control" name="description" id="editor1" rows="12" placeholder="Write your privacy policy details here...">{{ $privacy->description ?? '' }}</textarea>
                            <div class="form-text">You can use an HTML editor here for formatting lists, bold text, and links.</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-primary btn-lg shadow">
                            <i class='bx bx-save me-1'></i> Save Privacy Policy
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
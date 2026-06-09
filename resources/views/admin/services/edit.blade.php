@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Edit Service</h4>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Small Label</label>
                    <input type="text" name="label" class="form-control" value="{{ $service->label }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Blue Main Heading</label>
                    <input type="text" name="heading" class="form-control" value="{{ $service->heading }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Display Order</label>
                    <input type="number" name="order" value="{{ $service->order }}" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold text-primary">Tagline (Uppercase text)</label>
                    <input type="text" name="short_desc" class="form-control" value="{{ $service->short_desc }}">
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label fw-bold">Main Body Description</label>
                    <textarea name="full_description" class="form-control" rows="3">{{ $service->full_description }}</textarea>
                </div>

                <hr class="my-3">

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light mb-3">
                        <h6 class="fw-bold mb-3">⬅️ LEFT COLUMN</h6>
                        <div class="mb-3">
                            <label class="form-label">Column Title</label>
                            <input type="text" name="left_heading" class="form-control" value="{{ $service->left_heading }}">
                        </div>
                        <div>
                            <label class="form-label">List Items (Separated by commas)</label>
                            <textarea name="items_left" class="form-control" rows="3">{{ $service->items_left }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light mb-3">
                        <h6 class="fw-bold mb-3">➡️ RIGHT COLUMN</h6>
                        <div class="mb-3">
                            <label class="form-label">Column Title</label>
                            <input type="text" name="right_heading" class="form-control" value="{{ $service->right_heading }}">
                        </div>
                        <div>
                            <label class="form-label">List Items (Separated by commas)</label>
                            <textarea name="items_right" class="form-control" rows="3">{{ $service->items_right }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Upload New Image (Leave blank to keep current)</label>
                    <input type="file" name="image" class="form-control">
                    @if($service->image)
                        <div class="mt-2">
                            <small>Current Image:</small><br>
                            <img src="{{ asset($service->image) }}" width="150" class="rounded border shadow-sm">
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg px-5">💾 Update Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
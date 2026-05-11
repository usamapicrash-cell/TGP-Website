@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <div class="d-flex justify-content-between align-items-center py-3 mb-4">
            <h4 class="fw-bold mb-0"><span class="text-muted fw-light">CMS /</span> Custom SEO Pages</h4>
            <a href="{{ route('admin.custom-pages.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Create New Page
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Manage Dynamic Pages</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Page Name</th>
                            <th>URL / Slug</th>
                            <th>Hero Status</th>
                            <th>SEO Status</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($pages as $page)
                        <tr>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">{{ $page->page_name }}</span>
                                    <small class="text-muted">Updated: {{ $page->updated_at->format('d M, Y') }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="input-group input-group-merge" style="width: 250px;">
                                    <input type="text" class="form-control form-control-sm bg-light" value="/page/{{ $page->slug }}" id="slug-{{ $page->id }}" readonly>
                                    <span class="input-group-text cursor-pointer" onclick="copySlug('slug-{{ $page->id }}')">
                                        <i class="bx bx-copy text-primary" title="Copy Link"></i>
                                    </span>
                                </div>
                            </td>
                            <td>
                                @if($page->hero_status)
                                    <span class="badge bg-label-info">Active Hero</span>
                                @else
                                    <span class="badge bg-label-secondary">No Hero</span>
                                @endif
                            </td>
                            <td>
                                @if($page->meta_title && $page->meta_description)
                                    <span class="badge bg-label-success" title="SEO Ready"><i class="bx bx-check"></i> Optimized</span>
                                @else
                                    <span class="badge bg-label-warning" title="Missing Meta Tags"><i class="bx bx-error"></i> Missing Meta</span>
                                @endif
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input status-toggle" type="checkbox" 
                                           data-id="{{ $page->id }}" 
                                           {{ $page->status ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri ri-list-unordered"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('/page/'.$page->slug) }}" target="_blank">
                                            <i class="ri ri-eye-line me-1"></i> Preview
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.custom-pages.edit', $page->id) }}">
                                            <i class="ri ri-edit-box-line me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.custom-pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Are, you sure delete page?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="ri  ri-delete-bin-line me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <p class="text-muted">No Page Create.</p>
                                <a href="{{ route('admin.custom-pages.create') }}" class="btn btn-primary btn-sm">Create New Page</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
document.querySelectorAll('.status-toggle').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        let pageId = this.getAttribute('data-id');
        let status = this.checked ? 1 : 0;

        fetch(`{{ url('admin/custom-pages/update-status') }}/${pageId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Optional: Show a small toast/notification
                console.log('Status updated!');
            }
        });
    });
});

function copySlug(id) {
    var copyText = document.getElementById(id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); 
    navigator.clipboard.writeText(window.location.origin + copyText.value);
    
    // Simple alert or toast can be added here
    alert("URL copied to clipboard: " + window.location.origin + copyText.value);
}
</script>
@endsection
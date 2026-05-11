@extends('layouts.appadmin')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Forms Submission</h4>

        <div class="card mb-5 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📩 Contact Us Queries</h5>
                <small class="text-muted float-end">Recent Submissions</small>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Service Type</th>
                            <th>Full Name</th>
                            <th>Message & Contact</th>
                            <th>ZIP Code</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse($contactQueries as $query)
                        <tr>
                            <td><span class="badge bg-label-primary">{{ $query->service_type }}</span></td>
                            <td><strong>{{ $query->first_name }} {{ $query->last_name }}</strong></td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="text-wrap" style="min-width: 200px;">{{ $query->message }}</span>
                                    <small class="text-muted mt-1"><i class="bx bx-envelope"></i> {{ $query->email }}</small>
                                    <small class="text-muted"><i class="bx bx-phone"></i> {{ $query->phone }}</small>
                                </div>
                            </td>
                            <td>{{ $query->zip_code }}</td>
                            <td>{{ $query->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No queries found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">🏗️ Contractor RFQ Submissions</h5>
                    <small class="text-muted">Project Requests from Contractors</small>
                </div>
                <span class="badge bg-info">New RFQs</span>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Requested Service</th>
                            <th>Contractor Name</th>
                            <th>RFQ Description</th>
                            <th>Contact Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contractorRfqs as $rfq)
                        <tr>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">{{ $rfq->service_type }}</span>
                                </div>
                            </td>
                            <td>{{ $rfq->name }}</td>
                            <td>
                                <span class="text-wrap d-block" style="min-width: 250px;">
                                    {{ $rfq->message }}
                                </span>
                            </td>
                            <td>
                                <small class="d-block">{{ $rfq->email }}</small>
                                <small class="text-muted">{{ $rfq->phone }}</small>
                                <br>
                                <small class="text-light-50">{{ $rfq->created_at->diffForHumans() }}</small>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No RFQs found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
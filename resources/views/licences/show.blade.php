<x-app-layout>
<div class="container">
    <h1>Licence Details</h1>

    <!-- Display success or error message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Licence Information
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $licence->software_name }}</h5>

            <p class="card-text">
                <strong>Vendor Name:</strong> {{ $licence->vendor_name }}<br>
                <strong>Licence Type:</strong> {{ $licence->licence_type }}<br>
                <strong>Cost:</strong> {{ $licence->currency }} {{ number_format($licence->cost, 2) }}<br>
                <strong>Start Date:</strong> {{ $licence->start_date }}<br>
                <strong>End Date:</strong> {{ $licence->end_date }}<br>
                <strong>Days Remaining:</strong> {{ $licence->days_remaining }}<br>
                <strong>Status:</strong> {{ ucfirst($licence->status) }}<br>
                <strong>Comment:</strong> {{ $licence->comment ?? 'No comments' }}<br>
            </p>

            @if ($licence->upload_files)
                <div class="mb-3">
                    <a href="{{ Storage::url($licence->upload_files) }}" class="btn btn-info" target="_blank">
                        View Uploaded File
                    </a>
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <a href="{{ route('licences.edit', $licence->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('licences.destroy', $licence->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
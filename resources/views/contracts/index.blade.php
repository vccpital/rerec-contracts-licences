<!-- resources/views/contracts/index.blade.php -->
<x-app-layout>
<div class="container">
    <h1 class="mb-4">Contracts</h1>
    
        <!-- Display success message if any -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Add New Contract</a>

    <div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="text-success">
                <th>Contract ID</th>
                <th>Vendor Name</th>
                <th>Service Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Days Remaining</th>
                <th>Renewal Reminder Date</th>
                <th>Supported Services</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
            <tr class="text-dark bg-light">
                <td>00{{ $contract->id }}</td>
                <td>{{ $contract->company_name }}</td>
                <td>{{ $contract->services }}</td>
                <td>{{ $contract->start_date }}</td>
                <td>{{ $contract->end_date }}</td>
                <td>
                    <span class="badge {{ $contract->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($contract->status) }}
                    </span>
                </td>
                <td>{{ $contract->days_remaining }}</td>
                <td>{{ $contract->renewal_reminder_date }}</td>
                <td>{{ $contract->supported_service }}</td>
                <td>{{ $contract->comment }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Contract Actions">
                        <a href="{{ route('contracts.show', $contract) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('contracts.edit', $contract) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('contracts.destroy', $contract) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</x-app-layout>


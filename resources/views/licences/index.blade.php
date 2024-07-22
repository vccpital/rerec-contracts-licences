<x-app-layout>
<div class="container text-success">
    <h1 class="my-4">Licences</h1> 
        <!-- Display success message if any -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('licences.create') }}" class="btn btn-primary mb-3">Add New Licence</a>

    <table class="table table-bordered">
        <thead>
            <tr class="text-success">
                <th>Licence ID</th>
                <th>Software Name</th>
                <th>Vendor Name</th>
                <th>Licence Type</th>
                <th>Cost</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($licences as $licence)
                <tr class="text-light bg-success">
                    <td>L{{ $licence->id }}</td>
                    <td>{{ $licence->software_name }}</td>
                    <td>{{ $licence->vendor_name }}</td>
                    <td>{{ $licence->licence_type }}</td>
                    <td>{{ $licence->currency }} {{ number_format($licence->cost, 2) }}</td>
                    <td>{{ $licence->start_date }}</td>
                    <td>{{ $licence->end_date }}</td>
                    <td>
                        <span class="badge {{ $licence->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($licence->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('licences.show', $licence) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('licences.edit', $licence) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('licences.destroy', $licence) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
<x-app-layout>
<div class="container">
    <h1>Edit Licence</h1>

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

    <form action="{{ route('licences.update', $licence->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="software_name" class="form-label">Software Name</label>
            <input type="text" class="form-control @error('software_name') is-invalid @enderror" id="software_name" name="software_name" value="{{ old('software_name', $licence->software_name) }}" required>
            @error('software_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="vendor_name" class="form-label">Vendor Name</label>
            <input type="text" class="form-control @error('vendor_name') is-invalid @enderror" id="vendor_name" name="vendor_name" value="{{ old('vendor_name', $licence->vendor_name) }}" required>
            @error('vendor_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="licence_type" class="form-label">Licence Type</label>
            <input type="text" class="form-control @error('licence_type') is-invalid @enderror" id="licence_type" name="licence_type" value="{{ old('licence_type', $licence->licence_type) }}" required>
            @error('licence_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input type="number" step="0.01" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost', $licence->cost) }}" required>
            @error('cost')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="supported_service" class="form-label">Supported Services</label>
            <input type="supported_service" class="form-control @error('supported_service') is-invalid @enderror" id="supported_service" name="supported_service" value="{{ old('supported_service') }}">
            @error('supported_service')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $licence->start_date) }}" required>
            @error('start_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $licence->end_date) }}" required>
            @error('end_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="currency" class="form-label">Currency</label>
            <select class="form-select @error('currency') is-invalid @enderror" id="currency" name="currency">
                <option value="KSH" {{ old('currency', $licence->currency) === 'KSH' ? 'selected' : '' }}>KSH</option>
                <option value="USD" {{ old('currency', $licence->currency) === 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ old('currency', $licence->currency) === 'EUR' ? 'selected' : '' }}>EUR</option>
                <option value="GBP" {{ old('currency', $licence->currency) === 'GBP' ? 'selected' : '' }}>GBP</option>
            </select>
            @error('currency')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="upload_files" class="form-label">Upload Files</label>
            <input type="file" class="form-control @error('upload_files') is-invalid @enderror" id="upload_files" name="upload_files">
            @if ($licence->upload_files)
                <small class="form-text text-muted">Current file: <a href="{{ Storage::url($licence->upload_files) }}" target="_blank">View File</a></small>
            @endif
            @error('upload_files')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3">{{ old('comment', $licence->comment) }}</textarea>
            @error('comment')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Licence</button>
        <a href="{{ route('licences.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</x-app-layout>
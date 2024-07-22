<x-app-layout>
<div class="container text-success">
    <h1 class="mb-4">Edit Contract</h1>

    <form action="{{ route('contracts.update', $contract) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $contract->company_name) }}">
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="supported_service" class="form-label">Supported service</label>
            <input type="supported_service" class="form-control @error('supported_service') is-invalid @enderror" id="supported_service" name="supported_service" value="{{ old('supported_service', $contract->supported_service) }}">
            @error('supported_service')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="services" class="form-label">Services</label>
            <textarea class="form-control @error('services') is-invalid @enderror" id="services" name="services">{{ old('services', $contract->services) }}</textarea>
            @error('services')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $contract->start_date) }}">
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $contract->end_date) }}">
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="renewal_reminder_date" class="form-label">Renewal Reminder Date</label>
            <input type="date" class="form-control @error('renewal_reminder_date') is-invalid @enderror" id="renewal_reminder_date" name="renewal_reminder_date" value="{{ old('renewal_reminder_date', $contract->renewal_reminder_date) }}">
            @error('renewal_reminder_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="upload_files" class="form-label">Upload Files</label>
            <input type="file" class="form-control @error('upload_files') is-invalid @enderror" id="upload_files" name="upload_files">
            @error('upload_files')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($contract->upload_files)
                <a href="{{ Storage::url($contract->upload_files) }}" class="btn btn-info mt-2">View Current File</a>
            @endif
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment">{{ old('comment', $contract->comment) }}</textarea>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Contract</button>
    </form>
</div>
</x-app-layout>
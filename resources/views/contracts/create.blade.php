<!-- resources/views/contracts/create.blade.php -->
<x-app-layout>
<div class="container text-success w-75">
    <form action="{{ route('contracts.store') }}" method="POST" enctype="multipart/form-data">
    <h1 class="text-center mb-4 text-success" style="margin-top: 54px;">Create New Contract</h1>
        @csrf

        <div class="mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}">
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
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
            <label for="services" class="form-label">Services</label>
            <textarea class="form-control @error('services') is-invalid @enderror" id="services" name="services">{{ old('services') }}</textarea>
            @error('services')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="renewal_reminder_date" class="form-label">Renewal Reminder Date</label>
            <input type="date" class="form-control @error('renewal_reminder_date') is-invalid @enderror" id="renewal_reminder_date" name="renewal_reminder_date" value="{{ old('renewal_reminder_date') }}">
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
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Contract</button>
    </form>
</div>
</x-app-layout>
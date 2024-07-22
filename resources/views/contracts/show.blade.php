<!-- resources/views/contracts/show.blade.php -->
<x-app-layout>
<div class="container text-success">
    <h1 class="mb-4">Contract Details</h1>

    <dl class="row">
        <dt class="col-sm-3">Company Name</dt>
        <dd class="col-sm-9">{{ $contract->company_name }}</dd>

        <dt class="col-sm-3">Supported service</dt>
        <dd class="col-sm-9">{{ $contract->supported_service }}</dd>

        <dt class="col-sm-3">Services</dt>
        <dd class="col-sm-9">{{ $contract->services }}</dd>

        <dt class="col-sm-3">Start Date</dt>
        <dd class="col-sm-9">{{ $contract->start_date }}</dd>

        <dt class="col-sm-3">End Date</dt>
        <dd class="col-sm-9">{{ $contract->end_date }}</dd>

        <dt class="col-sm-3">Days Remaining</dt>
        <dd class="col-sm-9">{{ $contract->days_remaining }}</dd>

        <dt class="col-sm-3">Renewal Reminder Date</dt>
        <dd class="col-sm-9">{{ $contract->renewal_reminder_date }}</dd>

        <dt class="col-sm-3">Status</dt>
        <dd class="col-sm-9">{{ $contract->status }}</dd>

        <dt class="col-sm-3">Comment</dt>
        <dd class="col-sm-9">{{ $contract->comment }}</dd>

        @if ($contract->upload_files)
            <dt class="col-sm-3">Uploaded Files</dt>
            <dd class="col-sm-9">
                <a href="{{ Storage::url($contract->upload_files) }}" class="btn btn-info">View File</a>
            </dd>
        @endif
    </dl>

    <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Back to Contracts</a>
</div>
</x-app-layout>
@extends('welcome')
@section('home-contents')

<div class="mt-4">
    <p class="h6 text-capitalize">Document status</p>
</div>
 <div class="progress">
  <div class="progress-bar {{ round($passingDocs) >= 100 ? 'bg-success' : 'bg-primary' }}" style="width: {{ round($passingDocs) }}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ round($passingDocs) }}%</div>
</div>
<div class="mt-4 {{ $pending[0]->data_count > 0 ? "block" : "d-none" }}">
    <div >
        <p class="h6 text-capitalize">Pending</p>
    </div>
    <div class="progress">
        <div class="progress-bar bg-warning" style="width: {{ round($pendingDocs) }}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ round($pendingDocs) }}%</div>
    </div>
</div>
<div class="mt-4 {{ $declined[0]->data_count > 0 ? "block" : "d-none" }}">
    <div>
        <p class="h6 text-capitalize">Declined</p>
    </div>
    <div class="progress">
        <div class="progress-bar bg-danger" style="width: {{ round($declinedDocs) }}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ round($declinedDocs) }}%</div>
    </div>
</div>
@livewire('customer.document-process', ['percent' => round($passingDocs)])

@endsection

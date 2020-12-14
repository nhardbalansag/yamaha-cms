@extends('welcome')
@section('home-contents')

<div class="mt-4">
    <p class="h6 text-capitalize">Document status</p>
</div>
 <div class="progress">
  <div class="progress-bar {{ round($passingDocs) >= 100 ? 'bg-success' : 'bg-primary' }}" style="width: {{ round($passingDocs) }}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ round($passingDocs) }}%</div>
</div>
@livewire('customer.document-process', ['percent' => round($passingDocs)])

@endsection

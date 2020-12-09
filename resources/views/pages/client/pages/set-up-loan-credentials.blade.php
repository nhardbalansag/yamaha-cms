@extends('welcome')
@section('home-contents')

  <div>
    <p class="h5 text-capitalize">application status</p>
  </div>
 <div class="progress">
  <div class="progress-bar w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>

@livewire('customer.document-process')

@endsection

@extends('dashboard')
@section('contents')

<div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
    <div class="col-md-3">
        image
    </div>
    <div class="col-md-3">
        status
    </div>
    <div class="col-md-3">
        type
    </div>
    <div class="col-md-3">
        action
    </div>
</div>
@if (session()->has('declineMessage'))
<div class="container capitalize alert alert-success">
    {{ session('declineMessage') }}
</div>
@endif
@foreach($documents as $key => $value)
    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-3 text-truncate">

             <a href="{{ asset('storage/' . $value->photo_path) }}">
                <img class="w-20" src="{{asset('storage/' . $value->photo_path) }}" alt="">
            </a>
        </div>
        <div class="col-md-3 {{ $value->status == "approved" ? 'text-success' : ($value->status == "pending" ? 'text-warning' : 'text-danger') }}">
            {{ $value->status }}
        </div>
        <div class="col-md-3">
            {{ $value->title }}
        </div>
        <div class=" col-md-3 d-flex justify-content-around align-items-center">
            @livewire('admin.loan.approve-document', ['sentDocsId' => $value->id, 'customer_id' => $value->customer_id])
            @livewire('admin.loan.decline-document', ['sentDocsId' => $value->id, 'customer_id' => $value->customer_id])
        </div>
    </div>
@endforeach


@endsection

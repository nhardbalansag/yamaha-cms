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
</div>
@foreach($documents as $key => $value)
    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-3 text-truncate">

             <a href="{{ asset('storage/' . $value->photo_path) }}">{{asset('storage/' . $value->photo_path) }}</a>
        </div>
        <div class="col-md-3 {{ $value->status == "approved" ? 'text-success' : ($value->status == "pending" ? 'text-warning' : 'text-danger') }}">
            {{ $value->status }}
        </div>
        <div class="col-md-3">
            {{ $value->title }}
        </div>
        <div class=" col-md-3">
            <div class="mb-2 dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#" >Actions</a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a class="dropdown-item text-success" href="/loan/applicants/approved/{{ $value->id }}/{{ $value->customer_id }}">Approved</a></li>
                    <li><a class="dropdown-item text-danger" href="/loan/applicants/declined/{{ $value->id }}/{{ $value->customer_id }}">Decline</a></li>
                </ul>
            </div>
        </div>
    </div>
@endforeach


@endsection

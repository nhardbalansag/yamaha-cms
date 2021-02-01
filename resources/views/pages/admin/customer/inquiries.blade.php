@extends('dashboard')
@section('contents')


<div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
    <div class="col-md-3">
        name
    </div>
    <div class="col-md-2">
        email
    </div>
    <div class="col-md-2">
        contact number
    </div>
    <div class="col-md-3">
        address
    </div>
    <div class="col-md-2">
        action
    </div>
</div>
@foreach($inquiries as $key => $value)

    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-3 text-truncate">
            {{$value->first_name}}
        </div>
        <div class="col-md-2">
            {{$value->email_address}}
        </div>
        <div class="col-md-2">
            {{$value->contact_number }}
        </div>
        <div class="col-md-3">
            {{$value->home_address . ', ' . $value->street_address . ', ' . $value->city . ', ' . $value->country_region . ', ' . $value->state_province}}
        </div>
        <div class=" col-md-2">
            <a  href="/order/{{ $value->id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
        </div>
    </div>
@endforeach

@endsection

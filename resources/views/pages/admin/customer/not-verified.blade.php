@extends('dashboard')
@section('contents')


<div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
    <div class="col-md-3">
        name
    </div>
    <div class="col-md-3">
        status
    </div>
    <div class="col-md-3">
        role
    </div>
    <div class="col-md-3">
        email
    </div>
    <div class="col-md-3">
        action
    </div>
</div>
@foreach($notVerified as $key => $value)

    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-3 text-truncate">
            {{$value->first_name}}
        </div>
        <div class="col-md-3 {{ $value->verified == 1 ? 'text-success' : 'text-danger' }}">
            {{$value->verified == 1 ? 'verified' : 'not verified'}}
        </div>
        <div class="col-md-3">
            {{$value->role }}
        </div>
        <div class="col-md-3">
            {{$value->email }}
        </div>
        <div class=" col-md-3">
            <a href="/loan/applicants/{{ $value->id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
        </div>
    </div>
@endforeach

@endsection

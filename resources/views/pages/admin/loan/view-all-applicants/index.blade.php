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

@if(count($applicants) <= 0)
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <i class="fas fa-box-open fa-10x"></i>
            <p class="capitalize">no items to show</p>
        </div>
    </div>
@else

@foreach($applicants as $key => $value)
    <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
        <div class="col-md-3 text-truncate">
            {{$value->first_name}}
        </div>
        <div class="col-md-3 {{ $value->verified == 1 ? 'text-success' : 'text-danger' }}">
            <p class="p-1 capitalize {{ $value->verified == 1 ? 'text-success' : 'text-warning' }} ">
                {{$value->verified == 1 ? 'verified' : 'not verified'}}
            </p>
        </div>
        <div class="col-md-3">
            {{$value->role }}
        </div>
        <div class=" col-md-3">
            <a href="/loan/applicants/{{ $value->id }}" class="text-indigo-600 hover:text-indigo-900">view</a>
        </div>
    </div>
@endforeach

<div>
    {!! $applicants->links() !!}
</div>

@endif

@endsection

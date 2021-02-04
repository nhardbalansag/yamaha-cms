@extends('dashboard')
@section('contents')
    <div class="my-4 text-center border-bottom border-dark row col-md-12 text-capitalize">
        <div class="col-md-3">
            Customer
        </div>
        <div class="col-md-2">
            Status
        </div>
        <div class="col-md-2">
            Reservation Date
        </div>
        <div class="col-md-3">
            Email
        </div>
        <div class="col-md-2">
            Created at
        </div>
    </div>
    @if(count($reservations) <= 0)
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <i class="fas fa-box-open fa-10x"></i>
                <p class="capitalize">no items to show</p>
            </div>
        </div>
    @else
    @foreach($reservations as $key => $value)

        <div class="py-2 my-2 text-center border-bottom border-dark row col-md-12">
            <div class="col-md-3 text-truncate">
                {{$value->first_name}}
            </div>
            <div class="col-md-2 ">
                <p class="p-1 text-white capitalize rounded {{ $value->status == 'ongoing' ? 'bg-primary' : 'bg-success' }} ">
                    {{$value->status}}
                </p>
            </div>
            <div class="col-md-2">
                {{$value->reservationDate  }}
            </div>
            <div class="col-md-3">
                {{$value->email }}
            </div>
            <div class="col-md-2">
                {{$value->created_at }}
            </div>
        </div>
    @endforeach
    <div>
        {!! $reservations->links() !!}
    </div>
@endif

@endsection

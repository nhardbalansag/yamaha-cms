<div>
    <div class="w-25">
        <form wire:submit.prevent="filterReservation">
            <div class="my-2">
                <label for="orderBy" class="block text-sm font-medium leading-5 text-gray-700">Order By</label>
                <select wire:model.defer="filterBy" id="orderBy" class="block w-full p-2 px-3 py-2 mt-1 transition duration-150 ease-in-out bg-white border-gray-400 border-solid rounded-md shadow-sm border-1 form-select focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                    <option value="none">- Group By -</option>
                    <option value="service_reservations.customerId">Customer</option>
                    <option value="service_reservations.reservationDate">Reservation Date</option>
                    <option value="service_reservations.status">Status</option>
                </select>
            </div>
            <div class = "text-center ">
                <button class="w-full btn btn-dark">Search product</button>
            </div>
        </form>
    </div>
    @if (session()->has('message'))
        <div class="container text-center capitalize alert alert-success">
            {{ session('message') }}
        </div>
    @endif
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
                    <p class="p-1 capitalize {{ $value->status == 'ongoing' ? 'text-primary' : 'text-success' }} ">
                        {{$value->status == 'ongoing' ? 'ongoing' : 'done'}}
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
           {{ $reservations->links() }}
        </div>
    @endif
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>

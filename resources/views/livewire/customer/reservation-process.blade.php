<div class="d-flex justify-content-center align-items-center">
   <div class="col-md-12 row align-items-center">
       <div class="col-md-5">
            <img  src="{{ asset('slides-resource/Book service now!.png') }}" alt="design">
       </div>
       <div class="col-md-7">
            @if (session()->has('message'))
                <div class="container capitalize alert alert-success">
                    {{ session('message') }}
                </div>
            @elseif(session()->has('error'))
                <div class="container capitalize alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif
            <div>
                <p class="font-weight-bold">SERVICE HOURS</p>
                <p class="capitalize text-muted">Monday – friday: 08:30 am – 05:30 pm</p>
            </div>
            <form wire:submit.prevent="submitReservation">
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
                    <input wire:model.prevent="reservation_date" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="d-flex justify-content-endss">
                    <button class="w-1/2 btn btn-dark">Submit</button>
                </div>
            </form>
            <div class="mt-2">
                <div class="row col-12">
                    <div class="col-6">
                        <p class="text-center font-weight-bold">Date</p>
                    </div>
                    <div class="col-6">
                        <p class="text-center font-weight-bold">Status</p>
                    </div>
                    @if(count($dataSchedule) <= 0)
                        <div class="col-12">
                            <p class="text-center capitalize">no current service reservations</p>
                        </div>
                    @else
                        @foreach($dataSchedule as $key => $value)
                            <div class="col-6">
                                <p class="text-center">{{ $value->reservationDate }}</p>
                            </div>
                            <div class="col-6">
                                <p class="text-center">{{ $value->status }}</p>
                            </div>
                        @endforeach
                        <div>
                            {!! $dataSchedule->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
   </div>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</div>

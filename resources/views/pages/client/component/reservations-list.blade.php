

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

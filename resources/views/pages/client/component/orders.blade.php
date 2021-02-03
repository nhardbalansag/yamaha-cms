<div>
    <div class="p-3 my-3 bg-white rounded shadow-sm">
        <h6 class="pb-2 mb-0 border-bottom border-gray">Recent updates</h6>
        <div class="pt-3 row col-md-12 d-flex justify-content-between align-items-center">
            @if(count($transactionData) <= 0)
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <i class="fas fa-box-open fa-7x"></i>
                        <p class="capitalize">no items to show</p>
                    </div>
                </div>
            @else
            @foreach($transactionData as $key => $value)
                <div class ="py-2 row col-md-12 border-bottom border-gray">
                    <div class="col-md-2">
                        <div class="flex-shrink-0 w-20 h-20">
                            <a href="{{asset('storage/' . $value->photo_path) }}">
                                <img class="w-full h-full " src="{{asset('storage/' . $value->photo_path) }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="pb-3 mb-0 media-body small lh-125">
                            <strong class="d-block text-gray-dark">{{$value->title}}</strong>
                            <span>Description: <span>{{$value->description}}</span></span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p class="pb-3 mb-0 media-body small lh-125">
                            <strong class="d-block text-gray-dark">price: <span class="text-success">{{$value->purchaseAmount}}</span></strong>
                            <span>status: <span class="text-success">{{$value->transactionStatus}}</span></span>
                        </p>
                    </div>
                </div>
                @endforeach
                    <div>
                        {!! $transactionData->links() !!}
                    </div>
                @endif
        </div>
    </div>
</div>

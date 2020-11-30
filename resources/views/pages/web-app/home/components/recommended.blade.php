        <div class = "m-auto mt-20">
            <div>
                <p class = "text-4xl font-bold capitalize">recommended</p>
            </div>
            <div class="swiper-container">
                <div class="pb-20 swiper-wrapper ">
                    @foreach($recommended as $key => $value)
                        <div class="p-0 border swiper-slide h-50">
                            <a href="/home/product/{{$value->id}}" class="btn btn-lg" tabindex="0">
                                <div class="row">
                                    <div class="p-0 col-12 col-md-12 d-flex align-items-center" >
                                        <img src="{{url('storage/' . $value->photo_path) }}" loading="lazy" alt="...">
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div>
                                        <div class="mb-2 font-weight-bold">{{$value->title}}</div>
                                        <div class="font-weight-bold text-dark ">P {{$value->price}}.00</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
       </div>
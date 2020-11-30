        <div class = "m-auto mt-20">
            <div>
                <p class = "text-4xl font-bold capitalize">recommended</p>
            </div>
            <div class="swiper-container">
                <div class="pb-20 swiper-wrapper h-100">
                    @foreach($recommended as $key => $value)
                        <div class="p-0 border swiper-slide">
                            <a href="/home/product/{{$value->id}}" class="btn btn-lg" tabindex="0">
                                <div class="row">
                                    <div class="p-0 col-12 col-md-12 d-flex align-items-center" >
                                        <img src="{{url('storage/' . $value->photo_path) }}" loading="lazy" alt="...">
                                    </div>
                                </div>
                                <div class="d-flex align-items-end">
                                    <div class ="col-12">
                                        <div class="mb-2 font-weight-bold col-12">{{$value->title}}</div>
                                        <div class="font-weight-bold text-dark col-12">P {{$value->price}}.00</div>
                                        <a href="/home/product/{{$value->id}}" class="col-12 btn btn-outline-primary btn-lg w-full" role="button" aria-pressed="true">View Details</a>
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
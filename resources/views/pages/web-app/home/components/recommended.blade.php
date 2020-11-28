        <div class = "m-auto mt-20">
            <div>
                <p class = "text-4xl font-bold capitalize">recommended</p>
            </div>
            <div class="swiper-container">
                <div class="pb-20 swiper-wrapper">
                    @foreach($recommended as $key => $value)
                        <div class="flex justify-center swiper-slide ">
                            <a href="/home/product/{{$value->id}}" class="w-full btn btn-lg" tabindex="0">
                                <div class="row">
                                    <div class="py-2 col-md-12 app-card-image">
                                        <img src="{{url('storage/' . $value->photo_path) }}" loading="lazy" class="b-card-img" alt="...">
                                    </div>
                                    <div class="p-3 card-body app-card-body w-100">
                                        <div class="row">
                                            <div class="mb-2 col-md-12 b-fs-title font-weight-bold text-truncate">{{$value->title}}</div>
                                        </div>
                                        <div class="row text-secondary align-self-end">
                                            <div class="pr-0 col-4 b-fs-text align-self-end">Buy Now</div>
                                            <div class="pl-0 text-right col-8 b-fs-title font-weight-bold text-dark text-truncate">P {{$value->price}}.00</div>
                                        </div>
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
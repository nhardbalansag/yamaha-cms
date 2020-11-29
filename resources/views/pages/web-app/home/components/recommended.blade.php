        <div class = "m-auto mt-20">
            <div>
                <p class = "text-4xl font-bold capitalize">recommended</p>
            </div>
            <div class="swiper-container row">
                <div class="pb-20 swiper-wrapper">
                    @foreach($recommended as $key => $value)
                        <div class="border swiper-slide">
                            <div class="p-0 mx-2">
                                <a href="/home/product/{{$value->id}}" class="btn btn-lg" tabindex="0">
                                    <div class=" row">
                                        <div class="h-64 p-0 border col-md-12 d-flex align-items-center" >
                                            <img src="{{url('storage/' . $value->photo_path) }}" loading="lazy" alt="...">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <div class=" col-12">
                                            <div class="col-12 font-weight-bold text-truncate">{{$value->title}}</div>
                                            <div class="col-12 font-weight-bold text-dark text-truncate">P {{$value->price}}.00</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
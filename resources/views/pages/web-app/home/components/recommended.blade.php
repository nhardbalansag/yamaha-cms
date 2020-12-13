        <div class = "m-auto mt-20">
            <div>
                <p class = "text-xl font-bold capitalize">recommended</p>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper d-flex justify-content-center ">
                    @foreach($recommended as $key => $value)
                        <div class=" swiper-slide">
                            <a href="/home/product/{{$value->id}}">
                                <div class="p-0"  >
                                    <img src="{{url('storage/' . $value->photo_path) }}"  style="height:150px" loading="lazy" alt="...">
                                </div>
                                <div class="px-4">
                                    <div class="mb-2 truncate w-100 font-weight-bold text-primary text-capitalize">{{$value->title}}</div>
                                    <div class="font-weight-light text-dark ">{{date('m/d/Y', strtotime($value->created_at))}}</div>
                                    <div class="d-flex justify-content-between">
                                        <p class="font-weight-light text-dark text-capitalize">buy now :</p>
                                        <p class="font-weight-bold text-dark ">P {{$value->price}}.00</p>
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

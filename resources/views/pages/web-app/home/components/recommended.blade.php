        <div class = "m-auto mt-20">
            <div>
                <p class = "font-bold text-4xl capitalize">recommended</p>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($recommended as $key => $value)
                        <div class="swiper-slide flex justify-center ">
                            <div class=" mb-5 w-64 h-full bg-white rounded p-2">
                                <div class="h-full w-full">
                                    <a href="/home/product/{{$value->id}}">
                                        <img class="w-64 h-48" src="{{asset('storage/' . $value->photo_path) }}"  alt="product photo">
                                    </a>
                                </div>
                                <div class="mt-2 text-center">
                                    <h5 class="truncate">{{$value->title}}</h5>
                                    <p>SRP: <span>{{$value->price}}</span></p>
                                    <a href="/home/product/{{$value->id}}" class="btn btn-outline-primary btn-lg w-full" role="button" aria-pressed="true">View Details</a>
                                </div>
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
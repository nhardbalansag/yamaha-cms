        <div class = "m-auto mt-20">
            <div>
                <p class = "font-bold text-4xl capitalize">recommended</p>
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($recommended as $key => $value)
                        <div class="swiper-slide flex justify-center">
                            <div class=" shadow mb-5 w-64 h-full bg-white rounded">
                                <a href="">
                                    <img src="{{asset('storage/' . $value->photo_path) }}"  alt="...">
                                </a>
                                <div class="mt-2 text-center">
                                    <h5 class="truncate">{{$value->title}}</h5>
                                    <p>SRP: <span>{{$value->price}}</span></p>
                                    <a href="/product/{{$value->id}}" class="btn btn-primary btn-lg w-full active" role="button" aria-pressed="true">View Details</a>
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
@extends('welcome')
@section('home-contents')

    <section>
        <div class="mx-auto mt-4 row col-12 col-md-12">
            <div class="mx-auto bg-white rounded col-md-6 col-12">
                <div class="mb-3">
                    <div>
                        <p class="h3 font-weight-bold">{{$product->title}}</p>
                        <p class="text-muted">{{$product->description}}</p>
                    </div>
                </div>
                <a href="{{asset('storage/' . $product->photo_path) }}">
                    <img src="{{asset('storage/' . $product->photo_path) }}"  alt="product">
                </a>
                <div class="mx-auto mt-2">
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="/home/product/{{$product->id}}/inquiry" class="btn text-primary" role="button" aria-pressed="true">INQUIRE</a>
                        <div>
                            <a href='{{Auth::user() ? (($category->title == 'parts' ? '/my-account/order/' . $product->id . '/payment/' . Auth::user()->id : ($category->title == 'motorcycle' ? '/my-account/loan/application' : ($category->title == 'services' ? '/my-account/services/' . $product->id . '/' . Auth::user()->id  : '/my-account/services/reservation'))))  : "/customer/login"}}' class="flex-row btn d-flex justify-content-between text-primary" role="button" aria-pressed="true">
                                <span>
                                    @if($category->title === 'parts')
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    @endif
                                </span>
                                <span class="text-uppercase">
                                    {{$category->title == 'parts' ? 'order' : '' }}
                                </span>
                            </a>
                        </div>
                        <div>
                        {{--  --}}
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn"  data-toggle="modal" data-target="#staticBackdrop">
                                    <div class="text-primary d-flex justify-content-center">
                                        <span>
                                            <svg class="w-6 h-6"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                            </svg>
                                        </span>
                                        <span class="text-uppercase">
                                            share
                                        </span>
                                    </div>
                                </button>
                            </div>
                            <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Share this article</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="ml-2 modal-body border-bottom">
                                            <a target="_blank" href="mailTo:?subject=Yamaha Megavia&amp;body={{url()->current()}}" class="fb-xfbml-parse-ignore h6 text-uppercase">
                                                <span>
                                                    <i class="far fa-envelope h5"></i>
                                                </span>
                                                <span class="ml-2 text-uppercase">
                                                        email
                                                </span>
                                            </a>
                                        </div>

                                        <div class="modal-body border-bottom" >
                                            <div data-href="{{url()->current()}}" data-layout="button" data-size="large">
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="ml-2 text-uppercase">
                                                <span>
                                                    <i class="fab fa-facebook-square text-primary h5"></i>
                                                </span>
                                                    <span class="ml-2 text-uppercase">facebook</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-2 modal-body border-bottom">
                                            <a href="https://twitter.com/share?text={{url()->current()}}" target="_blank" rel="noopener noreferrer">
                                                <span>
                                                    <i class="fab fa-twitter h5"></i>
                                                </span>
                                                <span class="ml-2 text-uppercase">Twitter</span>
                                            </a>
                                        </div>
                                        <div class="ml-2 modal-body border-bottom">
                                            <a href= "whatsapp://send?text={{url()->current()}}"
                                                data-action="share/whatsapp/share"
                                                target="_blank">
                                                <span>
                                                    <i class="fab fa-whatsapp h5"></i>
                                                </span>
                                                <span class="ml-2 text-uppercase">
                                                    Share to whatsapp
                                                </span>
                                            </a>
                                        </div>
                                        <div class="ml-2 modal-body border-bottom">
                                            <a href= "https://www.addtoany.com/add_to/sms?linkurl={{url()->current()}}"
                                                data-action="share/whatsapp/share"
                                                target="_blank">
                                                <span>
                                                    <i class="fas fa-comment-alt h5"></i>
                                                </span>
                                                <span class="ml-2 text-uppercase">
                                                    SMS
                                                </span>
                                            </a>
                                        </div>
                                        <div class="ml-2 modal-body border-bottom">
                                            <a class="copy_text" data-toggle="modal" title="Copy to Clipboard" href="{{url()->current()}}">
                                                <span>
                                                    <i class="fas fa-copy h5"></i>
                                                </span>
                                                <span class="ml-2 text-uppercase" id="copylinkTitle">
                                                    copy link
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="capitalize col-12 col-md-6">
                <div class = "text-center bg-blue-900">
                    <p class="text-4xl font-extrabold text-white">SRP: ₱{{number_format($product->price)}}.00</p>
                </div>
                <div class="col-12">
                    <div class="row col-12">
                        <div class="col-6">
                            <p class="text-capitalize font-weight-bold">specifications</p>
                        </div>
                        <div class="col-6 text-capitalize font-weight-bold">
                            <p>description</p>
                        </div>
                    </div>
                    @foreach($specification as $key => $value)
                        <div class="row col-12 border-bottom">
                            <div class="col-6">
                                <p class="text-muted">{{$value->title}}</p>
                            </div>
                            <div class="col-6">
                                <p class="text-muted"> {{$value->description}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('pages.web-app.home.components.recommended')

    </section>

@endsection


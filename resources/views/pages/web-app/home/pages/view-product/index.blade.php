@extends('welcome')
@section('home-contents')
    
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="mx-2 mb-5 bg-white rounded">
                <a href="/home//product/{{$product->id}}/inquiry">
                    <img src="{{asset('storage/' . $product->photo_path) }}"  alt="product">
                </a>
                <div class="mt-2">
                    <h5 class="truncate">{{$product->title}}</h5>
                    <p>SRP: <span>{{$product->price}}</span></p>
                    <div class = "grid grid-cols-1 md:grid-cols-2">
                        <div class="flex justify-between items-center">
                            <a href="/home/product/{{$product->id}}/inquiry" class="btn btn-outline-primary" role="button" aria-pressed="true">sdfsfsdfsfssfdsfsffsfsf</a>
                            <div>
                            {{--  --}}
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-light"  data-toggle="modal" data-target="#staticBackdrop">
                                        <div class="text-danger d-flex justify-content-between gap-2">
                                            <span>
                                               <svg class="h-6 w-6"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                            <div class="modal-body border-bottom ml-2">
                                                <a target="_blank" href="mailTo:?subject=Yamaha Megavia&amp;body={{url()->current()}}" class="fb-xfbml-parse-ignore h6 text-uppercase">
                                                    <span>
                                                        <i class="far fa-envelope h5"></i>
                                                    </span>
                                                    <span class="text-uppercase ml-2">
                                                            email
                                                    </span>
                                                </a>
                                            </div>
                                            
                                            <div class="modal-body border-bottom" >
                                                <div data-href="{{url()->current()}}" data-layout="button" data-size="large">
                                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="text-uppercase ml-2">
                                                    <span>
                                                        <i class="fab fa-facebook-square text-primary h5"></i>
                                                    </span>
                                                        <span class="text-uppercase ml-2">facebook</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal-body border-bottom ml-2">
                                                <a href="https://twitter.com/share?text={{url()->current()}}" target="_blank" rel="noopener noreferrer">
                                                    <span>
                                                        <i class="fab fa-twitter h5"></i>
                                                    </span>
                                                    <span class="text-uppercase ml-2">Twitter</span>
                                                </a>
                                            </div>
                                            <div class="modal-body border-bottom ml-2">
                                                <a href= "whatsapp://send?text={{url()->current()}}"
                                                    data-action="share/whatsapp/share"
                                                    target="_blank"> 
                                                    <span>
                                                        <i class="fab fa-whatsapp h5"></i>
                                                    </span>
                                                    <span class="text-uppercase ml-2">
                                                        Share to whatsapp 
                                                    </span>
                                                </a> 
                                            </div>
                                            <div class="modal-body border-bottom ml-2">
                                                <a href= "https://www.addtoany.com/add_to/sms?linkurl={{url()->current()}}"
                                                    data-action="share/whatsapp/share"
                                                    target="_blank"> 
                                                    <span>
                                                        <i class="fas fa-comment-alt h5"></i>
                                                    </span>
                                                    <span class="text-uppercase ml-2">
                                                        SMS 
                                                    </span>
                                                </a> 
                                            </div>
                                            <div class="modal-body border-bottom ml-2">
                                                <a class="copy_text" data-toggle="modal" title="Copy to Clipboard" href="{{url()->current()}}">
                                                    <span>
                                                        <i class="fas fa-copy h5"></i>
                                                    </span>
                                                    <span class="text-uppercase ml-2" id="copylinkTitle">
                                                        copy link
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{--  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "capitalize">
                <div class = "bg-blue-900 text-center">
                    <p class="text-white font-extrabold text-4xl">SRP: ₱{{$product->price}}</p>
                </div>
                <div>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">specifications</th>
                                <th class="px-4 py-2">description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specification as $key => $value)
                                <tr>
                                    <td class="border px-4 py-2 font-bold">{{$value->title}}</td>
                                    <td class="border px-4 py-2">
                                       {{$value->description}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('pages.web-app.home.components.recommended')

    </section>
     
@endsection
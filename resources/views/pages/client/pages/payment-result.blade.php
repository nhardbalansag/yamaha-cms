
@extends('welcome')
@section('home-contents')

<section class="content">
    <div class="container">
        <div class="py-5 text-center">
            <div>
                @if (session()->has('message'))
                    <div class="container capitalize alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <h2>Checkout form</h2>
            <p class="lead">
                below are the details about the product you are purchasing. Please check the details before proceeding thank you.
            </p>
            </div>
                <div class="alert  {{$result == true ? 'alert-success' : 'alert-danger'}}" role="alert">
                   {{$result == true ? " payment success! thank you" : "payment cannot be added please send us a proof of your payment transaction"}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

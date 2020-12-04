
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
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>
                <div class="alert  {{$result == true ? 'alert-success' : 'alert-danger'}}" role="alert">
                   {{$result == true ? " payment success! thank you" : "payment cannot be added please send us a proof of your payment transaction"}}
                </div>
        
                <footer class="pt-5 my-5 text-center text-muted text-small">
                    <p class="mb-1">© 2017-2020 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</section>

@endsection
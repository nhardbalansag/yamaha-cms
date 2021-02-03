
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
    @if (Auth::user()->verified != 1)
      <div class="text-center alert alert-warning" role="alert">
        <p>
          Note: at the moment you cant buy or reserve a product or services. Please verify first your email address.
        </p>
        <a href="/my-account/{{ Auth::user()->id }}">click here to account</a>
      </div>
    @else

    <div class="row">
      <div class="mb-4 col-md-4 order-md-2">
        <h4 class="mb-3 d-flex justify-content-between align-items-center">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">1</span>
        </h4>
        <ul class="mb-3 list-group">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">{{$product->title}}</h6>
              <small class="text-muted">{{$product->description}}</small>
            </div>
            <span class="text-muted">P{{$product->price}}.00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total in Peso (PHP)</span>
            <strong>P{{$product->price}}.00</strong>
          </li>
           <li class="list-group-item d-flex justify-content-between">
            <span>Total in Dollar (USD)</span>
            <strong>${{$product->price * 0.0208286}}</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Payment</h4>
          <hr class="mb-4">
          <a class="btn btn-primary" data-toggle="collapse" href="#customers">Continue to checkout</a>
          <div class="mt-4 collapse col-12" id="customers">
            <div id="paymentOption"></div>
          </div>
          <script src="https://www.paypal.com/sdk/js?client-id=ARZLAD9HtYUoSG_-oc4dwGlf8p7fiqnX6fDcmo0sGrc_REVZ5OznxQv9AosAX8p_4sKYzL3JAYarpHkA"></script>

          <script>
            paypal.Buttons({
              createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      value: {{round($product->price  * 0.0208286 )}}
                    }
                  }]
                });
              },
              onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                  // This function shows a transaction success message to your buyer.
                  alert('Transaction completed by ' + details.payer.name.given_name);
                  window.location.href = "/my-account/checkout/" + "{{$data["account"]->id}}" + "/" + "{{$data["product"]->id}}" + "/" + "{{$data["product"]->price}}";
                });
              }
            }).render('#paymentOption');
          </script>
      </div>
    </div>

    @endif
    <footer class="pt-5 my-5 text-center text-muted text-small">
      <p class="mb-1">© 2017-2020 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>
    <div wire:loading>
        @include('pages.components.loadingState')
    </div>
</section>

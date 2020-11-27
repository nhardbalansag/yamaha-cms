
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
            <span>Total (PHP)</span>
            <strong>P{{$product->price}}.00</strong>
          </li>
        </ul>

        {{-- <form class="p-2 card">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form> --}}
      </div>
      <div class="col-md-8 order-md-1">
        {{-- <h4 class="mb-3">Billing address</h4> --}}
        <form class="needs-validation" wire:submit.prevent="checkout">
          {{-- <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>
          
          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          
          <div class="row">
            <div class="mb-3 col-md-5">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required="">
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="mb-3 col-md-4">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" id="state" required="">
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="mb-3 col-md-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required="">
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address">
            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info">
            <label class="custom-control-label" for="save-info">Save this information for next time</label>
          </div>
          <hr class="mb-4"> --}}

          <h4 class="mb-3">Payment</h4>

          <div class="my-3 d-block">
            <div class="custom-control custom-radio">
              <input wire:model='payment_method' id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="debit">Cash</label>
              @error('payment_method') <span class="text-red-600 error">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="custom-control custom-radio">
              <input wire:model='payment_method' id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="paypal">PayPal</label>
               @error('payment_method') <span class="text-red-600 error">{{ $message }}</span> @enderror
            </div> --}}
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
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
    </section>
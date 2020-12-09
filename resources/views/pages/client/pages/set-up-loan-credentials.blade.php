@extends('welcome')
@section('home-contents')

<div class="card p-0 mt-3 card-rate">
    <div class="row text-center mt-3 mb-2">
      <div class="col-md-12 mx-0">

        <!-- progressbar -->
        <ul id="progressbar">          
          <li class="active partial" style="width:10%;color:white">.</li>
          <li style="width:22%" id="payment"><strong>Payment</strong></li>
          <li style="width:22%" id="delivery"><strong>Delivery</strong></li>
          <li style="width:23%" id="review"><strong>Review</strong></li>
          <li style="width:23%" id="complete"><strong>Complete</strong></li>              
        </ul> <!-- fieldsets -->

        <div class="col-12 row">
            <div class="progress col-6 p-0">
                <div class="progress-bar w-full" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div class="progress col-6 p-0">
                <div class="progress-bar w-full" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
        </div>

      </div>
    </div>
  </div>

@endsection

@extends('dashboard')
@section('contents')


<section class="content">
    <div class="p-4 container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> status:</h5>
            <h1><span class="text-white badge {{ $transactions->status == "processing" ? 'bg-primary' : ($transactions->status === "deliver" ? 'bg-info' : 'bg-success') }} text-capitalize">{{ $transactions->status === 'deliver' ? 'to deliver' : ($transactions->status === 'processing' ? 'to process' : 'done transaction') }}</span></h1>
            customers transaction invoice
          </div>
          <!-- Main content -->
          <div class="p-3 mb-3 invoice">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> YAMAHA MEGAVIA
                  <small class="float-right">Date: {{ $transationDate }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>{{ $users->first_name }}</strong><br>
                  {{ $users->home_address }}<br>
                  {{ $users->street_address . " " .  $users->street_address . " " .  $users->city }}<br>
                  Phone: {{ $users->contact_number }}<br>
                  Email: {{ $users->email }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>YAMAHA MEGAVIA</strong><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $users->id . $transactions->id .  $products->id   }}</b><br>
                <br>
                <b>Order ID:{{ $users->id . $transactions->id .  $products->id   }}</b> <br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>{{ $products->title }}</td>
                    <td>{{ $products->description }}</td>
                    <td>P{{ number_format($transactions->purchaseAmount) }}.00</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Payment Methods:</p>
                {{-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="../../dist/img/credit/american-express.png" alt="American Express"> --}}
                <img src="{{ asset('slides-resource/paypal2.png') }}" alt="Paypal">

              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Amount Due P{{ number_format($transactions->purchaseAmount) }}.00</p>

                <div class="table-responsive">
                  <table class="table">
                    <tbody><tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>P{{ number_format($transactions->purchaseAmount) }}.00</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>P{{ number_format($transactions->purchaseAmount) }}.00</td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                @livewire('admin.customer.update-order-status', ['transactionId' => $transactions->id, 'transactionStatus' => $transactions->status])

                <a href="/orders/viewallOrders/transactions/invoice-pdf/{{ $transactions->id }}" type="button" class="float-right btn btn-primary" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


@endsection

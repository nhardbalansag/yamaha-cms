<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>{{ env('APP_NAME') }}</title>
  </head>
  <body>
    <section class="content">
        <div class="p-4 container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Note:</h5>
                customers transaction invoice
              </div>
              <!-- Main content -->
              <div class="p-3 mb-3 invoice">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                        {{ env('APP_NAME') }}
                    </h4>
                    <p class="float-right">Date: {{ $transationDate }}</p>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row col-12 invoice-info">
                  <div class="col-6 invoice-col">
                    From
                    <address>
                      <strong>{{ $users->first_name }}</strong><br>
                      {{ $users->home_address }}<br>
                      {{ $users->street_address . " " .  $users->street_address . " " .  $users->city }}<br>
                      Phone: {{ $users->contact_number }}<br>
                      Email: {{ $users->email }}
                    </address>
                  </div>
                  <div class="col-6 invoice-col">
                    To
                    <div>
                      <strong>{{ env('APP_NAME') }}</strong><br>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #{{ $users->id . $transactions->id .  $products->id   }}</b><br>
                        <br>
                        <b>Order ID:{{ $users->id . $transactions->id .  $products->id   }}</b> <br>
                      </div>
                  </div>
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
                    <p>Paypal (online payment)</p>
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
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>

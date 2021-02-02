<div class="text-white row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="p-2 rounded small-box bg-info">
        <div class="inner">
          <h3 class="font-weight-bold">{{ $totalInquiries->inquiries_count }}</h3>
          <p>Inquiry Total</p>
        </div>
        <a href="/customer-all/inquiries" class="text-white small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="p-2 rounded small-box bg-success">
        <div class="inner">
          <h3 class="font-weight-bold">{{ $totalOrders->transaction_count }}</h3>
          <p>Total order</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/orders/viewallOrders/transactions" class="text-white small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="p-2 rounded small-box bg-warning">
        <div class="inner">
          <h3 class="font-weight-bold">{{ $totalUsers->users_count }}</h3>
          <p>Total Users</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/customer-all" class="text-white small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="p-2 rounded small-box bg-danger">
        <div class="inner">
          <h3 class="font-weight-bold">{{ $totalProducts->product_count }}</h3>
          <p>Total Products</p>
        </div>
        <a href="/product/all" class="text-white small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
<div class="mt-5 ">
    <div class="row col-md-12">
        <div class="col-md-6">
            <canvas id="inquiry" ></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="order" ></canvas>
        </div>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-6">
            <canvas id="customerStatus" ></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="productStatus" ></canvas>
        </div>
    </div>
</div>

<script>

var inquiry = new Chart(document.getElementById('inquiry').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($inquiries_month)!!},
        datasets: [{
            label: '# of inquiries',
            data: {!!json_encode($inquiries_values)!!},
            backgroundColor: '#17a2b8',
            borderColor: '#17a2b8',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


var order = new Chart(document.getElementById('order').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($order_values)!!},
        datasets: [{
            label: '# of order',
            data: {!!json_encode($order_values)!!},
            backgroundColor: '#17a2b8',
            borderColor:'#17a2b8',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


var customerStatus = new Chart(document.getElementById('customerStatus').getContext('2d'), {
    type: 'pie',
    data: {
        labels: ['not verified', 'verified'],
        datasets: [{
            label: '# of customer status',
            data: {!!json_encode($customerStatus)!!},
            backgroundColor: ['#dc3545','#007bff'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var productStatus = new Chart(document.getElementById('productStatus').getContext('2d'), {
    type: 'pie',
    data: {
        labels: ['pending', 'publish'],
        datasets: [{
            label: '# of Votes',
            data: {!!json_encode($productStatus)!!},
            backgroundColor: ['#dc3545','#007bff'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>

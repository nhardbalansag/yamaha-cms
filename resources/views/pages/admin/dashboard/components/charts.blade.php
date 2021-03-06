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
            <div>
                <p style="font-size:30px">Inquiry Report ({{ $inquiries_year ? $inquiries_year[0] : 'no current data' }})</p>
            </div>
            <canvas id="inquiry" ></canvas>
        </div>
        <div class="col-md-6">
            <p style="font-size:30px">Order Report  ({{ $order_year ? $order_year[0] : 'no current data' }})</p>
            <canvas id="order" ></canvas>
        </div>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-6">
            <div>
                <p style="font-size:30px">Not Verified Customer  ({{ $customerStatus_not_verified_year ? $customerStatus_not_verified_year[0] : 'no current data' }})</p>
            </div>
            <canvas id="notverified" ></canvas>
        </div>
        <div class="col-md-6">
            <div>
                <p style="font-size:30px">Verified Customer  ({{ $customerStatus_verified_year ? $customerStatus_verified_year[0] : 'no current data' }})</p>
            </div>
            <canvas id="verified" ></canvas>
        </div>
    </div>
    <hr>
    <div class="row col-md-12">
        <div class="col-md-6">
            <div>
                <p style="font-size:30px">Publish Products  ({{ $publish_year ? $publish_year[0] : 'no current data' }})</p>
            </div>
            <canvas id="publish" ></canvas>
        </div>
        <div class="col-md-6">
            <div>
                <p style="font-size:30px">Pending Products  ({{ $pending_year ? $pending_year[0] : 'no current data' }})</p>
            </div>
            <canvas id="pending" ></canvas>
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
        labels: {!!json_encode($order_month)!!},
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

var notverified = new Chart(document.getElementById('notverified').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($customerStatus_not_verified_month)!!},
        datasets: [{
            label: '# of not Verified Customer',
            data: {!!json_encode($customerStatus_not_verified_values)!!},
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

var verified = new Chart(document.getElementById('verified').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($customerStatus_verified_month)!!},
        datasets: [{
            label: '# of Verified Customer',
            data: {!!json_encode($customerStatus_verified_values)!!},
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


var publish = new Chart(document.getElementById('publish').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($publish_month)!!},
        datasets: [{
            label: '# of publish products',
            data: {!!json_encode($publish_values)!!},
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



var pending = new Chart(document.getElementById('pending').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($pending_month)!!},
        datasets: [{
            label: '# of pending products',
            data: {!!json_encode($pending_values)!!},
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

</script>

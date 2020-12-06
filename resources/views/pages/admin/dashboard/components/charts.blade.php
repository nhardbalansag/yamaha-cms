<div class="row col-md-12">
    <div class="col-md-4">
        <canvas id="inquiry" height="250"></canvas>
    </div>
    <div class="col-md-4">
        <canvas id="reserve" height="250"></canvas>
    </div>
    <div class="col-md-4">
        <canvas id="order" height="250"></canvas>
    </div>
</div>
<hr>
<div class="row col-md-12">
    <div class="col-md-6">
        <canvas id="customerStatus"></canvas>
    </div>
     <div class="col-md-6">
        <canvas id="productStatus"></canvas>
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
            backgroundColor: 'rgb(3,76,141)',
            borderColor: 'rgb(3,76,141)',
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

 
var reserve = new Chart(document.getElementById('reserve').getContext('2d'), {
    type: {!!json_encode($type)!!},
    data: {
        labels: {!!json_encode($reserve_month)!!},
        datasets: [{
            label: '# of reservations',
            data: {!!json_encode($reserve_values)!!},
            backgroundColor: 'rgba(3,76,141, .3)',
            borderColor: 'rgba(3,76,141)',
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
            backgroundColor: 'rgba(3,76,141, .3)',
            borderColor:'rgba(3,76,141)',
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

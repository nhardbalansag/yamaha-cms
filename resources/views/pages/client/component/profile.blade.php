 <div>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="text-center profile-username text-capitalize">{{$account_info[0]->last_name}}, {{$account_info[0]->first_name}}</h3>
            <p class="text-center text-muted">{{$account_info[0]->role}}</p>
            <ul class="mb-3 list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Orders</b> <a class="float-right">{{count($transactionData)}}</a>
            </li>
            <li class="list-group-item">
                <b>Reserve</b> <a class="float-right">to be continued</a>
            </li>
            </ul>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Information</h3>
        </div>
        <div class="card-body">
            <strong><i class="mr-1 fas fa-book"></i>Address</strong>
            <p class="text-muted">
                {{$account_info[0]->home_address}}, 
                {{$account_info[0]->street_address}}, 
                {{$account_info[0]->city}}, 
                {{$account_info[0]->country_region}}
                
            </p>
            <hr>
             <strong><i class="mr-1 fas fa-book"></i>Postal</strong>
            <p class="text-muted">
                {{$account_info[0]->postal}}
            </p>
             <hr>
             <strong><i class="mr-1 fas fa-book"></i>email</strong>
            <p class="text-muted">
                {{$account_info[0]->email}}
            </p>
            <hr>
             <strong><i class="mr-1 fas fa-book"></i>Contact number</strong>
            <p class="text-muted">
                {{$account_info[0]->contact_number}}
            </p>
            <hr>
        </div>
    </div>
</div>
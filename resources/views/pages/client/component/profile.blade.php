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
             <strong><i class="mr-1 fas fa-book"></i>Email</strong>
            <div class="p-0 row col-12 col-md-12">
                <div class="col-12 col-md-4">
                    <p class="text-muted">
                        {{$account_info[0]->email}}
                    </p>
                </div>
                <div class="mx-auto col-12 col-md-4">
                    <p class="px-2 text-capitalize btn btn-sm text-white rounded-pill {{Auth::user()->verified == 1 ? "bg-success" : "bg-danger"}}">
                        {{Auth::user()->verified == 1 ? "verified" : "not verified"}}
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    @if(Auth::user()->verified != 1)
                        <a href="/my-account/verify/index">verify email</a>
                    @endif
                </div>
            </div>
            <hr>
             <strong><i class="mr-1 fas fa-book"></i>Contact number</strong>
            <p class="text-muted">
                {{$account_info[0]->contact_number}}
            </p>
            <hr>
            <div class="pb-4">
                <strong><i class="mr-1 fas fa-book"></i>Loan Credentials</strong>
            </div>
            <div class="text-center row col-12">
                <div class="col-6">
                    <p>Status</p>
                </div> 
                <div class="col-6">
                    <p>Action</p>
                </div> 
            </div>
            <div class="text-center col-12 row">
                <div class="col-6">
                    <p class="px-2 text-white text-capitalize btn btn-sm rounded-pill bg-danger">
                        not verified
                    </p>
                </div>
                <div class="col-6">
                    <a href="/my-account/credential/documents/set-up">set up credentials for loan</a>
                </div>
            </div>
        </div>
    </div>
</div>
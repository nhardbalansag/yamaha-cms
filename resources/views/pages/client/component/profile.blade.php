 <div>
    <div class="mb-2 card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="text-center profile-username text-capitalize">{{$account_info->last_name}}, {{$account_info->first_name}}</h3>
            <p class="text-center text-muted">{{$account_info->role}}</p>
            <ul class="mb-3 list-group list-group-unbordered">
            <li class="list-group-item">
                <div class="p-0 row col-12">
                    <div class="col-8">
                        <p class="font-weight-bold">Orders</p>
                    </div>
                    <div class="p-0 col-4 d-flex justify-content-end ">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p>({{count($transactionData)}})</p>
                    </div>
                </div>
            </li>
            </ul>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Information</h3>
        </div>
        <div class="card-body">
            <strong><i class="mr-1 fas fa-map-marker-alt"></i>Address</strong>
            <p class="text-muted">
                {{$account_info->home_address}},
                {{$account_info->street_address}},
                {{$account_info->city}},
                {{$account_info->country_region}}

            </p>
            <hr>
             <strong><i class="mr-1 fas fa-mail-bulk"></i>Postal</strong>
            <p class="text-muted">
                {{$account_info->postal}}
            </p>
             <hr>
             <strong><i class="mr-1 fas fa-envelope"></i>Email</strong>
            <div class="p-0 row col-12 col-md-12">
                <div class="col-12 col-md-4">
                    <p class="text-muted">
                        {{$account_info->email}}
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
             <strong><i class="mr-1 fas fa-mobile-alt"></i>Contact number</strong>
            <p class="text-muted">
                {{$account_info->contact_number}}
            </p>
            <hr>
            <div class="pb-4">
                <strong><i class="mr-1 fas fa-file-alt"></i>Loan Credentials</strong>
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
                    <p class="px-2 text-white text-capitalize btn btn-sm rounded-pill  {{ $approval_result >= 100 ? "bg-success" : "bg-danger" }}">
                        {{$approval_result >= 100 ? "verified" : "not verified"}}
                    </p>
                </div>
                <div class="col-6">
                    <a href="/my-account/credential/documents/set-up">set up credentials for loan</a>
                </div>
            </div>
        </div>
    </div>
</div>

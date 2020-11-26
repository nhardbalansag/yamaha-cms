 <div>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            {{-- <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
            </div> --}}
            <h3 class="profile-username text-center text-capitalize">{{$account_info[0]->last_name}}, {{$account_info[0]->first_name}}</h3>
            <p class="text-muted text-center">{{$account_info[0]->role}}</p>
            <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Orders</b> <a class="float-right">1,322</a>
            </li>
            <li class="list-group-item">
                <b>Reserve</b> <a class="float-right">543</a>
            </li>
            </ul>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Information</h3>
        </div>
        <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i>Address</strong>
            <p class="text-muted">
                {{$account_info[0]->home_address}}, 
                {{$account_info[0]->street_address}}, 
                {{$account_info[0]->city}}, 
                {{$account_info[0]->country_region}}
                
            </p>
            <hr>
             <strong><i class="fas fa-book mr-1"></i>Postal</strong>
            <p class="text-muted">
                {{$account_info[0]->postal}}
            </p>
             <hr>
             <strong><i class="fas fa-book mr-1"></i>email</strong>
            <p class="text-muted">
                {{$account_info[0]->email}}
            </p>
            <hr>
             <strong><i class="fas fa-book mr-1"></i>Contact number</strong>
            <p class="text-muted">
                {{$account_info[0]->contact_number}}
            </p>
            <hr>
        </div>
    </div>
</div>
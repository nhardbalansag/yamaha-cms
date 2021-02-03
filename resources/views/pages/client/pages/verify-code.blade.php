@extends('welcome')
@section('home-contents')
    <div class="mt-2 d-flex justify-content-center align-items-center">

        <form action="/my-account/verify/email/code" method="POST">
            @csrf
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <div class="{{ $result_bool == false ? 'alert alert-warning' : 'alert alert-success' }}" role="alert">
                        {{ $result }}
                    </div>
                </div>
                <div class="form-group ">
                    <label for="verificationCode" class="text-capitalize">enter your verification code</label>
                    <input  type="text" name="verificationCode" class="form-control form-control-lg " id="verificationCode" value="">
                </div>
            </div>
            <button class="btn btn-primary">Verify Code</button>
        </form>
    </div>
@endsection

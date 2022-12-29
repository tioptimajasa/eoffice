@extends('layouts.auth-main')

@section('content')
<div class="form-body">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{ asset('assets/auth/img/office.png')}}"  alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="logo">
                        <center><img class="logo-size" src="{{ asset('assets/auth/img/poj.png')}}" alt=""><center>
                    </div></br>
                    {{-- <h3>e-office</h3></br> --}}
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button" style="display: flex; flex-direction: row">
                            <button id="submit" type="submit" class="ibtn">Sign In</button>
                            <a href="{{ route('password.email') }}"id="forgot-pass" type="submit" class="ibtn">Forgot Password</a>
                        </div>
                    </form>
                    <p class="text-center"> Development IT Optimajasa</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

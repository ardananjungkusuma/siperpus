@extends('auth.template')
@section('title')
Login | SIPERPUS
@endsection
@section('content')
<!-- login area start -->
<div class="login-area login-bg">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="/auth/postLogin" method="POST">
                <div class="login-form-head">
                    <h4>Login</h4>
                    <p>SISTEM INFORMASI PERPUSTAKAAN</p>
                </div>
                @csrf
                <div class="login-form-body">
                    @if(session('status'))
                    <div class="alert alert-info" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" required id="exampleInputEmail1">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" required id="exampleInputPassword1">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Belum Menjadi Anggota? <a href="/auth/register">Daftar Sekarang!</a></p>
                        <a href="/">Back to Homepage <i class="ti-home"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->
@endsection
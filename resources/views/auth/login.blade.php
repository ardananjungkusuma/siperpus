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
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember
                                    Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Belum Menjadi Anggota? <a href="/auth/register">Daftar Sekarang!</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->
@endsection
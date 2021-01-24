@extends('auth.template')
@section('title')
Register Anggota | SIPERPUS
@endsection
@section('content')
<!-- login area start -->
<div class="login-area login-bg">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="/auth/postRegister" method="POST">
                @csrf
                <div class="login-form-head">
                    <h4>Register Anggota</h4>
                    <p>SISTEM INFORMASI PERPUSTAKAAN</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputName1">Nama Lengkap</label>
                        <input type="text" id="exampleInputName1" value="{{ old('name') }}" name="name" required>
                        <i class="ti-user"></i>
                        @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputName1">Alamat Lengkap</label>
                        <input type="text" id="exampleInputName1" value="{{ old('alamat') }}" name="alamat" required>
                        <i class="ti-home"></i>
                        @if($errors->has('alamat'))
                        <div class="text-danger">{{ $errors->first('alamat') }}</div>
                        @endif
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputName1">Nomor Handphone</label>
                        <input type="number" id="exampleInputName1" value="{{ old('no_hp') }}" name="no_hp" required>
                        <i class="fa fa-phone-square"></i>
                        @if($errors->has('no_hp'))
                        <div class="text-danger">{{ $errors->first('no_hp') }}</div>
                        @endif
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" id="exampleInputEmail1" value="{{ old('email') }}" name="email" required>
                        <i class="ti-email"></i>
                        @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password">
                        <i class="ti-lock"></i>
                        @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" id="exampleInputPassword1" name="password_confirmation">
                        <i class="ti-lock"></i>
                        @if($errors->has('password_confirmation'))
                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Sudah memiliki akun? <a href="/auth/login">Login Sekarang!</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('templates.master')
@section('title')
Ganti Password | SIPERPUS
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Change Password</h4>
                    <form action="/anggota/password/change" method="POST">
                        @csrf
                        <div class="form-gp">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" id="exampleInputPassword1" name="password" required>
                            <i class="ti-lock"></i>
                            @if($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Confirm New Password</label>
                            <input type="password" id="exampleInputPassword1" name="password_confirmation" required>
                            <i class="ti-lock"></i>
                            @if($errors->has('password_confirmation'))
                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                        <div class="submit-btn-area">
                            <button type="submit" id="form_submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
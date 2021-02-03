@extends('templates.master')
@section('title')
Detail Pengumuman | SIPERPUS
@endsection
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <a href="/kelola/pengumuman/daftar"><i class="fa fa-arrow-left"></i> Back to Daftar Pengumuman</a>
                    <center>
                        <h2 class="m-3">{{ $pengumuman->judul }}</h2>
                        <div class="m-2"><i class="fa fa-user"></i> : {{ $pengumuman->user->name }} | <i
                                class="fa fa-calendar"></i> :
                            {{ date("d-m-Y", strtotime($pengumuman->created_at->toDateString())) }}</div>
                        <img src="{{ asset('img/pengumuman/' . $pengumuman->gambar_header) }}"
                            style="width:100%;max-width:500px">
                    </center>
                    <div class="m-5">
                        {!! $pengumuman->isi !!}
                    </div>
                    Posted : {{ $pengumuman->created_at->diffForHumans() }} | Updated :
                    {{ $pengumuman->updated_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
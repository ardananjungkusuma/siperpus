@extends('homepage.templates.master')
@section('title')
{{ $pengumuman->judul }} | SIPERPUS
@endsection
@section('content')
<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url({{ asset('img/pengumuman/' . $pengumuman->gambar_header) }})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>{{ $pengumuman->judul }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_area plus_padding">
    <div class="container">
        <a href="/pengumuman"><i class="fa fa-arrow-left"></i> Back to Daftar Pengumuman</a>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <h2 class="mb-5">{{ $pengumuman->judul }}</h2>
                <img src="{{ asset('img/pengumuman/' . $pengumuman->gambar_header) }}" alt="{{ $pengumuman->judul }}"
                    style="width: 100%;max-width: 350px">
                <h5 class="m-3"><i class="fa fa-user"></i> : {{ $pengumuman->user->name }} | <i
                        class="fa fa-calendar"></i> :
                    {{ date("d-m-Y", strtotime($pengumuman->created_at->toDateString())) }}</h5>
            </div>
            <p>{!! $pengumuman->isi !!}</p>
        </div>
    </div>
</div>
@endsection
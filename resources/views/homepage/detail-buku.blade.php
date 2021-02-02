@extends('homepage.templates.master')
@section('title')
Katalog Buku | SIPERPUS
@endsection
@section('content')
<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url({{ asset('img/buku/' . $buku->gambar) }})">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>{{ $buku->nama }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_area plus_padding">
    <div class="container">
        <a href="/buku/katalog"><i class="fa fa-arrow-left"></i> Back to Katalog Buku</a>
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <h2 class="mb-5">{{ $buku->nama }}</h2>
                <img src="{{ asset('img/buku/' . $buku->gambar) }}" alt="{{ $buku->nama }}"
                    style="width: 100%;max-width: 350px">
                <h5 class="m-3">Pengarang : {{ $buku->pengarang }}</h5>
                <p>{{ $buku->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('homepage.templates.master')
@section('title')
Katalog Buku | SIPERPUS
@endsection
@section('content')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Katalog Buku</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_area plus_padding">
    <div class="container">
        <nav class="navbar">
            <form class="form-inline" method="POST" action="/buku/katalog">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Nama Buku"
                    aria-label="Search" required>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari Buku</button>
            </form>
        </nav>
        <div class="row">
            @foreach($buku as $b)
            <div class="col-sm-4">
                <div class="card border-0 mt-5">
                    <a href="/buku/detail/{{ $b->slug }}">
                        <img src="{{ asset('img/buku/' . $b->gambar) }}"
                            style="object-fit: cover;width:100%;height:15vw">
                    </a>
                    <div class="card-block mt-3">
                        <a href="/buku/detail/{{ $b->slug }}">
                            <h4 class="card-title m-2">{{ $b->nama }}</h4>
                        </a>
                        <p class="card-text m-2">{{ substr($b->deskripsi,0,130) }}... <a
                                href="/buku/detail/{{ $b->slug }}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center mt-5">
            {{ $buku->links() }}
        </div>
    </div>
</div>
@endsection
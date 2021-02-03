@extends('homepage.templates.master')
@section('title')
Pengumuman & Informasi | SIPERPUS
@endsection
@section('content')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Pengumuman & Informasi</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_area plus_padding">
    <div class="container">
        <div class="row">
            @foreach($pengumuman as $p)
            <div class="col-lg-12">
                <div class="card border-0 mt-5">
                    <a href="/pengumuman/detail/{{ $p->slug }}">
                        <img src="{{ asset('img/pengumuman/' . $p->gambar_header) }}"
                            style="object-fit: cover;width:100%;height:15vw">
                    </a>
                    <div class="card-block mt-3">
                        <a href="/pengumuman/detail/{{ $p->slug }}">
                            <h4 class="card-title m-2">{{ $p->judul }}</h4>
                        </a>
                        <p class="card-text m-2">{!! substr($p->isi,0,330) !!}... <a
                                href="/pengumuman/detail/{{ $p->slug }}">Read More</a></p>
                        Posted : {{ $p->created_at->diffForHumans() }} | <i class="fa fa-calendar"></i>
                        {{ date("d-m-Y", strtotime($p->created_at->toDateString())) }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center mt-5">
            {{ $pengumuman->links() }}
        </div>
    </div>
</div>
@endsection
@extends('templates.master')
@section('title')
Dashboard Pegawai | SIPERPUS
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Dashboard</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-share"></i> Total Peminjaman Buku</div>
                                        <h2>{{ $peminjaman }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg3">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-book"></i> Buku Belum Dikembalikan
                                        </div>
                                        <h2>{{ $peminjaman_belum_dikembalikan }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-md-5 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-book"></i> Buku Sudah Dikembalikan
                                        </div>
                                        <h2>{{ $peminjaman_sudah_dikembalikan  }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
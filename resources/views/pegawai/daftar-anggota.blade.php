@extends('templates.master')
@section('title')
Daftar Anggota | SIPERPUS
@endsection
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Daftar Anggota Perpustakaan</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize bg-danger text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Status Anggota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($anggota as $anggota)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $anggota->name }}</td>
                                    <td>{{ $anggota->email }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>{{ $anggota->no_hp }}</td>
                                    <td>{{ $anggota->status_user }}</td>
                                    <td>
                                        <?php
                                            if($anggota->status_user ==  "Aktif"){ ?>
                                        <a onclick="return confirm('Apakah anda yakin ingin menonaktifkan anggota?')"
                                            href="/kelola/anggota/status/nonaktifkan/{{ $anggota->id }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-times-circle"></i>
                                            Nonaktifkan</a>
                                        <?php
                                        }else{ ?>
                                        <a onclick="return confirm('Apakah anda yakin ingin mengaktifkan anggota?')"
                                            href="/kelola/anggota/status/aktifkan/{{ $anggota->id }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i>
                                            Aktifkan</a>
                                        <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <?php $no++  ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
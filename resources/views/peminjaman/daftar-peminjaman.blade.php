@extends('templates.master')
@section('title')
Daftar Peminjaman | SIPERPUS
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Daftar Peminjaman Buku Perpustakaan</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                        data-target="#addPeminjamanModal">
                        Tambah Data Peminjaman
                    </button>
                    <div class="table-responsive">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Denda</th>
                                    <th>Status Pinjaman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($peminjaman as $peminjaman)
                                <tr>
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

{{-- Tambah peminjaman Modal --}}
<div class="modal fade" id="addPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjam Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelola/peminjaman/tambah" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Buku</label><br>
                        <select class="select-two form-control" id="nama_buku" name="nama_buku" required
                            style="width:100%">
                            <option value="">Cari Buku / Penulis</option>
                            @foreach($buku as $buku)
                            <option value="{{ $buku['nama'] }}">{{ $buku['nama'] . " - " . $buku['pengarang'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Peminjam</label><br>
                        <select class="select-two form-control" id="id_user" name="id_user" required style="width:100%">
                            <option value="">Cari Data Peminjam</option>
                            @foreach($user as $user)
                            <option value="{{ $user['id'] }}">{{ $user['name'] . " - " . $user['email'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Peminjaman : <b>{{ $today = date('d-m-Y') }}</b></label>
                        <label>Maksimal Tanggal Pengembalian :
                            <b>{{ date('d-m-y', strtotime("+7 day", strtotime($today))) }}</b></label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Data Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select-two').select2({
            dropdownParent: $("#addPeminjamanModal"),
            minimumInputLength: 3
        });
    });
</script>
@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
@extends('templates.master')
@section('title')
Daftar Pegawai | SIPERPUS
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
                    <h4 class="header-title">Daftar Pegawai Perpustakaan</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                        data-target="#addPegawaiModal">
                        Tambah Pegawai
                    </button>
                    <div class="table-responsive">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize text-white" style="background-color: lightseagreen">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($pegawai as $pegawai)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $pegawai->name }}</td>
                                    <td>{{ $pegawai->email }}</td>
                                    <td>{{ $pegawai->alamat }}</td>
                                    <td>{{ $pegawai->no_hp }}</td>
                                    <td>
                                        <a onclick="return confirm('Apakah anda yakin ingin menjadikan {{ $pegawai->name }} sebagai admin?')"
                                            href="/kelola/pegawai/setadmin/{{ $pegawai->id }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-shield"></i>
                                            Jadikan Admin</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus akun pegawai?')"
                                            href="/kelola/pegawai/hapus/{{ $pegawai->id }}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                            Hapus</a>
                                    </td>
                                </tr>
                                <?php $no++  ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h4 class="header-title">Daftar Admin Perpustakaan</h4>
                    <div class="table-responsive">
                        <table id="dataTable2" class="text-center">
                            <thead class="text-capitalize text-white" style="background-color: rgb(46, 49, 199)">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($admin as $admin)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->alamat }}</td>
                                    <td>{{ $admin->no_hp }}</td>
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

<div class="modal fade" id="addPegawaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelola/pegawai/tambah" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" name="name" class="form-control" required>
                        @if($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                        @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                        @if($errors->has('alamat'))
                        <div class="text-danger">{{ $errors->first('alamat') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="no_hp" class="form-control" required>
                        @if($errors->has('no_hp'))
                        <div class="text-danger">{{ $errors->first('no_hp') }}</div>
                        @endif
                    </div>
                    <small>
                        <span style="color:red">*Semua data wajib diisi.</span><br>
                        *<b>Saat pertama kali tambah pegawai secara default password pegawai adalah pegawai123 dan nanti
                            bisa diganti password oleh pegawai itu sendiri</b>
                    </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Pegawai Baru</button>
                </form>
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
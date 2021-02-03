@extends('templates.master')
@section('title')
Daftar Pengumuman | SIPERPUS
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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Daftar Pengumuman Perpustakaan</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <a href="/kelola/pengumuman/tambah" class="btn btn-primary mb-3">
                        Buat Pengumuman
                    </a>
                    <div class="table-responsive">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Post</th>
                                    <th>Author</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($pengumuman as $pengumuman)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ date("d-m-Y", strtotime($pengumuman->created_at->toDateString()))  }}</td>
                                    <td>{{ $pengumuman->user->name }}</td>
                                    <td>{{ $pengumuman->judul }}</td>
                                    <td>
                                        <a href="/kelola/pengumuman/detail/{{ $pengumuman->slug }}"
                                            class="badge badge-info btn-sm m-1"><i class="fa fa-eye"></i>
                                            Detail</a>
                                        <a href="/kelola/pengumuman/edit/{{ $pengumuman->slug }}"
                                            class="badge badge-warning btn-sm m-1"><i class="fa fa-pencil"></i>
                                            Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus pengumuman ini?')"
                                            href="/kelola/pengumuman/delete/{{ $pengumuman->slug }}"
                                            class="badge badge-danger btn-sm m-1"><i class="fa fa-trash"></i> Hapus</a>
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

<script>
    CKEDITOR.replace( 'isi' );
</script>
@endsection
@section('footer')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
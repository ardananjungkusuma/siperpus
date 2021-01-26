@extends('templates.master')
@section('title')
Daftar Buku | SIPERPUS
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
                    <h4 class="header-title">Daftar Buku Perpustakaan</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBukuModal">
                        Tambah Data Buku
                    </button>
                    <div class="table-responsive">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($buku as $buku)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $buku['nama'] }}</td>
                                    <td><img src="{{ asset('img/buku/' . $buku['gambar']) }}"
                                            style="width:100%;max-width:150px"></td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#detailModal"
                                            onclick="detailBuku('{{ $buku['slug'] }}')">Detail</button>
                                        <button data-toggle="modal" data-target="#editBukuModal"
                                            onclick="editBuku('{{ $buku['slug'] }}')"
                                            class="btn btn-warning">Edit</button>
                                        <a href="/kelola/buku/delete/{{ $buku['slug'] }}"
                                            onclick="confirm('Apakah anda yakin ingin menghapus data buku ini?')"
                                            class="btn btn-danger">Hapus</a>
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

{{-- Tambah Buku Modal --}}
<div class="modal fade" id="addBukuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelola/buku/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Buku</label>
                        <textarea type="text" name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar Sampul Buku</label>
                        <input type="file" class="form-control-file" name="gambar">
                    </div>
                    <small>
                        *Gambar format : <span style="color:red">JPG, JPEG, PNG, maksimal ukuran 3mb</span><br>
                        *Gambar <b>Tidak Wajib Diupload</b>
                    </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Tambah Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Detail Buku Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Buku</span>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <center class="mb-4">
                    <h6 id="judul_buku_detail"></h6>
                </center>
                <center>
                    <div id="gambar_detail" class="mb-2"></div>
                    <span id="pengarang_detail" class="mb-5" style="font-weight: bold"></span><br>
                </center>
                <span id="deskripsi_detail" style="white-space: pre-line"></span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Buku --}}
<div class="modal fade" id="editBukuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <div id="current_gambar" class="mb-3 mt-4"></div>
                </center>
                <form action="/kelola/buku/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="slug" id="edit_slug" required>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" name="nama" id="edit_nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" name="pengarang" id="edit_pengarang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Buku</label>
                        <textarea type="text" name="deskripsi" id="edit_deskripsi" class="form-control" rows="4"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar Sampul Buku</label>
                        <input type="file" class="form-control-file" name="gambar">
                    </div>
                    <small>
                        *Gambar format : <span style="color:red">JPG, JPEG, PNG, maksimal ukuran 3mb</span><br>
                        <b>* Jika ingin mengganti foto buku silahkan pilih gambar. Jika tidak biarkan kosong.</b>
                    </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function detailBuku(slug) {
            let judul_buku = document.getElementById(`judul_buku_detail`);
            let pengarang_buku = document.getElementById(`pengarang_detail`);
            let deskripsi_buku = document.getElementById(`deskripsi_detail`);
            $.ajax({
                type: `GET`,
                url: `/kelola/buku/detail/${slug}`,
                dataType: 'json',
                success: (hasil) => {
                    hasil.forEach(function(item){
                        judul_buku.textContent = item.nama;
                        $("#gambar_detail").html(`<img src="{{ asset('img/buku/${item.gambar}') }}" style="width:100%;max-width:150px">`)
                        pengarang_buku.textContent = item.pengarang;
                        deskripsi_buku.textContent = item.deskripsi;
                    });
                }
            });
        }

        function editBuku(slug){
            $.ajax({
                type: `GET`,
                url: `/kelola/buku/detail/${slug}`,
                dataType: 'json',
                success: (hasil) => {
                    hasil.forEach(function(item){
                        $("#current_gambar").html(`<img src="{{ asset('img/buku/${item.gambar}') }}" style="width:100%;max-width:150px">`)
                        document.getElementById(`edit_slug`).value = item.slug;
                        document.getElementById(`edit_nama`).value = item.nama;
                        document.getElementById(`edit_pengarang`).value = item.pengarang;
                        document.getElementById(`edit_deskripsi`).value = item.deskripsi;
                    });
                }
            });
        }
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
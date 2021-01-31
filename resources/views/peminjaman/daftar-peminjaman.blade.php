@extends('templates.master')
@section('title')
Daftar Peminjaman Buku | SIPERPUS
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
<img id="loading-image" src="{{ asset('img/loader.gif') }}"
    style="display:none;position:fixed;left: 50%;top:35%;z-index: 1000;;height 35px" />
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
                    <button type="button" class="btn btn-info mb-3" data-toggle="modal"
                        data-target="#addPeminjamanModal">
                        Tambah Data Peminjaman
                    </button>
                    <div class="table-responsive">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize bg-info text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Maksimal Pengembalian</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Buku</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($peminjaman as $peminjaman)
                                <tr>
                                    <?php
                                        // Penghitungan Jarak Maksimal Pengembalian dan Hari Sekarang
                                        date_default_timezone_set("Asia/Bangkok");
                                        $date1= date('Y-m-d');
                                        $date2= $peminjaman->tanggal_maks_pengembalian;
                                        $diff = abs(strtotime($date2) - strtotime($date1));
                                        $years = floor($diff / (365*60*60*24));
                                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                        if($date1 > $date2){
                                            $hari_pengembalian =  $days;
                                        }else{
                                            $hari_pengembalian =  "-" . $days;
                                        }
                                    ?>
                                    <td>{{ $no }}</td>
                                    <td>{{ date("d-m-Y", strtotime($peminjaman->tanggal_pinjam))  }}</td>
                                    <td>{{ date("d-m-Y", strtotime($peminjaman->tanggal_maks_pengembalian))  }}</td>
                                    <td>{{ $peminjaman->user->name }}</td>
                                    <td>{{ $peminjaman->nama_buku }}</td>
                                    <td>{{ $peminjaman->status_peminjaman }}</td>
                                    <td>
                                        <button class="badge badge-info btn-sm m-1" data-toggle="modal"
                                            data-target="#detailModal"
                                            onclick="detailPeminjaman('{{ $peminjaman->id }}','{{ $peminjaman->user->name }}')"><i
                                                class="fa fa-eye"></i>
                                            Detail</button>
                                        <?php if($peminjaman->status_peminjaman == "Belum Dikembalikan"){ ?>
                                        <button class="badge badge-success btn-sm m-1" data-toggle="modal"
                                            data-target="#pengembalianModal"
                                            onclick="pengembalianPinjaman('{{ $peminjaman->id }}','{{ $hari_pengembalian }}','{{ $peminjaman->user->name }}','{{ date('Y-m-d') }}')"><i
                                                class="fa fa-undo"></i>
                                            Pengembalian</button>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data peminjaman ini?')"
                                            href="/kelola/peminjaman/delete/{{ $peminjaman->id }}"
                                            class="badge badge-danger btn-sm m-1"><i class="fa fa-trash"></i>Hapus</a>
                                        <?php } ?>
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
                        <?php date_default_timezone_set("Asia/Bangkok") ?>
                        <label>Tanggal Peminjaman : <b>{{ $today = date('d-m-Y') }}</b></label>
                        <label>Maksimal Tanggal Pengembalian :
                            <b>{{ date('d-m-y', strtotime("+7 day", strtotime($today))) }}</b></label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Tambah Data Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Detail Peminjaman Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</span>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <label style="font-weight: bolder">Nama Peminjam : </label><span id="nama_peminjam_detail"></span><br>
                <label style="font-weight: bolder">Nama Buku : </label><span id="nama_buku_detail"></span><br>
                <label style="font-weight: bolder">Tanggal Pinjam : </label><span id="tanggal_pinjam_detail"></span><br>
                <label style="font-weight: bolder">Tanggal Maksimal Pengembalian : </label><span
                    id="tanggal_maks_pengembalian_detail"></span><br>
                <label style="font-weight: bolder">Tanggal Kembali : </label><span
                    id="tanggal_kembali_detail"></span><br>
                <label style="font-weight: bolder">Denda : </label><span id="denda_detail"></span><br>
                <label style="font-weight: bolder">Status Peminjaman : </label><span
                    id="status_peminjaman_detail"></span><br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Pengembalian Modal --}}
<div class="modal fade" id="pengembalianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelola/peminjaman/pengembalian" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit_id" required>
                    <div class="form-group">
                        <label>Nama Peminjam</label>
                        <input type="text" id="edit_nama_peminjam" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" id="edit_nama_buku" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" id="edit_tanggal_pinjam" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Maks Pengembalian</label>
                        <input type="date" id="edit_tanggal_maks_pengembalian" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali (Hari Ini)</label>
                        <input type="date" name="tanggal_kembali" id="edit_tanggal_kembali" required readonly
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Denda</label>
                        <input type="number" name="denda" id="edit_denda" required readonly class="form-control">
                    </div>
                    <small>
                        <h6>*Aturan : <span style="color:red">Anggota Harus membayar denda terlebih dahulu jika ingin
                                mengembalikan buku.</span></h6>
                    </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button onclick="return confirm('Lanjutkan Proses Pengembalian Pinjaman?')" type="submit"
                    class="btn btn-success">Pengembalian Pinjaman</button>
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

    function detailPeminjaman(id, nama_anggota) {
            let nama_peminjam = document.getElementById(`nama_peminjam_detail`);
            let nama_buku = document.getElementById(`nama_buku_detail`);
            let tanggal_pinjam = document.getElementById(`tanggal_pinjam_detail`);
            let tanggal_maks_pengembalian = document.getElementById(`tanggal_maks_pengembalian_detail`);
            let tanggal_kembali = document.getElementById(`tanggal_kembali_detail`);
            let denda = document.getElementById(`denda_detail`);
            let status_peminjaman = document.getElementById(`status_peminjaman_detail`);
            $.ajax({
                type: `GET`,
                url: `/kelola/peminjaman/detail/${id}`,
                dataType: 'json',
                beforeSend: function() {
                    $("#loading-image").show();
                },
                success: (hasil) => {
                    nama_peminjam.textContent = nama_anggota;
                    nama_buku.textContent = hasil.nama_buku;
                    tanggal_pinjam.textContent =  hasil.tanggal_pinjam.split("-").reverse().join("-");
                    tanggal_maks_pengembalian.textContent = hasil.tanggal_maks_pengembalian.split("-").reverse().join("-");
                    if(!hasil.tanggal_kembali){
                        tanggal_kembali.textContent = hasil.tanggal_kembali;
                    }else{
                        tanggal_kembali.textContent = hasil.tanggal_kembali.split("-").reverse().join("-");
                    }
                    denda.textContent = hasil.denda;
                    status_peminjaman.textContent = hasil.status_peminjaman;
                    $("#loading-image").hide();
                }
            });
        }

        function pengembalianPinjaman(id, hari_pengembalian, nama_anggota, today){
            let denda_per_hari = 5000; // Denda Perpustakaan jika terlambat adalah 5000 perhari
            let id_peminjaman = document.getElementById(`edit_id`);
            let nama_peminjam = document.getElementById(`edit_nama_peminjam`);
            let nama_buku = document.getElementById(`edit_nama_buku`);
            let tanggal_pinjam = document.getElementById(`edit_tanggal_pinjam`);
            let tanggal_maks_pengembalian = document.getElementById(`edit_tanggal_maks_pengembalian`);
            let tanggal_kembali = document.getElementById(`edit_tanggal_kembali`);
            let denda = document.getElementById(`edit_denda`);
            if(hari_pengembalian > 0){
                var jumlah_denda = hari_pengembalian * denda_per_hari;
            }else{
                var jumlah_denda = 0;

            }
            $.ajax({
                type: `GET`,
                url: `/kelola/peminjaman/detail/${id}`,
                dataType: 'json',
                success: (hasil) => {
                    id_peminjaman.value = id;
                    nama_peminjam.value = nama_anggota;
                    nama_buku.value = hasil.nama_buku;
                    tanggal_pinjam.value =  hasil.tanggal_pinjam;
                    tanggal_maks_pengembalian.value = hasil.tanggal_maks_pengembalian;
                    tanggal_kembali.value = today;
                    denda.value = jumlah_denda;
                }
            });
        }
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
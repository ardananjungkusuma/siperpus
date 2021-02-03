@extends('templates.master')
@section('title')
Tambah Pengumuman | SIPERPUS
@endsection
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Tambah Pengumuman Perpustakaan</h4>
                    @if(session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="/kelola/pengumuman/tambah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Isi Pengumuman</label>
                            <textarea type="text" name="isi" class="form-control" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar Header Pengumuman</label>
                            <input type="file" class="form-control-file" name="gambar">
                            @if($errors->has('gambar'))
                            <span class="help-block">{{ $errors->first('gambar') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            *Gambar format : <span style="color:red">JPG, JPEG, PNG, maksimal ukuran 3mb</span><br>
                            *Gambar <b>Tidak Wajib Diupload</b>
                        </div>
                        <a href="/kelola/pengumuman/daftar" class="btn btn-secondary">Back to Pengumuman</a>
                        <button type="submit" class="btn btn-success">Tambah Pengumuman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let editor = CKEDITOR.replace( 'isi' ,{
        extraPlugins: 'notification'
    });
    editor.on( 'required',function( evt ) {
        editor.showNotification('This field is required.');
        evt.cancel();
    })
</script>
@endsection
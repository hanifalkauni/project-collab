@extends('layout.master')
@section('judul','Tambah Kategori');
@section('konten')
<form action="/kategori" method="POST">
    @csrf
<div class="form-group">
    <label for="nama">Nama Kategori :</label>
    <input type="text" name="nama" id="nama" placeholder="Masukan nama kategori" class="form-control">
    @error('nama')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Tambahkan</button>
</div>
</form>
@endsection

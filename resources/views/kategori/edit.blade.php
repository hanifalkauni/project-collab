@extends('layout.master')
@section('judul','Tambah Kategori');
@section('konten')
<form action="/kategori/{{$kategori->id}}" method="POST">
    @csrf
    @method('put')
<div class="form-group">
    <label for="nama">Nama Kategori :</label>
    <input type="text" name="nama" id="nama" placeholder="Masukan nama kategori" value="{{$kategori->nama}}" class="form-control">
    @error('nama')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Simpan</button>
</div>
</form>
@endsection

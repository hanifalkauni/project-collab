@extends('layout.master')
@section('judul', 'Tambah buku')

@section('konten')
<form action="/buku" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label>judul</label>
        <input type="text" class="form-control" name="judul">
        @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Tahun</label>
        <input type="number" class="form-control" name="tahun">
        @error('tahun')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>kategori</label>
        <select name="kategori_id" id="" class="form-control">
            <option value="">--pilih kategori--</option>
            @foreach ($kategori as $item)
            <option value="{{$item -> id}}">{{$item -> nama}}</option>
            @endforeach
        </select>
        @error('kategori')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label >Penulis</label>
        <input type="text" class="form-control" name="penulis">
        @error('penulis')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="cover">Cover Buku</label>
        <input type="file" name="cover" id="cover" class="form-control">
        @error('cover')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

 <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection

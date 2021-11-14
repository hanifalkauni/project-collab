@extends('layout.master')
@section('judul', 'Tambah buku')

@section('konten')
<form action="/buku" method="POST">
        @csrf
    <div class="form-group">
        <label>judul</label>
        <input type="text" class="form-control" name="judul">
    </div>
    @error('judul')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Tahun</label>
        <input type="number" class="form-control" name="tahun">
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>kategori</label>
        <select name="kategori_id" id="" class="form-control">

            <option value="">--pilih kategori--</option>
            @foreach ($kategori as $item)
            <option value="{{$item -> id}}">{{$item -> nama}}</option>
            @endforeach

        </select>
    <div class="form-group">
        <label >Penulis</label>
        <input type="text" class="form-control" name="penulis">
    </div>
    @error('penulis')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
 <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection

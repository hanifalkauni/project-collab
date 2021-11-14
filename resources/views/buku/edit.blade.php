@extends('layout.master')
@section('Judul')    
@endsection

@section('konten')
<form action="/buku/{{$buku->id}}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label>judul</label>
        <input type="text" class="form-control" name="judul" value="{{$buku->judul}}">
    </div>
    @error('judul')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>Tahun</label>
        <input type="number" class="form-control" name="tahun" value="{{$buku->tahun}}">
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>kategori</label>
        <select name="kategori_id" id="" class="form-control">

            <option value="">--pilih kategori--</option>
            @foreach ($kategori as $item)
            @if ($item->id === $buku->kategori_id)
            <option value="{{$item -> id}}" selected>{{$item -> nama}}</option>
                
            @else
                
            @endif
            <option value="{{$item -> id}}">{{$item -> nama}}</option>
            @endforeach

        </select>
    <div class="form-group">
        <label >Penulis</label>
        <input type="text" class="form-control" name="penulis" value="{{$buku->penulis}}">
    </div>
    @error('penulis')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
 <button type="submit" class="btn btn-primary">Update</button>

    </form>

@endsection
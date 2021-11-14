@extends('layout.master');
@section('judul', "Detail Buku $buku_id")
@push('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/qkmmbopkn6mt6on8zalskbmot6ghf7fnahrtos9yrifhjeoi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector : "textarea",
    });
    </script>
@endpush
@section('konten')

    @if ($detail == null)

        <h6>Detail Buku tidak ada, silahkan tambahkan detail buku:</h6><br>
        <form action="/buku/{{ $buku_id }}/detail/createorupdate" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Asli Penulis</label>
                <input type="text" class="form-control" name="nama_asli_penulis">
            </div>
            @error('nama_asli_penulis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Bio Penulis</label>
                <textarea class="form-control" name="bio_penulis" id="bio_penulis"></textarea>
            </div>
            @error('bio_penulis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Sinopsis</label>
                <textarea class="form-control" name="sinopsis" id="sinopsis"></textarea>
            </div>
            @error('sinopsis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Tambah</button>

        </form>

    @else

        <form action="/buku/{{ $buku_id }}/detail/createorupdate" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Asli Penulis</label>
                <input type="text" class="form-control" name="nama_asli_penulis" value="{{ $detail->nama_asli_penulis }}">
            </div>
            @error('nama_asli_penulis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Bio Penulis</label>
                <textarea class="form-control" name="bio_penulis" id="bio_penulis">{{ $detail->bio_penulis }}</textarea>
            </div>
            @error('bio_penulis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Sinopsis</label>
                <textarea class="form-control" name="sinopsis" id="sinopsis" >{{ $detail->sinopsis }}</textarea>
            </div>
            @error('sinopsis')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Edit</button>

        </form>

    @endif

@endsection

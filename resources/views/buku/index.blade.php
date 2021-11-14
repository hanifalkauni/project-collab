@extends('layout.master');
@section('judul','Buku')
@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@section('konten')
<a href="/buku/create" class="btn btn-success">Tambah Buku</a><br>
    <table class="table text-muted">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Penulis</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->judul}}</td>
                <td>
                    <div class="row">
                        <form action="/buku/{{$item->id}}" method="POST">
                        <!--<a href="/kategori/{{$item->id}}" class="btn  btn-success mr-1">Detail</a>-->
                        <a href="/buku/{{$item->id}}/edit" class="btn btn-warning mr-1">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mr-1" value="delete">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty

            @endforelse

        </tbody>

    </table>
@endsection

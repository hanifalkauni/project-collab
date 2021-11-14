@extends('layout.master')
@section('judul','Dashboard')
@section('konten')
    <h1>welcome {{Auth::user()->name}}!</h1>
@endsection

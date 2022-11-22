@extends('layouts.app')

@section('content')
<div class="container-xl my-4">
  <h3>Tambah Galeri</h3>
  @if (count($errors) > 0)
    <ul class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <li class="list-group-item">{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <form class="mt-3" method="POST" enctype="multipart/form-data" action="{{ route('galeri.store') }}">
    @csrf
    <div class="mb-3">
      <label for="nama_galeri" class="form-label">Nama Galeri</label>
      <input type="text" class="form-control" id="nama_galeri" name="nama_galeri">
    </div>
    <div class="mb-3">
      <label for="id_buku" class="form-label">Buku</label>
      <select name="id_buku" id="id_buku" class="form-control">
        @foreach($data_buku as $buku)
        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
    </div>
    <div class="mb-4">
      <label for="foto" class="form-label">Foto</label>
      <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="/galeri" class="btn btn-outline-success">Batal</a>
@endsection
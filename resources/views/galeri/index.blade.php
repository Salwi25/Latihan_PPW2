@extends('layouts.app')
@section('content')
<section class="container-lg">
@if(Session::has('pesan'))
  <div class="alert alert-success">{{Session::get('pesan')}}</div>
@endif
@if(Session::has('pesan_hapus'))
  <div class="alert alert-success">{{Session::get('pesan_hapus')}}</div>
@endif
@if(Session::has('pesan_update'))
  <div class="alert alert-success">{{Session::get('pesan_update')}}</div>
@endif
    <h3>List Galeri</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Galeri</th>
                <th>Judul Buku</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galeri as $data)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $data->nama_galeri }}</td>
                <td>{{ $data->albums->judul }}</td>
                <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px"></td>
                <td>
                    <form action="{{ route('galeri.destroy', $data->id) }}" method="post">@csrf
                        <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Edit</a>
                        <button class="btn btn-danger" onCick="return confirm('Yakin mau dihapus?')">
                    <i class="fa fa-times"></i> Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
            <a class="btn btn-primary" href="{{ route('galeri.create') }}" role="button"> Tambah Gambar </a></tr>
        </tbody>
    </table>
    <div>{{ $galeri->links() }}</div>
</section>
@endsection
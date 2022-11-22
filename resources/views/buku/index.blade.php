@extends('layouts.app')

@section('content')
    <h1>List Buku</h1>
 @if(Session::has('pesan'))
      <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif
    @if(Session::has('pesan_hapus'))
      <div class="alert alert-success">{{Session::get('pesan_hapus')}}</div>
    @endif
    @if(Session::has('pesan_update'))
      <div class="alert alert-success">{{Session::get('pesan_update')}}</div>
    @endif
<table class="table table-stripped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ number_format($buku->harga, 0, ', ', '.') }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                <td>
                  <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                      @csrf
                      <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                  </form>
                </td>
                <td>
                      <a class="btn btn-primary" href="{{ route('buku.edit', $buku->id) }}" role="button">Ubah</a></tr>
                </td>
                <td>
                      <a class="btn btn-primary" href="{{ route('buku.detail', $buku->buku_seo) }}" role="button">Detail</a></tr>
                </td>
            </tr>
        @endforeach
            <tr>
            <a class="btn btn-primary" href="{{ route('buku.create') }}" role="button"> Tambah Buku</a></tr>
    </tbody>
</table>
<form action="{{ route('buku.search') }}" method="get">@csrf
  <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%;
  display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
</form>
<div>{{ $data_buku->links() }}</div>
<div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
@endsection
@extends('layouts.app')
@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>{{ $buku->judul }}</h2>
        <a href="/buku"><button class="btn btn-primary">Kembali</button></a>
        <hr>
        <div class="row">
            @foreach ($galeri as $data)
                <div class="col-md-4">
                <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                <img src="{{ asset('images/'.$data->foto) }}" style="width: 200px; height: 150px"></a>
                <p><h5>{{ $data->nama_galeri }}</h5></p>
                </div>
            @endforeach
        </div>
        <div>{{ $galeri->links() }}</div>
    </div>
</section>
@endsection
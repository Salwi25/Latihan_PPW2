<div class="container">
    <h4>Tambah Buku</h4>
@if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
    <form method="post" action="{{ route('buku.store') }}">
    @csrf
        <div>Judul <input type="text" name="judul"></div>
        <div>Penulis <input type="text" name="penulis"></div>
        <div>Harga <input type="text" name="harga"></div>
        <div>Tgl. Terbit <input type="date" id="tgl_terbit" name="tgl_terbit" class="date from-control" placeholder="yyyy/mm/dd"></div>
        <div><button type="submit">Simpan</button>
        <a class="btn btn-primary" href="/buku">Batal</a><div>
    </form>
</div>
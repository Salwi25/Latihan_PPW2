<div class="container">
    <h4>Edit Buku</h4>
    <form method="post" action="{{ route('buku.update',$buku->id) }}">
    @csrf
        <div>Judul <input type="text" name="judul" value="{{$buku->judul}}"></div>
        <div>Penulis <input type="text" name="penulis"></div>
        <div>Harga <input type="text" name="harga"></div>
        <div>Tgl. Terbit <input type="date" name="tgl_terbit"></div>
        <div><button type="submit">Simpan</button>
        <a class="btn btn-primary" href="/buku">Batal</a><div>
    </form>
</div>
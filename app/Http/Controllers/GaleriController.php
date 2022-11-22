<?php

namespace App\Http\Controllers;

use File;
use App\Models\Buku;
use App\Models\Galeri;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $jumlah_gambar = Galeri::count();
        $batas = 4;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($galeri->currentPage() - 1);
        return view('galeri.index', compact('galeri', 'no', 'jumlah_gambar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_buku = Buku::all('id', 'judul');
        return view('galeri.create', compact('data_buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri' =>'required',
            'keterangan' =>'required',
            'foto' =>'required|image|mimes:jpeg,jpg,png'
        ]);
        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        $path = public_path('thumb/' . $namafile);
        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Buku berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_buku = Buku::all(['id', 'judul']);
        $galeri = Galeri::find($id);
        return view('galeri.update', compact('data_buku', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required'
        ]);

        $path = public_path('thumb/');

        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        if ($request->has('foto'))
        {
            $foto = $request->foto;
            $namaFile = time().".".$foto->getClientOriginalExtension();
            Image::make($foto)->resize(200,150)->save($path . $namaFile);
            $foto->move('images/', $namaFile);

            if (File::exists($path . $galeri->foto))
            {
                File::delete($path . $galeri->foto);
                File::delete('images/' . $galeri->foto);
            }

            $galeri->foto = $namaFile;
        }

        $galeri->save();
        return redirect('/galeri')->with('pesan_update', 'Data galeri buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('pesan_hapus', 'Data Galeri berhasil dihapus');
    }
}

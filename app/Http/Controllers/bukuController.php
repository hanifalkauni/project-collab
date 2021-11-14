<?php

namespace App\Http\Controllers;
use App\Buku;
use App\Kategori;
use DB;

use Illuminate\Http\Request;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
        'judul' => 'required',
        'kategori_id' => 'required',
        'tahun' => 'required',
        'penulis' => 'required'
        ]);


        $buku = new Buku;
        $buku -> judul = $request->judul;
        $buku -> kategori_id = $request->kategori_id;
        $buku -> tahun = $request->tahun;
        $buku -> penulis = $request->penulis;

        $buku -> save();
        Alert::success('Berhasil', 'Buku berhasil ditambahkan');
        return ("buku");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $request -> validate([
        'judul' => 'required',
        'kategori_id' => 'required',
        'tahun' => 'required',
        'penulis' => 'required'
        ]);


        $buku = new Buku;
        $buku -> judul = $request->judul;
        $buku -> kategori_id = $request->kategori_id;
        $buku -> tahun = $request->tahun;
        $buku -> penulis = $request->penulis;

        $buku -> save();
        return ("buku");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku = delete();
        return redirect('buku');
    }
}

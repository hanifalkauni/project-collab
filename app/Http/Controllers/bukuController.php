<?php

namespace App\Http\Controllers;
use App\Buku;
use App\Kategori;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
class bukuController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
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
        $kategori = Kategori::all();
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
        $buku->judul = $request->judul;
        $buku ->kategori_id = $request->kategori_id;
        $buku->tahun = $request->tahun;
        $buku->penulis = $request->penulis;
        $buku->user_id = Auth::id();

        $buku -> save();
        Alert::success('Berhasil', 'Buku berhasil ditambahkan');
        return redirect("buku");
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
         $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
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
        $buku->user_id = Auth::id();
        Alert::success('Berhasil', 'Buku berhasil diupdate');

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
        $buku -> delete();
        return redirect('/buku');
    }
}

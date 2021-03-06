<?php

namespace App\Http\Controllers;
use App\Buku;
use App\Kategori;
use App\DetailBuku;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
class bukuController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = DB::table('buku')
        ->join('kategori','buku.kategori_id','=','kategori.id')
        ->select('buku.*','kategori.nama')
        ->get();
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
        'penulis' => 'required',
        'cover'     => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ]);

        $coverName = time().'.'.$request->cover->extension();
        $request->cover->move(public_path('asset/images/cover/'), $coverName);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku ->kategori_id = $request->kategori_id;
        $buku->tahun = $request->tahun;
        $buku->penulis = $request->penulis;
        $buku->user_id = Auth::id();
        $buku->cover = $coverName;

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

        $request -> validate([
        'judul' => 'required',
        'kategori_id' => 'required',
        'tahun' => 'required',
        'penulis' => 'required',
        ]);

        if(!empty($request->cover)){
            $coverName = time().'.'.$request->cover->extension();
            $request->cover->move(public_path('asset/images/cover/'), $coverName);

            $buku = Buku::find($id);
            $buku -> judul = $request->judul;
            $buku -> kategori_id = $request->kategori_id;
            $buku -> tahun = $request->tahun;
            $buku -> penulis = $request->penulis;
            $buku->user_id = Auth::id();
            $buku->cover = $coverName;
        }
        else{
            $buku = Buku::find($id);
            $buku -> judul = $request->judul;
            $buku -> kategori_id = $request->kategori_id;
            $buku -> tahun = $request->tahun;
            $buku -> penulis = $request->penulis;
            $buku->user_id = Auth::id();
        }

        $buku -> update();
        Alert::success('Berhasil', 'Buku berhasil diupdate');

        return redirect("/buku");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailbuku = DetailBuku::where('buku_id',$id);
        $detailbuku->delete();
        $buku = Buku::find($id);
        $buku->delete();
        Alert::success('Berhasil', 'Buku berhasil dihapus');
        return redirect('/buku');
    }
}

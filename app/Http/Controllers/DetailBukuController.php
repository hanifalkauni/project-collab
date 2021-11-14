<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailBuku;

class DetailBukuController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $detail = DetailBuku::where('buku_id',$id)->first();
        $buku_id = $id;
        return view('detailBuku.index',compact('detail','buku_id'));
    }

    public function createOrUpdate(Request $request, $id){
        $request->validate([
            'nama_asli_penulis'  => 'required',
            'bio_penulis'  => 'required',
            'sinopsis'  => 'required',
        ]);
        $input= DetailBuku::updateOrCreate([
        'buku_id'=>$id
        ],
        [
            'buku_id'=>$id,
            'nama_asli_penulis'=>$request->nama_asli_penulis,
            'bio_penulis'=>$request->bio_penulis,
            'sinopsis'=>$request->sinopsis
        ]
        );
        return redirect("/buku/$id/detail");
    }
}

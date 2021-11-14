<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\RatingKomentar;
use Alert;

class LandingController extends Controller
{

    public function __construct()
{
    $this->middleware('auth')->except('index','detail');
}

    public function index(){
       $data=DB::table('buku')
            ->join('kategori','buku.kategori_id','=','kategori.id')
            ->select('buku.*','kategori.nama')
            ->get();
        return view('landing.landing',compact('data'));
    }

    public function detail($id){
        $buku=DB::table('buku')
            ->join('kategori','buku.kategori_id','kategori.id')
            ->where('buku.id',$id)
            ->select('buku.*','kategori.nama')
            ->first();
        $komentar=DB::table('rating_komentar')
            ->join('users','users.id','rating_komentar.user_id')
            ->where('buku_id',$id)
            ->get();
        $showKomentar=DB::table('rating_komentar')
            ->join('users','users.id','rating_komentar.user_id')
            ->where('buku_id',$id)
            ->where('user_id',Auth::id())
            ->first();
        $detailBuku=DB::table('detail_buku')
            ->join('buku','buku.id','detail_buku.buku_id')
            ->where('buku.id',$id)
            ->first();
        $sumVote=DB::table('rating_komentar')
            ->join('users','users.id','rating_komentar.user_id')
            ->where('buku_id',$id)
            ->where('rating','!=',null)
            ->count();
        $avgRating=DB::table('rating_komentar')
            ->where('buku_id',$id)
            ->avg('rating');
        // dd($avgRating);
        return view('landing.detail',compact('buku','komentar','showKomentar','detailBuku','sumVote','avgRating'));
    }

    public function addKomentar(Request $request,$buku,$id){
        // dd($request);
        if($request->rating=="" || $request->komentar ==""){
            Alert::error('Gagal', 'Rating atau Komentar berhasil belum diisi');
        }
        else{
        $input= RatingKomentar::updateOrCreate([
            'user_id'=>$id,
            'buku_id'=>$buku
        ],
        [   'rating'=>$request->rating,
            'komentar'=>$request->komentar
        ]
        );
        Alert::success('Berhasil', 'Rating dan Komentar berhasil ditambahkan');
    }
        return redirect("detail/$buku");
    }

    public function deleteKomentar($buku,$id){
        $delete= RatingKomentar::where('user_id',$id)->where('buku_id',$buku)->delete();

        return redirect("detail/$buku");
    }

}

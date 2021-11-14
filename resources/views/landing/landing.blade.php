@extends('layout.landing')
@section('konten')
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        {{-- <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            @forelse ($data as $item)
                            @php
                            $item->cover != null ?  $cover = 'asset/images/cover/'.$item->cover :  $cover='asset/images/buku.jpg';
                            $komentar=DB::table('rating_komentar')->where('buku_id',$item->id)->count();
                            $rating=number_format(DB::table('rating_komentar')->where('buku_id',$item->id)->avg('rating'),1);
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset($cover)}}">
                                        <div class="ep">{{$item->nama}}</div>
                                        <div class="comment"><i class="fa fa-comments"></i> {{$komentar}}</div>
                                        <div class="view"><i class="fa fa-star"></i> {{$rating}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{$item->tahun}}</li>
                                            <li>{{$item->penulis}}</li>
                                        </ul>
                                        <h5><a href="/detail/{{$item->id}}">{{$item->judul}}</a></h5>
                                    </div>
                                </div>
                            </div>

                        @empty

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                   No Data
                                </div>
                            </div>

                        @endforelse
                    </div>
                    </div>

                </div>
               </div>
</div>
</div>
</section>
<!-- Product Section End -->
@endsection

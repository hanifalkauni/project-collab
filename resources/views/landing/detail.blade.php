@extends('layout.landing')
@section('konten')
    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">


                          {{($buku->cover != null ) ? $cover="asset/images/cover/".$buku->cover : $cover="asset/images/buku.jpg"}}

                        <div class="anime__details__pic set-bg" data-setbg="{{asset($cover)}}">
                            <div class="comment"><i class="fa fa-comments"></i> {{$sumVote}}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$buku->judul}}</h3>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <span>{{$avgRating != null ? number_format($avgRating,1) : 0}}</span>&nbsp;<i class="fa fa-star"></i>
                                </div>
                                <span>{{$sumVote}} Votes</span>
                            </div>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Kategori : </span> {{$buku->nama}}</li>
                                            <li><span>Tahun :  </span> {{$buku->tahun}}</li>
                                            <li><span>Penulis : </span> {{$buku->penulis}}</li>
                                            <!--<li><span></span> </li>-->
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        @if($detailBuku != null)
                                        <h6 style="color:white">Bio Penulis :</h6>
                                        <p style="word-wrap: break-word;">
                                            {{$detailBuku->bio_penulis}}
                                        </p>
                                        @else
                                        <p>
                                           Bio dari penulis ini belum ada
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($detailBuku != null)
                            <h6 style="color:white">Sinopsis :</h6>
                            <p style="word-wrap: break-word;">
                                {!! $detailBuku->sinopsis !!}
                            </p>
                            @else
                            <p>
                               Sinopsis dari Buku ini belum ada
                            </p>
                            @endif

                            <!--<div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                                <a href="#" class="watch-btn"><span>Watch Now</span> <i
                                    class="fa fa-angle-right"></i></a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            @forelse ($komentar as $item)
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{asset('asset')}}/images/favicon.png" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{$item->name}}   &nbsp;&nbsp;&nbsp;  <span>{{($item->created_at)}}</span></h6>
                                    <p>{{$item->komentar}}</p>
                                </div>
                            </div>
                            @empty

                            @endforelse

                        </div>
                        @auth
                        <div class="anime__details__form">
                            @if($showKomentar !=null)
                                <div class="section-title">
                                    <h5>Edit Your Rating and Comentar</h5>
                                </div class="rate">
                                <form action="/detail/{{$buku->id}}/addkomentar/{{Auth::id()}}" method="post">
                                    @csrf
                                    <h6 style="color:white;  text-align:center;">Your Rating: </h6>

                                    <div class="rating">
                                        @php
                                        for($i=5; $i>0; $i--){
                                            if($i == ($showKomentar->rating)){
                                               echo '
                                               <input type="radio" name="rating" value="'.$showKomentar->rating.'" id="'.$showKomentar->rating.'" checked>
                                               <label for="'.$showKomentar->rating.'">☆</label>
                                               ';
                                            }else{
                                                echo '
                                                <input type="radio" name="rating" value="'.$i.'" id="'.$i.'">
                                                <label for="'.$i.'">☆</label>
                                                ';
                                            }
                                        }
                                        @endphp
                                    </div>
                                    <h6 style="color:white;">Your Comentar:</h6><br>
                                    <textarea name="komentar" style="font-weight:bold; color:black !important">{{$showKomentar->komentar}}</textarea>
                                    <button type="submit"><i class="fa fa-location-arrow"></i> Edit Your Review</button>

                                </form>
                                <a href="/detail/{{$buku->id}}/deletekomentar/{{Auth::id()}}"><button><i class="fa fa-trash"></i> Delete Your Review</button></a>
                            @else
                                <div class="section-title">
                                    <h5>Your Comentar</h5>
                                </div class="rate">
                                <form action="/detail/{{$buku->id}}/addkomentar/{{Auth::id()}}" method="POST">
                                    @csrf
                                    <h6 style="color:white;  text-align:center;">Rate This Book:</h6>
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5">
                                        <label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4">
                                        <label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3">
                                        <label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2">
                                        <label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1">
                                        <label for="1">☆</label>
                                    </div>

                                    <textarea name="komentar" placeholder="Input Your Commentar here"></textarea>
                                    <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                                </form>
                                @endif
                            </div>
                        @endauth

                    </div>
                    <div class="col-lg-4 col-md-4">

                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->
@endsection

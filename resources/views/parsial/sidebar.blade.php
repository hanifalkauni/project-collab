        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    {{-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./index.html">Kategori</a></li>
                            <li><a href="./index2.html">Dashboard 2</a></li>
                        </ul>
                    </li> --}}
                    <li><a href="#" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    @if(Auth::user()->id==1)
                    <li><a href="#" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">Kategori</span></a>
                    </li>
                    @endif
                    <li><a href="#" aria-expanded="false"><i class="icon icon-book"></i><span
                        class="nav-text">Buku</span></a>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

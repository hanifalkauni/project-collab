<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Review">
    <meta name="keywords" content="book, review, sinopsis, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('asset')}}/landing/css/style.css" type="text/css">

    <style>
        .rate {
    border-bottom-right-radius: 12px;
    border-bottom-left-radius: 12px
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('sweetalert::alert')
    @include('parsial.landingnav')
    <!-- Header End -->


    @yield('konten')


    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <h4 class="text-light">BookReview</h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="/">Homepage</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Created by kelompok 13 - PKS Digital School
                    </p>

                  </div>
              </div>
          </div>
      </footer>
      <!-- Footer Section End -->

      <!-- Search model Begin -->
      <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{asset('asset')}}/landing/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('asset')}}/landing/js/bootstrap.min.js"></script>
    <script src="{{asset('asset')}}/landing/js/player.js"></script>
    <script src="{{asset('asset')}}/landing/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('asset')}}/landing/js/mixitup.min.js"></script>
    <script src="{{asset('asset')}}/landing/js/jquery.slicknav.js"></script>
    <script src="{{asset('asset')}}/landing/js/owl.carousel.min.js"></script>
    <script src="{{asset('asset')}}/landing/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('push')

    </body>

    </html>

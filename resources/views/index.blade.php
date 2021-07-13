<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.12.0,  m -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.12.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{ asset('assets/images/shopping-cart-4.png') }}" type="image/x-icon)">
  <meta name="description" content="">

  <title>Home</title>
  <link rel="stylesheet" href="{{ asset('assets/web/assets/mobirise-icons/mobirise-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/socicon/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dropdown/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/datatables/data-tables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/tether/tether.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css') }}">
  <link rel="preload" as="style" href="{{ asset('assets/mobirise/css/mbr-additional.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/mobirise/css/mbr-additional.css') }}" type="text/css">



</head>
<body>
  <section class="menu cid-rPp1e47nbq" once="menu" id="menu1-m">



    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href=" ">
                         <img src="{{ asset('assets/images/shopping-cart-4.png') }}" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href=" ">
                        <br>Eleonora<br><br></a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/products">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Shop
                    </a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/admin/dashboard">
                            <span class="mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                            Admin Dashboard
                        </a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <span class="mbri-logout mbr-iconfont mbr-iconfont-btn"></span>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div> --}}

                    {{-- <a id="navbarDropdown" class="nav-link link text-white display-4 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a> --}}

                    
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/products">
                        <span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                        Login
                    </a>
                </li>
                @endif
            </ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/cart"><span class="mbri-cart-add mbr-iconfont mbr-iconfont-btn" style="color: rgb(19, 15, 15);"></span>
                    Cart</a></div>
        </div>
    </nav>
</section>

<section class="engine"><a href=" ">free site templates</a></section><section class="header10 cid-rPoXEtT5SC mbr-fullscreen" data-bg-video="https://www.youtube.com/watch?v=7m16dFI1AF8" id="header10-g">





    <div class="container halfOpacity">
        <div class="media-container-column mbr-white p-5 align-left col-lg-8 col-md-10 m-auto">
            <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                Eleonora<br></h1>

            <p class="mbr-text pb-3 mbr-fonts-style display-5">
               Click & Get<br></p>
            @guest
            <div class="mbr-section-btn">
                <a class="btn btn-md btn-primary display-4" href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                <a class="btn btn-md btn-white-outline display-4" href="{{ route('register') }}">Sign Up<br></a>
                    @endif
                    @else
                    <p class="mbr-text pb-3 mbr-fonts-style display-5">
                        Welcome, {{ Auth::user()->name }} !<br></p>
                </div>

                


            @endguest
        </div>
    </div>

    {{-- @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}


    <div class="mbr-arrow hidden-sm-down" aria-hidden="true" style="top:130%">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<section class="services1 cid-rPGFxbzGJu" id="services1-19">
    <!---->

    <!---->
    <!--Overlay-->

    <!--Container-->
    <div class="container">
        <div class="row justify-content-center">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-left pb-3 mbr-fonts-style display-1">
                    Top Products<br></h2>

            </div>
            <!--Card-1-->
            <div class="card col-12 col-md-6 p-3 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src=" {{url('profile_images/Product Photo/clothes/dress/dress3.jpeg')}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">
                            Traditional Black Dress with Collar
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7"></p>
                        <!--Btn-->
                        <div class="mbr-section-btn align-left"><a href=" " class="btn btn-warning-outline display-4">
                                14000 MMK
                            </a></div>
                    </div>
                </div>
            </div>
            <!--Card-2-->
            <div class="card col-12 col-md-6 p-3 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img">
                    <img src="{{url('profile_images/Product Photo/clothes/dress/dress2.jpg')}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">
                            Summer Dress
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7"></p>
                        <!--Btn-->
                        <div class="mbr-section-btn align-left">
                            <a href=" " class="btn btn-warning-outline display-4">
                                11000 MMK
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card-3-->
            <div class="card col-12 col-md-6 p-3 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="{{url('profile_images/Product Photo/clothes/dress/dress1.jpg')}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">
                            White Crop Top & Summer Dress
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7"></p>
                        <!--Btn-->
                        <div class="mbr-section-btn align-left">
                            <a href=" " class="btn btn-warning-outline display-4">
                                12000 MMK
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card-4-->
            <div class="card col-12 col-md-6 p-3 col-lg-3 last-child">
                <div class="card-wrapper">
                    <div class="card-img">
                    <img src="{{url('profile_images/Product Photo/clothes/dress/dress4.jpg')}}" alt="Mobirise">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-5">
                            Traditional Black Dress
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7"></p>
                        <!--Btn-->
                        <div class="mbr-section-btn align-left">
                            <a href=" " class="btn btn-warning-outline display-4">
                                13000 MMK
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section-table cid-rPGIEpBbvb" id="table1-1d">



  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Delivery Schedule</h2>
      <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5"></h3>
      <div class="table-wrapper">
        <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="dataTables_filter">
                  <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                  <input class="form-control input-sm" disabled="">
                </div>
            </div>
          </div>
        </div>

        <div class="container scroll">
          <table class="table isSearch" cellspacing="0">
            <thead>
              <tr class="table-heads ">




              <th class="head-item mbr-fonts-style display-7">Township</th><th class="head-item mbr-fonts-style display-7">
                      Date</th><th class="head-item mbr-fonts-style display-7">
                      Delivery Fees</th></tr>
            </thead>

            <tbody>




            <tr>




              <td class="body-item mbr-fonts-style display-7">Sanchaung</td><td class="body-item mbr-fonts-style display-7">Monday</td><td class="body-item mbr-fonts-style display-7">1300 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Ahlone</td><td class="body-item mbr-fonts-style display-7">Monday</td><td class="body-item mbr-fonts-style display-7">1300 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Sule</td><td class="body-item mbr-fonts-style display-7">Tuesday</td><td class="body-item mbr-fonts-style display-7">1300 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Kyi Myint Daing</td><td class="body-item mbr-fonts-style display-7">Wednesday</td><td class="body-item mbr-fonts-style display-7">1300 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Hlaing</td><td class="body-item mbr-fonts-style display-7">Monday</td><td class="body-item mbr-fonts-style display-7">1500 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">InnSein</td><td class="body-item mbr-fonts-style display-7">Friday</td><td class="body-item mbr-fonts-style display-7">1200 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Hledan</td><td class="body-item mbr-fonts-style display-7">Saturday</td><td class="body-item mbr-fonts-style display-7">1000 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Tarmwe</td><td class="body-item mbr-fonts-style display-7">Tuesday</td><td class="body-item mbr-fonts-style display-7">1000 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">Kamayut</td><td class="body-item mbr-fonts-style display-7">Wednesday</td><td class="body-item mbr-fonts-style display-7">1200 MMK</td></tr><tr>




              <td class="body-item mbr-fonts-style display-7">South Dagon</td><td class="body-item mbr-fonts-style display-7">Saturday</td><td class="body-item mbr-fonts-style display-7">1400 MMK</td></tr></tbody>
          </table>
        </div>
        <div class="container table-info-container">
          <div class="row info">
            <div class="col-md-6">
              <div class="dataTables_info mbr-fonts-style display-7">
                <span class="infoBefore">Showing</span>
                <span class="inactive infoRows"></span>
                <span class="infoAfter">entries</span>
                <span class="infoFilteredBefore">(filtered from</span>
                <span class="inactive infoRows"></span>
                <span class="infoFilteredAfter"> total entries)</span>
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="mbr-section form4 cid-rPpemwAFe3" id="form4-t">




    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.404505723062!2d96.13308881417824!3d16.855872988399152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1936f625d4ba7%3A0x9676670831769962!2sUniversity%20Of%20Information%20Technology!5e0!3m2!1sen!2smm!4v1581379687395!5m2!1sen!2smm" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <h2 class="pb-3 align-left mbr-fonts-style display-2">
                    Contact Us</h2>
                <div>
                    <div class="icon-block pb-3 align-left">
                        <span class="icon-block__icon">
                            <span class="mbri-letter mbr-iconfont"></span>
                        </span>
                        <h4 class="icon-block__title align-left mbr-fonts-style display-5">
                            Don't hesitate to contact us
                        </h4>
                    </div>
                    <div class="icon-contacts pb-3">
                        <h5 class="align-left mbr-fonts-style display-7">
                            Ready for offers and cooperation
                        </h5>
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: 09-403479301<br>
                            Email:eleonora2k20@gmail.com</p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    <!---Formbuilder Form--->
                    <form action=" m/" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="yWXVTsrDVLWMKonxk4O/bQ7omYWGWJKxlDqzSvAzZpgefON8xECozsnC+fTZ61NlPX6G8EbInPV4F6U+5KTD965rzSsAm7lz+ieArrjcKYbyiyp1iyq3T+jOYO6ntQ36">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">
                            <div class="col-md-6  form-group" data-for="name">
                                <input type="text" name="name" placeholder="Your Name" data-form-field="Name" required="required" class="form-control input display-7" id="name-form4-t">
                            </div>
                            <div class="col-md-6  form-group" data-for="phone">
                                <input type="text" name="phone" placeholder="Phone" data-form-field="Phone" required="required" class="form-control input display-7" id="phone-form4-t">
                            </div>
                            <div data-for="email" class="col-md-12  form-group">
                                <input type="text" name="email" placeholder="Email" data-form-field="Email" class="form-control input display-7" required="required" id="email-form4-t">
                            </div>
                            <div data-for="message" class="col-md-12  form-group">
                                <textarea name="message" placeholder="Message" data-form-field="Message" class="form-control input display-7" id="message-form4-t"></textarea>
                            </div>
                            <div class="col-md-12 input-group-btn  mt-2 align-center">
                                <button type="submit" class="btn btn-primary btn-form display-4">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form><!---Formbuilder Form--->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cid-rPph7uJg23" id="footer1-w">





    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-3">
                <div class="media-wrap">
                    <a href=" /">
                        <img src="{{ asset('assets/images/shopping-cart-192.png') }}" alt="Mobirise" title=") ">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                    University Of Information Technology &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>City, Yangon</p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email:saithantminnyo@uit.edu.mm<br>Phone: 09-5352582 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
            </div>
            {{-- <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Links
                </h5>
                <p class="mbr-text">
                    <a class="text-primary" href=" /">Website builder</a>
                    <br><a class="text-primary" href=" /">Download for Windows</a>
                    <br><a class="text-primary" href=" /">Download for Mac</a>
                </p>
            </div> --}}
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2020</p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="" target="_blank">
                                <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="" target="_blank">
                                <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <script src="{{ asset('assets/web/assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/popper/popper.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/smoothscroll/smooth-scroll.js') }}"></script>
  <script src="{{ asset('assets/ytplayer/jquery.mb.ytplayer.min.js') }}"></script>
  <script src="{{ asset('assets/vimeoplayer/jquery.mb.vimeo_player.js') }}"></script>
  <script src="{{ asset('assets/dropdown/js/nav-dropdown.js') }}"></script>
  <script src="{{ asset('assets/dropdown/js/navbar-dropdown.js') }}"></script>
  <script src="{{ asset('assets/touchswipe/jquery.touch-swipe.min.js') }}"></script>
  <script src="{{ asset('assets/datatables/jquery.data-tables.min.js') }}"></script>
  <script src="{{ asset('assets/datatables/data-tables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/tether/tether.min.js') }}"></script>
  <script src="{{ asset('assets/theme/js/script.js') }}"></script>
  <script src="{{ asset('assets/formoid/formoid.min.js') }}"></script>


</body>
</html>

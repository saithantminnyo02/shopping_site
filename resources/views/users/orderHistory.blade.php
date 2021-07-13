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
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="/index">
                        <br>Online Shopping<br><br></a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/products">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Shop
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

                    
                </li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/cart"><span class="mbri-cart-add mbr-iconfont mbr-iconfont-btn" style="color: rgb(19, 15, 15);"></span>
                    Cart</a></div>
        </div>
    </nav>
</section>


<section class="section-table cid-rPGIEpBbvb" id="table1-1d">



  <div class="container container-table mt-3">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Order History</h2>
      <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5"></h3>
      <div class="table-wrapper">
        {{-- <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="dataTables_filter">
                  <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                  <input class="form-control input-sm" disabled="">
                </div>
            </div>
          </div>
        </div> --}}

        <div class="container scroll">
          <table class="table isSearch" cellspacing="0">
            <thead>
              <tr class="table-heads ">




              <th class="head-item mbr-fonts-style display-7">Item Name</th><th class="head-item mbr-fonts-style display-7">
                      Date</th>
                      <th class="head-item mbr-fonts-style display-7">
                        Diff</th>
                        <th class="head-item mbr-fonts-style display-7">
                            Method</th>
                      <th class="head-item mbr-fonts-style display-7">
                      Price</th></tr>
            </thead>

            <tbody>

                

                @foreach ($user->products as $product)
            <tr>
              <td class="body-item mbr-fonts-style display-7">{{$product->name}}</td>
              <td class="body-item mbr-fonts-style display-7">{{$product->pivot->created_at}}</td>
              <td class="body-item mbr-fonts-style display-7">{{$product->pivot->created_at->diffForHumans()}}</td>
              <td class="body-item mbr-fonts-style display-7">{{$product->pivot->remark}}</td>
              <td class="body-item mbr-fonts-style display-7">{{$product->price}}</td>

            </tr>
            @endforeach

              </tbody>
          </table>
        </div>
        {{-- <div class="container table-info-container">
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
        </div> --}}
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

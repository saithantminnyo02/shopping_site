@extends('layouts.mobrise_layout')

@section('navbar')
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
                        <br>Online Shopping Eleonora<br><br></a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
            <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/admin/dashboard">
                            <span class="mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                            Admin Dashboard
                        </a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/orderHistory">
                        <span class="mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                        Order History
                    </a>
                </li>
                
                <li class="nav-item">
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
                </li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/cart"><span class="mbri-cart-add mbr-iconfont mbr-iconfont-btn" style="color: rgb(19, 15, 15);"></span>
                    Cart</a></div>
        </div>
    </nav>
</section>
@endsection
@extends('layouts.maincompanyweb')
 
@section('container') 
                                        
       <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <header class="header has-header-main-s1 bg-lighter" id="home">
                @include('navigation')
                <div class="header-content my-auto py-5">
                    <div class="container">
                        <div class="row flex-lg-row-reverse align-items-center justify-content-between g-gs">
                            <div class="col-lg-6 mb-n3 mb-lg-0">
                                <div class="header-image header-image-s2">
                                    <img src="{{ URL::asset('images/header/JoinKilatHome.png') }}" alt="">
                                </div><!-- .header-image -->
                            </div><!-- .col- -->
                            <div class="col-lg-5 col-md-10">
                                <div class="header-caption">
                                    <h1 class="header-title">Kirim Paket Dengan Join Kilat</h1>
                                    <div class="header-text">
                                        <p>Harga Murah | Kiriman Aman | Pasti Sampai</p>
                                    </div>
                                    <ul class="header-action btns-inline">
                                        <li><a href="/trackingpacket" class="btn btn-primary btn-lg" style="background-color: red" ><span>Tracking</span></a></li>
                                        <li><a href="#" class="btn btn-primary btn-lg" style="background-color: red" ><span>Cek Price</span></a></li>
                                        <!-- <li><a href="#" class="link link-block link-gray"><em class="icon icon-lg ni ni-play-circle"></em><span>Cek Price</span></a></li> -->
                                    </ul>
                                </div><!-- .header-caption -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .header-content -->
            </header><!-- .header -->
            @include('section')
            @include('footer')
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
@endsection
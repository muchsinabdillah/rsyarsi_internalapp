@extends('layouts.maincompanyweb')
 
@section('container') 
     <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <header class="header has-header-main-s1 bg-lighter" id="home">
                <div class="header-main header-main-s1 is-sticky is-transparent">
                    <div class="container header-container">
                        
                        <div class="header-wrap">
                            <div class="header-logo">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ URL::asset('images/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png') }} 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ URL::asset('images/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png') }} 2x" alt="logo-dark">
                                </a>
                            </div>
                            <div class="header-toggle">
                                <button class="menu-toggler" data-target="mainNav">
                                    <em class="menu-on icon ni ni-menu"></em>
                                    <em class="menu-off icon ni ni-cross"></em>
                                </button>
                            </div><!-- .header-nav-toggle -->
                            <nav class="header-menu" data-content="mainNav">
                                <ul class="menu-list ms-lg-auto">
                                    <li class="menu-item"><a href="#home" class="menu-link nav-link">HOME</a></li>
                                    <li class="menu-item"><a href="#service" class="menu-link nav-link">ABOUT</a></li>
                                    <li class="menu-item"><a href="#feature" class="menu-link nav-link">SERVICE</a></li>
                                    <li class="menu-item"><a href="#pricing" class="menu-link nav-link">TRACK PAKAGES</a></li>
                                    <li class="menu-item"><a href="#reviews" class="menu-link nav-link">PRICING</a></li>
                                    <li class="menu-item"><a href="#reviews" class="menu-link nav-link">CONTACT</a></li>
                                    <li class="menu-item"><a href="#reviews" class="menu-link nav-link">CARRIER</a></li>

                                </ul>
                            </nav><!-- .nk-nav-menu -->
                        </div><!-- .header-warp-->
                    </div><!-- .container-->
                    
                </div><!-- .header-main-->
                <div class="row justify-content-center text-center">
                    <div class="col-sm-7 col-md-6 col-9">
                        <div class="section-head">
                            <h2 class="title">Lacak Pengiriman</h2>
                            <p>Please enter Join Kilat Number. Then Click 'Search'</p>

                           
                            
                        </div><!-- .section-head -->
                        
                    </div><!-- .col -->
                    <section>
                    <div class="container">
                        <form method="POST" action="/tracking" class="mb-5">
                            <input type="hidden" name="_token" value="lp77HcaSTSNrEwXh7KWeMC0N5mOpa5IfX6rHdt9k">      <div class="mb-3"> 
                              <textarea class="form-control" required id="id_transacrion" name="id_transacrion" rows="3" placeholder="Please Entri Join Kilat number Here." ></textarea>
                            </div>   
                            <div class="form-group">
                              <button class="btn btn-lg btn-primary btn-block" style="background-color: red;">SEARCH</button>
                          </div>
                          </form>
                    </div><!-- .container -->
                    </section>
                    <!-- <section class="section section-feature pb-100" id="feature">
                    
                    </section> -->
                <!-- .section -->
                </div><!-- .row -->

                
            </header><!-- .header -->

     
            <footer class="footer bg-lighter" id="footer">
                <div class="container">
                    <div class="row g-3 align-items-center justify-content-md-between py-4 py-md-5">
                        <div class="col-md-3">
                            <div class="footer-logo">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ URL::asset('images/logo.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png') }}" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ URL::asset('images/logo-dark.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png') }}" alt="logo-dark"> 
                                </a>
                            </div><!-- .footer-logo -->
                        </div><!-- .col -->
                        <div class="col-md-9 d-flex justify-content-md-end">
                            <ul class="link-inline gx-4">
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul><!-- .footer-nav -->
                        </div><!-- .col -->
                    </div>
                    <hr class="hr border-light mb-0 mt-n1">
                    <div class="row g-3 align-items-center justify-content-md-between py-4">
                        <div class="col-md-8">
                            <div class="text-base">Copyright &copy; 2022 Dashlite. Template Made by <a class="text-base fw-bold" href="#">Softnio</a></div>
                        </div><!-- .col -->
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <ul class="social">
                                <li><a href="#"><em class="icon ni ni-twitter"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-facebook-f"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-instagram"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-pinterest"></em></a></li>
                            </ul><!-- .footer-icon -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </footer><!-- .footer -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
@endsection
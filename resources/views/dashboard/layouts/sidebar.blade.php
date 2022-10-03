<div class="nk-sidebar nk-sidebar-fixed  " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand"> 
            <a href="{{ auth()->user()->level }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ URL::asset('img/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('img/loginJoinKilatFix.png') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ URL::asset('img/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('img/loginJoinKilatFix.png') }}" alt="logo-dark">
            </a> 
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">     
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Master Data</h6>
                    </li><!-- .nk-menu-heading --> 
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">User Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/dashboard/userlogin" class="nk-menu-link"><span class="nk-menu-text">Entry User </span></a>
                                <a href="/dashboard/indikatormutuunit" class="nk-menu-link"><span class="nk-menu-text">Entry Unit</span></a>
                            </li> 
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --> 
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Indikator Mutu</h6>
                    </li><!-- .nk-menu-heading -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Master Data</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                
                                <a href="/dashboard/indikatormutu" class="nk-menu-link"><span class="nk-menu-text">Entry Master</span></a>
                            </li> 
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Entri Transaksi</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/dashboard/trsindikatormutu" class="nk-menu-link"><span class="nk-menu-text">Entry Harian IMUT</span></a> 
                            </li> 
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --> 
                    
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">LogBook</h6>
                    </li><!-- .nk-menu-heading -->
                     <!-- Entri Logbook Harian-->
                     <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Master Data</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/dashboard/logbookpegawai" class="nk-menu-link"><span class="nk-menu-text">Entry Master LogBook</span></a> 
                            </li> 
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <!-- Entri Transaksi Logbook-->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Entry Transaksi LogBook</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="/dashboard/transactionLogbook" class="nk-menu-link"><span class="nk-menu-text">Entry Data</span></a> 
                            </li> 
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
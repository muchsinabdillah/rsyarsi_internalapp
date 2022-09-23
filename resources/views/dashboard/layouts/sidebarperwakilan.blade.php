<div class="nk-sidebar nk-sidebar-fixed   " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="/perwakilan" class="logo-link nk-sidebar-logo">
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
                                    <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                </li><!-- .nk-menu-item --> 
                                <li class="nk-menu-item">
                                    <a href="/dashboard/data" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                        <span class="nk-menu-text">List Packets</span>
                                    </a>
                                </li><!-- .nk-menu-item -->  
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Transaction</h6>
                                </li><!-- .nk-menu-heading -->
                                 
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Shipping Packet</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/dashboard/delivery"  class="nk-menu-link"><span class="nk-menu-text">Entri Shipping Packet</span></a>
                                        </li> 
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                   
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-pie"></em></span>
                                        <span class="nk-menu-text">Transit Packet</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/dashboard/transitpusat" class="nk-menu-link"><span class="nk-menu-text">Transit Pusat Packet</span></a>
                                        </li> 
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-puzzle"></em></span>
                                        <span class="nk-menu-text">Delivery Packet</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="/dashboard/deliverykurir" class="nk-menu-link"><span class="nk-menu-text">Entri Delivery Packet</span></a>
                                        </li><!-- .nk-menu-item --> 
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                  
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
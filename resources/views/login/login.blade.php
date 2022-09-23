@extends('layouts.mainlogin')
 
@section('container') 
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{ route('login') }}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{ URL::asset('images/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png 2x') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{ URL::asset('images/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png 2x') }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the Dashboard panel using your Username and Passcode.</p>
                                        </div>
                                    </div>

                                        @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{session('error')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                                    @error('login_gagal')
                                                        {{-- <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span> --}}
                                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                            {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                            <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                        @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <br />
                                                        @endif
                                </div><!-- .nk-block-head -->
                                <form action="{{url('proses_login')}}" method="POST" id="logForm" autocomplete="off">
                                     {{ csrf_field() }}
                                     <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email-address">Email or Username</label> 
                                        </div>
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" type="text" required class="form-control form-control-lg" id="username" name="username" placeholder="Enter your email address or username"
                                            value="{{ old('username') }}">
                                            @if($errors->has('username'))
                                                    <span class="error">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            {{-- <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot Code?</a> --}}
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input autocomplete="new-password" type="password" value="{{ old('password') }}" class="form-control form-control-lg" required name="password" id="password" placeholder="Enter your passcode">
                                            @if($errors->has('password'))
                                                    <span class="error">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <label for="captcha" class="col-md-4 col-form-label text-md-right">Captcha</label>
                                        <div class="col-md-6 captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                            </button>
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                         <label for="captcha" class="col-md-4 col-form-label text-md-right">Enter Captcha</label>
                                        <div class="col-md-6">
                                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Forgot Password ? <a href="#">Klik Here.</a>
                                </div> 
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                {{-- <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li> 
                                    </ul><!-- .nav -->
                                </div> --}}
                                <div class="mt-3">
                                    <p>&copy; 2022 RS YARSI. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ URL::asset('images/slides/aa.jpg') }}" srcset="{{ URL::asset('images/slides/aa.jpg 2x') }}" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Welcome</h4>
                                                <p>Satu akses data untuk di bagikan ke semua platform.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ URL::asset('images/slides/syariah.jpg') }}" srcset="{{ URL::asset('images/slides/syariah.jpg 2x') }}" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Rumah Sakit Syariah</h4>
                                                <p>Memberikan Pelayanan terbaik Buat Pasien dengan Pelayanan Syariah.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ URL::asset('images/slides/web2.png') }}" srcset="{{ URL::asset('images/slides/web2.png 2x') }}" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Acute Trauma Center</h4>
                                                <p>Pelayanan Tanggap Darurat dengan Acute Trauma Center.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript --> 
    <script src="{{ URL::asset('assets/js/bundle.js?ver=3.0.0') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts.js?ver=3.0.0') }}"></script>
    <script>
    $(document).ready(function() {
        $(window).keydown(function(event){
            if((event.keyCode == 13) && ($(event.target)[0]!=$("textarea")[0])) {
                event.preventDefault();
                return false;
            }
        });
    });
     $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
    </script>
    <!-- select region modal -->  
</html>
@endsection
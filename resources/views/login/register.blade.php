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
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                     <a href="/register" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{ URL::asset('images/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png 2x') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{ URL::asset('images/loginJoinKilatFix.png') }}" srcset="{{ URL::asset('images/loginJoinKilatFix.png 2x') }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Register</h5>
                                        <div class="nk-block-des">
                                            <p>Create New Account ( Mitra, Perwakilan, Courier )</p>
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
                                  <form action="{{url('proses_register')}}" method="POST" id="regForm" autocomplete="off">
                                     {{ csrf_field() }}
                                     <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Fullname</label>
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" type="text" required class="form-control form-control-lg" id="fullname" name="fullname" placeholder="Enter your Fullname"
                                            value="{{ old('fullname') }}" maxlength="145">
                                            @if($errors->has('fullname'))
                                                    <span class="error">{{ $errors->first('fullname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Select Your Type Member</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select col-sm-9" name="typemember" id="typemember" required onchange="showmitadetil();">
                                                <option value="">-- PILIH --</option>
                                                <option value="mitra">MITRA</option>
                                                <option value="driver">COURIER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id = "MitraDetil">
                                        <div class="form-group">
                                            <label class="form-label" for="merchant_name">Mitra Name ( For Type Member Mitra )</label>
                                            <div class="form-control-wrap">
                                                <input type="text"  class="form-control form-control-lg" id="merchant_name" name="merchant_name" placeholder="Enter your Mitra Name" value="{{ old('merchant_name') }}" maxlength="150">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="merchant_person">Contact Person Mitra ( For Type Member Mitra )</label>
                                            <div class="form-control-wrap">
                                                <input type="text"  class="form-control form-control-lg" id="merchant_person" name="merchant_person" placeholder="Enter your Contact Person Mitra Name" value="{{ old('merchant_person') }}" maxlength="150">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="form-control-wrap">
                                            <input type="text" required class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email addres" value="{{ old('email') }}" maxlength="150">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="handphone">No. Handphone (Whatsapp)</label>
                                        <div class="form-control-wrap">
                                            <input type="text" required class="form-control form-control-lg" id="handphone" name="handphone" placeholder="Enter your Handphone Number " value="{{ old('handphone') }}" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="address">Address </label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control" required placeholder="Enter Your Address" id="address" name="address" id="address" style="height: 100px">{{  old('address') }}</textarea>
                                            @error('address') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="name_provinces">Province ( Provinsi )</label>
                                        <div class="form-control-wrap">
                                             <input type="text" required class="form-control form-control-lg name_provinces" id="name_provinces" name="name_provinces" placeholder="Enter Your Province" value="{{ old('name_provinces') }}">
                                            @error('name_provinces')  
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                            <input type="hidden" class="form-control form-control-lg" id="id_provinces" name="id_provinces"  value="{{  old('id_provinces') }}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Regencie ( Kabupaten )</label>
                                        <div class="form-control-wrap">
                                            <div class="form-control-wrap">
                                                <input type="text" required autocomplete="off" class="form-control form-control-lg name_regencies" id="name_regencies" name="name_regencies" placeholder="Enter Your Regencie"  value="{{  old('name_regencies') }}" >
                                                @error('name_regencies')  
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                                <input type="hidden" class="form-control form-control-lg" id="id_regencies" name="id_regencies"  value="{{  old('id_regencies') }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Distrit ( Kecamatan )</label>
                                        <div class="form-control-wrap">
                                            <input type="text" required autocomplete="off" class="form-control form-control-lg name_distrits" id="name_distrits" name="name_distrits" placeholder="Enter Your Distrit"  value="{{  old('name_distrits') }}" >
                                            @error('name_distrits')  
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                            <input type="hidden" class="form-control form-control-lg" id="id_distrits" name="id_distrits"  value="{{  old('id_distrits') }}"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Village ( kelurahan )</label>
                                        <div class="form-control-wrap">
                                            <input type="text" required autocomplete="off" class="form-control form-control-lg name_villages" id="name_villages" name="name_villages" placeholder="Enter Your Distrit"  value="{{  old('name_villages') }}" >
                                            @error('name_villages')  
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                            <input type="hidden" class="form-control form-control-lg" id="id_villages" name="id_villages"  value="{{  old('id_villages') }}"  >
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
                                        </div>
                                    </div> --}}
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
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Already have an account ? <a href="/login"><strong>Sign in instead</strong></a>
                                </div> 
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer"> 
                                <div class="mt-3">
                                    <p>&copy; 2022 DashLite. All Rights Reserved.</p>
                                </div>
                            </div><!-- nk-block -->
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ URL::asset('images/slides/kiriman.png') }}" srcset="{{ URL::asset('images/slides/kiriman.png 2x') }}" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Kiriman</h4>
                                                <p>Semua ekspedisi besar regular, same day, dan instant tersedia.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ URL::asset('images/slides/aa.png') }}" srcset="{{ URL::asset('images/slides/aa.png 2x') }}" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Harga</h4>
                                                <p>Harga temurah dibanding yang lain.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ URL::asset('images/slides/keamanan.jpeg') }}" srcset="{{ URL::asset('images/slides/keamanan.jpeg 2x') }}" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Keamanan</h4>
                                                <p>Kiriman cepat, tepat & pasti sampai.</p>
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
    
    <script>
    $(document).ready(function() {
        $('#MitraDetil').hide();
        
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

    var prov_receiver = "{{ route('autocompleteprovinces') }}"; 
    $('input.name_provinces').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            return $.get(prov_receiver, { query: query }, function (data) {
                return process(data); 
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_provinces').val(data.id);
        }
    });

    var regencies_receiver = "{{ route('autocompleteRegencies') }}"; 
    $('input.name_regencies').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            var id_provisnc =  document.getElementById("id_provinces").value;
            return $.get(regencies_receiver, { query: query, id_provinces : id_provisnc }, function (data) {
                return process(data); 
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_regencies').val(data.id);
        }
    });

    var distrits_receiver= "{{ route('autocompletedistrits') }}"; 
    $('input.name_distrits').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            var id_regencies=  $("#id_regencies").val(); 
            return $.get(distrits_receiver, { query: query, id_regencies: id_regencies}, function (data) {
                return process(data); 
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_distrits').val(data.id);
        }
    });
    var villages_sender = "{{ route('autocompletevillages') }}"; 
    $('input.name_villages').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            var id_distrits=  $("#id_distrits").val(); 
            return $.get(villages_sender, { query: query, id_distrits: id_distrits}, function (data) {
                return process(data); 
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_villages').val(data.id);
        }
    });
    function showmitadetil() {
        var typemember=  $("#typemember").val(); 
        if(typemember == "mitra"){
            $('#MitraDetil').show();
        }else{
            $('#MitraDetil').hide();
        }
        
    }
    </script>
    <!-- select region modal -->  
</html>
@endsection
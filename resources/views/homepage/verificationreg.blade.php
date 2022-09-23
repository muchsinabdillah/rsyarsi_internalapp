@extends('dashboard.layouts.main2')

@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <header class="header has-header-main-s1 bg-lighter" id="home">
            {{-- @include('navigationtwo') --}}
            <div class="row"> 
                    <div class="col-lg-12 col-xxl-12">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h6 class="title">Data Registrasi Member ( Mitra/Kurir )</h6>
                                            <p>Data Registration Mitra/Kurir.</p>
                                        </div>
                                        <div class="card-tools">
                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
                                        </div>
                                    </div>
                                        @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{session('success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>  
                                        @endif
                                        @if (session()->has('success'))
                                            <script>
                                                setTimeout(function() {
                                                    window.location.href = "/"
                                                }, 2000); // 2 second
                                            </script>
                                        @endif
                                        @if(session('failed'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{session('failed')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                            <form  method="POST" action="/sendverification" enctype="multipart/form-data"> 
                                                    @csrf
                                                    <input type="hidden" class="form-control form-control-sm name_regencies_sender"  id="id_f" name="id_f" value="{{ $idreg }}">
                                                        <div class="row g-4">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-file-person"></i> Fullname</label> 
                                                                    <div class="form-control-wrap">
                                                                    <p id="fullname_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-envelope-open"></i> Email</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="email_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-phone"></i> Handphone</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="handphone_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-house-fill"></i> Address</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="address_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-house"></i> Provinsi</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="name_provinces_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-house"></i> Kabupaten</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="name_regencies_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-house"></i> Kecamatan</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="name_distrits_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-house"></i> Kelurahan</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="name_villages_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-archive"></i> Type</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="typemember_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-card-text"></i> Identitas ID</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="id_identitas_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-clipboard2"></i> Dob Place</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="dob_place_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-calendar"></i> Dob</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="dob_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-phone"></i> Status</label> 
                                                                    <div class="form-control-wrap">
                                                                        <p id="status_f"></p>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="card-title">
                                                            <h6 class="title">Upload Data </h6>
                                                            <p>Silahkan Upload Data anda ( KTP, STNK, dan Form SK ).</p>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="identitasid" class="form-label"><i class="bi bi-card-text"></i> Identitas ID</label> 
                                                                    <div class="form-control-wrap">
                                                                        <input type="text"   class="typeahead form-control @error('identitasid') is-invalid @enderror" id="identitasid" name="identitasid" autocomplete="off" maxlength="16"  value="{{  old('identitasid') }}"> 
                                                                            @error('identitasid') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                 <label for="dobplace" class="form-label"><i class="bi bi-clipboard2"></i> Dob Place</label> 
                                                                    <div class="form-control-wrap">
                                                                        <input type="text"   class="typeahead form-control @error('dobplace') is-invalid @enderror" id="dobplace" name="dobplace" autocomplete="off"   value="{{  old('dobplace') }}"> 
                                                                            @error('dobplace') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="dob" class="form-label"><i class="bi bi-calendar"></i> Dob</label> 
                                                                    <div class="form-control-wrap">
                                                                        <input type="date"   class="typeahead form-control @error('dob') is-invalid @enderror" id="dob" name="dob" autocomplete="off"   value="{{  old('dob') }}"> 
                                                                            @error('dob') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                    </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="nama_bank" class="form-label"><i class="bi bi-calendar"></i> Pilih Bank</label> 
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-select" name="nama_bank" id="nama_bank"> 
                                                                                <option value="" selected>-- PILIH --</option>   
                                                                                <option value="MANDIRI" >MANDIRI</option>   
                                                                                <option value="BCA" >BCA</option>   
                                                                                <option value="BCA SYARIAH" >BCA SYARIAH</option>   
                                                                                <option value="BRI" >BRI</option>   
                                                                                <option value="BRI SYARIAH" >BRI SYARIAH</option>   
                                                                                <option value="CIMB" >CIMB</option>   
                                                                                <option value="BNI" >BNI</option>   
                                                                                <option value="BTN" >BTN</option>   
                                                                                <option value="DANA" >DANA</option>   
                                                                                <option value="OVO" >OVO</option>   
                                                                                <option value="GOPAY" >GOPAY</option>      
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="no_rekening" class="form-label"><i class="bi bi-calendar"></i> No. Rekening</label> 
                                                                    <div class="form-control-wrap">
                                                                        <input type="number"   class="typeahead form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening" autocomplete="off"   value="{{  old('no_rekening') }}"> 
                                                                            @error('no_rekening') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="name_rekening_owner" class="form-label"><i class="bi bi-calendar"></i> Nama Pemegang Rekening</label> 
                                                                    <div class="form-control-wrap">
                                                                        <input type="text"   class="typeahead form-control @error('name_rekening_owner') is-invalid @enderror" id="name_rekening_owner" name="name_rekening_owner" autocomplete="off"   value="{{  old('name_rekening_owner') }}"> 
                                                                            @error('name_rekening_owner') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-image"></i> Foto KTP</label> 
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-file">
                                                                            <input type="file" class="form-file-input @error('filektp') is-invalid @enderror" id="filektp" name="filektp">
                                                                            <label class="form-file-label" for="customFile">Choose file</label>
                                                                             @error('filektp') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-image"></i> Foto STNK</label> 
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-file">
                                                                            <input type="file" class="form-file-input @error('filestnk') is-invalid @enderror" id="filestnk" name="filestnk">
                                                                            <label class="form-file-label" for="customFile">Choose file</label>
                                                                             @error('filestnk') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="id_register" class="form-label"><i class="bi bi-image"></i> Form SK</label> 
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-file">
                                                                            <input type="file" class="form-file-input @error('filesk') is-invalid @enderror" id="filesk" name="filesk">
                                                                            <label class="form-file-label" for="customFile">Choose file</label>
                                                                             @error('filesk') 
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12"> 
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">UPLOAD & CONFIRMED DATA</button>
                                                            </div>
                                                        </div>
                                                </form>                  
                                    
                                </div>                                   
                            </div>
                            </div><!-- .col -->
            </div><!-- .row -->
        </header><!-- .header --> 
        {{-- @include('footer') --}}
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<script>
showdata();

async function showdata() {  
           
             try{ 
                const dtgetRegistrationMitraKurirByIDJson= await getRegistrationMitraKurirByIDJson();
                updateUIdtgetRegistrationMitraKurirByIDJson(dtgetRegistrationMitraKurirByIDJson);
                
            } catch (err) {
            // toast(err, "error")
                // console.log(err);
            } 
}
function updateUIdtgetRegistrationMitraKurirByIDJson(params) {
    // console.log(params)
    if(params.data[0][0].status == "Generating"){ 
        alert("Status Application Sudah Selesai Verification !");
        window.location.href = "/"; 
    }
        document.getElementById("fullname_f").innerHTML  = params.data[0][0].fullname; 
        document.getElementById("email_f").innerHTML  = params.data[0][0].email;
        // $("#emails").val(params.data[0][0].email); 
 
        document.getElementById("handphone_f").innerHTML  = params.data[0][0].handphone; 
        document.getElementById("address_f").innerHTML  = params.data[0][0].address; 
        document.getElementById("name_provinces_f").innerHTML  = params.data[0][0].name_provinces; 
        document.getElementById("name_regencies_f").innerHTML  = params.data[0][0].name_regencies; 
        document.getElementById("name_distrits_f").innerHTML  = params.data[0][0].name_distrits; 
        document.getElementById("name_villages_f").innerHTML  = params.data[0][0].name_villages; 
        document.getElementById("typemember_f").innerHTML  = params.data[0][0].typemember;  
        document.getElementById("status_f").innerHTML  = params.data[0][0].status;
    }
    function getRegistrationMitraKurirByIDJson() {
        var base_url = window.location.origin; 
        let url = base_url + '/getRegistrationMitraKurirByIDJson';
       
         var form_data = new FormData();  
            form_data.append("id", $("#id").val());
            var id =  $('#id_f').val();
        return fetch(url, {
            method: 'POST',
            headers: {   "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
            body : "id=" + id
        })
            .then(response => {
                if (!response.ok) { throw new Error(response.statusText) }  return response.json();
            })
            .then(response => {
                if (response.status === "error") { throw new Error(response.message.errorInfo[2]);  } 
                else if (response.status === "warning") {  throw new Error(response.errorname);  }
                return response
            })
            .finally(() => {
                // $("#caramasuk").select2(); 
            })
    }
</script>
@endsection
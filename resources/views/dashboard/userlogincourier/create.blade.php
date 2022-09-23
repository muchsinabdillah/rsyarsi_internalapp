@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Create Data User Login ( Courier )</h6>
              <p>Pelase Entri User Login for your transaction.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/userlogincourier/insert"> 
             @csrf
              @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session()->has('failed'))
            <div class="alert alert-warning" role="alert">
                {{ session('failed') }}
            </div>
            @endif
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="id" class="form-label">No. ID</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('id') is-invalid @enderror " id="id"
                                name="id" autocomplete="off" readonly  value="{{  old('id') }}"> 
                                @error('id') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="merchant_name" class="form-label">Cari Courier</label>
                            <div class="form-control-wrap">
                                <input type="text"   class="form-control typeahead @error('merchant_name') is-invalid @enderror" id="merchant_name" name="merchant_name" autocomplete="off"   value="{{  old('merchant_name') }}"> 
                                @error('merchant_name') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden"   class="form-control @error('merchant_id') is-invalid @enderror" id="merchant_id" name="merchant_id" autocomplete="off" readonly  value="{{  old('merchant_id') }}"> 
                                @error('merchant_id') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>   
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Lengkap</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                                name="name" autocomplete="off"   autofocus readonly  value="{{  old('name') }}"> 
                                @error('name') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="form-label">E-mail</label>
                            <div class="form-control-wrap">
                                <input type="text"   class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="off"   value="{{  old('email') }}"> 
                                @error('email') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="level" class="form-label">User Level</label>
                            <div class="form-control-wrap">
                                <select class="form-select" name="level"> 
                                        <option value="" selected>-- PILIH --</option>   
                                        <option value="driver" >Driver</option>    
                                </select>
                                @error('level') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="username" class="form-label">Username</label>
                            <div class="form-control-wrap">
                               <input type="text"   class="form-control @error('username') is-invalid @enderror" id="username" name="username" autocomplete="off"   value="{{  old('username') }}"> 
                                @error('username') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                            <div class="form-control-wrap">
                                <select class="form-select" name="status"> 
                                        <option value="Active" selected>Active</option>   
                                        <option value="Stop" >Stop</option>   
                                </select>
                                @error('status') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="password" class="form-label">Password</label>
                            <div class="form-control-wrap">
                               <input type="password"   class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off"   value="{{  old('password') }}"> 
                                @error('password') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="password" class="form-label">Provinsi</label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_provinces" id="name_provinces" name="name_provinces" required placeholder="Ketik Provinsi" value="{{  old('name_provinces') }}" >
                                @error('name_provinces') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" required class="form-control form-control-sm" value="{{  old('id_provinces') }}" id="id_provinces" name="id_provinces" placeholder="Ketik Provinsi">
                            </div>
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="password" class="form-label">Kab/Kota</label>
                            <div class="form-control-wrap">
                                <input type="text" required autocomplete="off" class="form-control form-control-sm name_regencies"  id="name_regencies" name="name_regencies"  value="{{  old('name_regencies') }}" placeholder="Ketik Kabupaten">
                                @error('name_regencies') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" required class="form-control form-control-sm name_regencies" value="{{  old('id_regencies') }}" id="id_regencies" name="id_regencies" placeholder="Kabupaten Akhir">
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="password" class="form-label">Kecamatan</label>
                             <div class="form-control-wrap">
                                <input type="text" autocomplete="off" required  class="form-control form-control-sm name_distrits" id="name_distrits"  value="{{  old('name_distrits') }}"  name="name_distrits" placeholder="Ketik Kecamatan">
                                @error('name_distrits') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm" required  value="{{  old('id_distrits') }}"  id="id_distrits" name="id_distrits" placeholder="Ketik Kecamatan">
                            </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="password" class="form-label">kelurahan</label>
                              <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_villages" id="name_villages" name="name_villages" required value="{{  old('name_villages') }}"  placeholder="Ketik Keluarahan">
                                @error('name_villages') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm id_villages" required  value="{{  old('id_villages') }}"  id="id_villages" name="id_villages" placeholder="Keluarahan Awal">
                            </div>
                    </div>
                </div>      
            </div>
             <div class="btn-group">
                <button type="submit" class="btn btn-primary mt-3"><i class="icon bi bi-file-earmark-plus"></i><span>Save</span></button>
                <button type="button" onclick="backurl()" class="btn btn-light mt-3"><i class="icon bi bi-arrow-down-right-square"></i><span>Back</span></button>
             </div>
        </form> 
    </div>                                   
  </div>
</div><!-- .col --> 
<script > 
     var path = "{{ route('autocompletecourier') }}"; 
      $('input.typeahead').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
                console.log(data);
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#merchant_id').val(data.id_register);
         var asu = $('#merchant_name').val();
         $('#name').val(asu);

        }
    });
 
    function backurl() {
        window.location.href = '/dashboard/userlogin';
    }
    var prov_sender = "{{ route('autocompleteprovinces') }}"; 
    $('input.name_provinces').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            return $.get(prov_sender, { query: query }, function (data) {
                return process(data); 
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_provinces').val(data.id);
        }
    });
    var regencies_sender = "{{ route('autocompleteRegencies') }}"; 
    $('input.name_regencies').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            var id_provisnc =  document.getElementById("id_provinces").value;
            return $.get(regencies_sender, { query: query, id_provinces : id_provisnc }, function (data) {
                return process(data); 
            });
        },
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_regencies').val(data.id);
        }
    });
    var distrits_sender = "{{ route('autocompletedistrits') }}"; 
    $('input.name_distrits').typeahead({
        int: true,
        highlight: true,
        minLength: 2,
        source:  function (query, process) {
            var id_regencies=  $("#id_regencies").val(); 
            return $.get(distrits_sender, { query: query, id_regencies: id_regencies}, function (data) {
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
</script>
@endsection
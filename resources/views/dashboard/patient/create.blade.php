@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Create Data Pasien</h6>
              <p>Pelase Entri Merchants for your transaction.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/patient/insert"> 
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
                         <label for="id_register" class="form-label">No. ID</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('id_register') is-invalid @enderror " id="id_register"
                                name="id_register" autocomplete="off" readonly  value="{{  old('id_register') }}"> 
                                @error('id_register') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Pasien</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                                name="name" autocomplete="off"   autofocus  value="{{  old('name') }}"> 
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
                        <label for="phone_no" class="form-label">No. Handphone</label>
                            <div class="form-control-wrap">
                                <input type="number"   class="form-control @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" autocomplete="off"   value="{{  old('phone_no') }}"> 
                                @error('phone_no') 
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
                        <label for="password" class="form-label">Tgl Lahir Ibu</label>
                            <div class="form-control-wrap">
                               <input type="date"   class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off"   value="{{  old('password') }}"> 
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
                         <label for="nomr" class="form-label">No. MR</label>
                            <div class="form-control-wrap">
                               <input type="text"   class="form-control @error('nomr') is-invalid @enderror" id="nomr" name="nomr" autocomplete="off"   value="{{  old('nomr') }}"> 
                                @error('nomr') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgllahiran" class="form-label">Tgl Lahir Bayi</label>
                            <div class="form-control-wrap">
                                 <input type="date"   class="form-control @error('tgllahiran') is-invalid @enderror" id="tgllahiran" name="tgllahiran" autocomplete="off"   value="{{  old('tgllahiran') }}"> 
                                @error('tgllahiran') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgllahiran" class="form-label">Materna Program</label>
                            <div class="form-control-wrap">
                                <select class="form-select" name="maternaprogram"> 
                                        <option value="" selected>-- PILIH --</option>   
                                        <option value="1" >YA</option>   
                                        <option value="0" >TIDAK</option>    
                                </select>
                                @error('maternaprogram') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
     var path = "{{ route('autocomplete') }}"; 
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
         $('#id_regencies').val(data.id);
        }
    });
 
    function backurl() {
        window.location.href = '/dashboard/merchant';
    }
    $(document).ready(function() {
        $(window).keydown(function(event){
            if((event.keyCode == 13) && ($(event.target)[0]!=$("textarea")[0])) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>
@endsection
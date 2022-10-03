@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input Master LogBook</h6>
              <p>Silahkan Masukan Master LogBook</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/logbookpegawai/prosesUpdate"  > 
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
                         <label for="ID" class="form-label">ID</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('ID') is-invalid @enderror " id="ID"
                                name="ID" autocomplete="off" readonly  value="{{  $mstrlogbook->ID }}"> 
                                @error('ID') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nama_LogBook" class="form-label">Nama Logbook </label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('Nama_LogBook') is-invalid @enderror " id="Nama_LogBook"
                                name="Nama_LogBook" autocomplete="off"   autofocus  value="{{  $mstrlogbook->Nama_LogBook }}"> 
                                @error('Nama_LogBook') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Status" class="form-label">Status</label> 
                            <div class="form-control-wrap">
                                <select class="form-select" name="Status" id="Status"> 
                                    <option value="{{ $mstrlogbook->Status }}" >{{ $mstrlogbook->Status }}</option>   
                                    <option value="Enable" >Enable</option>   
                                    <option value="Disabled" >Disabled</option>     
                                </select> 
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script> 
    CKEDITOR.replace('DefinisiOperasional'); 
    CKEDITOR.replace('Kriteria');
    CKEDITOR.replace('BesarSample'); 

    
    </script>
<script > 
    
 
    function backurl() {
        window.location.href = '/dashboard/logbookpegawai';
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
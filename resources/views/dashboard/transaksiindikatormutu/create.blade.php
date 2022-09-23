@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input Indikator Mutu Harian</h6>
              <p>Silahkan Masukan Data Indikator Mutu Harian.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/indikatormutu/prosesCreate"  > 
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
                <div class="col-lg-2">
                    <div class="form-group">
                         <label for="ID" class="form-label">ID</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('ID') is-invalid @enderror " id="ID"
                                name="ID" autocomplete="off" readonly  value="{{  old('ID') }}"> 
                                @error('ID') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="JudulIndikator" class="form-label">Judul Indikator </label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('JudulIndikator') is-invalid @enderror " id="JudulIndikator"
                                name="JudulIndikator" autocomplete="off"   autofocus  value="{{  old('JudulIndikator') }}"> 
                                @error('JudulIndikator') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="Tanggal" class="form-label">Tanggal</label> 
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('Tanggal') is-invalid @enderror " id="Tanggal"
                                name="Tanggal" autocomplete="off"   autofocus  value="{{  old('Tanggal') }}"> 
                                @error('Tanggal') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="Numerator" class="form-label">Numerator (pembilang)</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('Numerator') is-invalid @enderror " id="Numerator"
                                name="Numerator" autocomplete="off"   autofocus  value="{{  old('Numerator') }}"> 
                                @error('Numerator') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div> 
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="Denominator" class="form-label">Denominator (penyebut)</label>  
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('Denominator') is-invalid @enderror " id="Denominator"
                                name="Denominator" autocomplete="off"   autofocus  value="{{  old('Denominator') }}"> 
                                @error('Denominator') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="Hasil" class="form-label">Hasil</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('Hasil') is-invalid @enderror " id="Hasil"
                                name="Hasil" autocomplete="off" readonly  autofocus  value="{{  old('Hasil') }}"> 
                                @error('Hasil') 
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script> 
    CKEDITOR.replace('DefinisiOperasional'); 
    CKEDITOR.replace('Kriteria');
    CKEDITOR.replace('BesarSample'); 
    </script>
<script > 
    function backurl() {
        window.location.href = '/dashboard/trsindikatormutu';
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
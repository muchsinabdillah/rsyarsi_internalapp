@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input Transaksi LogBook</h6>
              <p>Silahkan Masukan Transaksi LogBook</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/transactionLogbook/prosesCreate"  > 
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
                                name="ID"  autocomplete="off" value="{{  old('ID') }}"> 
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
                        <label for="ID_Pegawai" class="form-label">ID Pegawai</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('ID_Pegawai') is-invalid @enderror " id="ID_Pegawai"
                                name="ID_Pegawai"  autocomplete="off"  autofocus  value="{{  old('ID_Pegawai') }}"> 
                                @error('ID_Pegawai') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Unit" class="form-label">Unit </label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('Unit') is-invalid @enderror " id="Unit"
                                name="Unit"  autocomplete="off"  autofocus  value="{{  old('Unit') }}"> 
                                @error('Unit') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Tanggal_LogBook" class="form-label">Tanggal LogBook</label> 
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('Tanggal_LogBook') is-invalid @enderror " id="Tanggal_LogBook"
                                name="Tanggal_LogBook" autocomplete="off" autofocus  value="{{  old('Tanggal_LogBook') }}"> 
                                @error('Tanggal_LogBook') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nama_LogBook" class="form-label">Nama LogBook</label> 
                            <div class="form-control-wrap">
                                <select class="form-select" name="Nama_LogBook" id="Nama_LogBook"> 
                                    <option value="" >-- PILIH --</option>  
                                    @foreach ($postss as $postt)
                                    <?php if($postt['Status'] != 'Enable') continue ?>
                                    <option value= "{{ $postt['Nama_LogBook'] }}" >{{ $postt['Nama_LogBook'] }} </option> 
                                    @endforeach     
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
        window.location.href = '/dashboard/transactionLogbook';
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
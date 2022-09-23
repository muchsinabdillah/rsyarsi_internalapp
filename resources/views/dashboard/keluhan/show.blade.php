@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Data Keluhan Pasien Pasca Tindakan</h6>
              <p>Silahkan Masukan Data Fasilitas.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/keluhan/prosesUpdate" > 
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
                                <input type="hidden" class="form-control @error('ID') is-invalid @enderror " id="ID"
                                name="ID" autocomplete="off" readonly  value="{{   $merchant->ID  }}"> 
                                @error('ID') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                               <p>{{   $merchant->ID  }}</p>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Nama Pasien</label> 
                            <div class="form-control-wrap">
                                <p>{{   $merchant->patientname  }}</p>
                            </div>
                    </div>
                </div>     
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Tgl Dirasakan</label> 
                            <div class="form-control-wrap">
                                <p>{{   $merchant->datesick  }}</p>
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Keluhan</label> 
                            <div class="form-control-wrap">
                                <p>{{   $merchant->sicknote  }}</p>
                            </div>
                    </div>
                </div>     
                <hr>
                <div class="card-title">
                    <h6 class="title">Data Tindak Lanjut</h6>
                    <p>Diisi Oleh Dokter, Bidan, atau Perawat yang dinas.</p> 
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="userapproved" class="form-label">Nama User </label>
                            <div class="form-control-wrap">
                                 @error('userapproved') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                    <input id="userapproved" readonly class="form-control @error('userapproved') is-invalid @enderror " 
                                    type="text" name="userapproved" value="{{  $merchant->userapproved  }}">
                                     
                            </div>
                    </div>
                </div>     
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="noteapproved" class="form-label">Note Penanganan</label>
                            <div class="form-control-wrap">
                                 @error('noteapproved') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <textarea name="noteapproved" class="form-control" id="noteapproved"  >
                                    {{ old('noteapproved') }}
                                 </textarea> 
                            </div>
                    </div>
                </div>       
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="publish" class="form-label">Status</label>
                            <div class="form-control-wrap">
                                <select class="form-select" name="publish"> 
                                        <option value="" selected>-- PILIH --</option>   
                                        <option value="PROCESS">PROCESS</option>   
                                        <option value="CLOSED" >CLOSED</option>   
                                </select>
                                @error('publish') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
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
    CKEDITOR.replace('noteapproved');
    </script>
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
        //this triggers after a value has beesssn selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_regencies').val(data.id);
        }
    });
 
    function backurl() {
        window.location.href = '/dashboard/keluhan/list';
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
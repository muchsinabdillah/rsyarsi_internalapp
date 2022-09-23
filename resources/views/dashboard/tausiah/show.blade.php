@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input Tausiah</h6>
              <p>Silahkan Masukan Data Tausiah.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/tausiyah/prosesUpdate" enctype="multipart/form-data"> 
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
                                name="ID" autocomplete="off" readonly  value="{{  $merchant->id }}"> 
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
                        <label for="judul" class="form-label">Judul</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror " id="judul"
                                name="judul" autocomplete="off"   autofocus  value="{{  $merchant->judul }}"> 
                                @error('judul') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                  
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="shortdescription" class="form-label">Deskripsi Singkat</label>
                            <div class="form-control-wrap">
                                 @error('shortdescription') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                    <input id="shortdescription" maxlength="140" 
                                    class="form-control @error('shortdescription') is-invalid @enderror " 
                                    type="text" name="shortdescription" value="{{ $merchant->shortdescription }}">
                                     
                            </div>
                    </div>
                </div>     
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="description" class="form-label">Deskripsi Lengkap</label>
                            <div class="form-control-wrap">
                                 @error('description') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <textarea name="description" class="form-control" id="description"  >
                                    {{ old('description') }}
                                 </textarea>
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
    CKEDITOR.replace('description');
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
        //this triggers after a value has been selected on the control
        afterSelect: function (data) {
        //print the id to developer tool's console 
         $('#id_regencies').val(data.id);
        }
    });
 
    function backurl() {
        window.location.href = '/dashboard/tausiyah/list';
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
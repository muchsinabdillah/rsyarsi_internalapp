@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input Center Of Excellent</h6>
              <p>Silahkan Masukan Data Center Of Excellent.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/coe/prosesUpdate" enctype="multipart/form-data"> 
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
                                name="ID" autocomplete="off" readonly  value="{{ $merchant->ID }}"> 
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
                        <label for="name" class="form-label">Nama</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                                name="name" autocomplete="off"   autofocus  value="{{ $merchant->name }}"> 
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
                        <label for="slug" class="form-label">Slug</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror " id="slug"
                                name="slug" autocomplete="off"  readonly autofocus  value="{{  $merchant->slug }}"> 
                                @error('slug') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                                        {{ $merchant->description }}
                                     </textarea>
                            </div>
                    </div>
                </div>      
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image" class="form-label">Foto</label>
                            <div class="form-control-wrap">
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                                @error('image') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <img src="{{  $merchant->images }}" alt="Girl in a jacket" width="50" height="50">
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="publish" class="form-label">Status</label>
                            <div class="form-control-wrap">
                                <select class="form-select" name="publish"> 
                                        <option value="{{  $merchant->publish }}" selected>{{  $merchant->publish }}</option>   
                                        <option value="Publish" selected>Publish</option>   
                                        <option value="Stop" >Stop</option>   
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
    CKEDITOR.replace('description');
    </script>
<script > 
 const title = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/coe/checkSlug?name=' + title.value)
        .then(response=> response.json())
        .then(data => slug.value = data.slug)
    });

 
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
        window.location.href = '/dashboard/coe';
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
@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input Paket Rumah Sakit</h6>
              <p>Silahkan Masukan Data Paket Rumah Sakit.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/hospitalpacket/prosesUpdate" enctype="multipart/form-data"> 
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
                         <label for="id" class="form-label">ID</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('id') is-invalid @enderror " id="id"
                                name="id" autocomplete="off" readonly  value="{{   $merchant->id  }}"> 
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
                        <label for="title" class="form-label">Title</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('title') is-invalid @enderror " id="title"
                                name="title" autocomplete="off"   autofocus  value="{{   $merchant->title  }}"> 
                                @error('title') 
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
                                name="slug" autocomplete="off" readonly  autofocus  value="{{   $merchant->slug  }}"> 
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
                        <label for="shortdescription" class="form-label">Short Description</label>
                            <div class="form-control-wrap">
                                 @error('shortdescription') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                    <input id="shortdescription" maxlength="145" class="form-control @error('shortdescription') is-invalid @enderror " 
                                    type="text" name="shortdescription" value="{{  $merchant->shortdescription  }}">
                                     
                            </div>
                    </div>
                </div>     
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="longdescription" class="form-label">Long Description</label>
                            <div class="form-control-wrap">
                                 @error('longdescription') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror 
                                     <textarea name="longdescription" class="form-control" id="longdescription"  >
                                        {{ $merchant->longdescription  }}
                                     </textarea>
                            </div>
                    </div>
                </div>      
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label for="startdate" class="form-label">Start Date</label> 
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('startdate') is-invalid @enderror " id="startdate"
                                name="startdate" autocomplete="off" value="{{  $merchant->startdate  }}"> 
                                @error('startdate') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="enddate" class="form-label">End Date</label> 
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('enddate') is-invalid @enderror " id="enddate"
                                name="enddate" autocomplete="off" value="{{  $merchant->enddate  }}"> 
                                @error('enddate') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
                                        <option value="Active" selected>Publish</option>   
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
    CKEDITOR.replace('longdescription');
    </script>
<script > 
     const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/fasilitas/checkSlug?name=' + title.value)
        .then(response=> response.json())
        .then(data => slug.value = data.slug)
    });
    function backurl() {
        window.location.href = '/dashboard/hospitalpacket';
    } 
</script>
@endsection
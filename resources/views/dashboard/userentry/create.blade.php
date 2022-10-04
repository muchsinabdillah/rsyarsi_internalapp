@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Input User</h6>
              <p>Silahkan Masukan User</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
        <form  method="POST" action="/dashboard/userentry/prosesCreate"  > 
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
                        <label for="name" class="form-label">Nama</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                                name="name" autocomplete="off" value="{{  old('name') }}"> 
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
                        <label for="username" class="form-label">Username</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('username') is-invalid @enderror " id="username"
                                name="username" autocomplete="off"   autofocus  value="{{  old('username') }}"> 
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
                        <label for="Unit" class="form-label">Unit</label> 
                            <div class="form-control-wrap">
                                <select class="form-select" name="Unit" id="Unit"> 
                                    <option value="" >-- PILIH --</option> 
                                    @foreach ($postsss as $postt)
                                    <option value= "{{ $postt['ID'] }}" >{{ $postt['Nama_Unit'] }} </option> 
                                    @endforeach     
                                </select> 
                            </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('email') is-invalid @enderror " id="email"
                                name="email" autocomplete="off"   autofocus  value="{{  old('email') }}"> 
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
                        <label for="password" class="form-label">Password</label> 
                            <div class="form-control-wrap">
                                <input type="password" class="form-control @error('password') is-invalid @enderror " id="password"
                                name="password" autocomplete="off"   autofocus  value="{{  old('password') }}"> 
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
                        <label for="level" class="form-label">Level</label> 
                            <div class="form-control-wrap">
                                <select class="form-select" name="level" id="level"> 
                                    <option value="" >-- PILIH --</option>   
                                    <option value="admin" >admin</option>   
                                    <option value="user" >user</option>     
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
        window.location.href = '/dashboard/userentry';
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
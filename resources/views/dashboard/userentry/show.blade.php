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
        <form  method="POST" action="/dashboard/userentry/prosesUpdate"  > 
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
                                name="id" autocomplete="off" readonly  value="{{  $userEntry->id }}"> 
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
                        <label for="name" class="form-label">Nama</label> 
                            <div class="form-control-wrap">
                                <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                                name="name" autocomplete="off" value="{{  $userEntry->name }}"> 
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
                                name="username" autocomplete="off" value="{{  $userEntry->username }}"> 
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
                                    @foreach($postsss as $postt)
                                        <?php 
                                        
                                        if($postt['ID'] == $userEntry->Unit){
                                            $z = $postt['Nama_Unit'];
                                            $s= $postt['ID'];
                                        }
                                        ?>  
                                    @endforeach
                                    <option value="{{ $s }}" >{{ $z }}</option>
                                    @foreach ($postsss as $postt)
                                        <?php if($z != $postt['Nama_Unit']) { ?>
                                            <?php if(0 != $postt['ID']) { ?>
                                            <option value= "{{ $postt['ID'] }}" >{{ $postt['Nama_Unit'] }} </option>
                                        <?php } ?>
                                        <?php } ?>
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
                                name="email" autocomplete="off"   autofocus  value="{{  $userEntry->email }}"> 
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
                        <label for="level" class="form-label">Level</label> 
                            <div class="form-control-wrap">
                                <select class="form-select" name="level" id="level"> 
                                    <option value="{{ $userEntry->level }}" >{{ $userEntry->level }}</option> 
                                    <?php if('admin' != $userEntry->level) { ?>
                                    <option value="admin" >admin</option>
                                    <?php }else{ ?>
                                    <option value="user" >user</option>   
                                    <?php } ?>
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
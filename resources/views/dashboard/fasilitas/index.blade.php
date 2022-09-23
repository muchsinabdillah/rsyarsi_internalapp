@extends('dashboard.layouts.main')
@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Data Fasilitas</h6>
              <p>Berikut Adalah Data Fasilitas</p>
              <a href="/dashboard/fasilitas/create" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>New</span></a>
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div>
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
                <div class="table-responsive" >
                <table class="datatable-init table table-striped" width="100%">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th> 
                        <th scope="col">Desc</th>
                        <th scope="col">Images</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th> 
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                          <tr>
                              <td>{{  $loop->iteration }}</td>
                              <td>{{  $post->name }}</td> 
                              <td>{{  Str::limit( $post->shortdescription, 20, '...')  }}</td>
                              <td> <img src="{{  $post->images }}" alt="Girl in a jacket" width="50" height="50"> </td>
                              <td>{{  $post->publish }}</td>
                              <td>
                                  <a href="/dashboard/fasilitas/view/{{ $post->ID }}" class="btn btn-sm btn-info"><i class="icon bi bi-eye"></i></a> 
                              </td> 
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
                <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
         
    </div>                                   
  </div>
</div><!-- .col -->
                                               
@endsection
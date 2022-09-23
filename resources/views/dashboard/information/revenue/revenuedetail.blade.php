@extends('dashboard.layouts.main')
@section('container')
 <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Information Revenue Detail</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <form  method="POST" action="/dashboard/processinfodetil"> 
                                                        @csrf
                                                        <li>
                                                            <div class="form-control-wrap"> 
                                                                <input type="date" class="form-control" id="date1" name="date1">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-control-wrap"> 
                                                                <input type="date" class="form-control" id="date1" name="date2">
                                                            </div>
                                                        </li> 
                                                        <li class="nk-block-tools-opt">  
                                                                <button type="submit" class="btn btn-primary d-none d-md-inline-flex">
                                                                  <em class="icon ni ni-search"></em>
                                                                  <span>Proses</span>
                                                                </button> 
                                                        </li>
                                                        </form>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner"> 
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
              <div class="table-responsive" width="100%">
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-mb">#</th>
                        <th class="nk-tb-col tb-col-mb">Id Transaksi</th> 
                        <th class="nk-tb-col tb-col-mb">Tgl Transaksi</th> 
                        <th class="nk-tb-col tb-col-mb">Nama Mitra</th> 
                        <th class="nk-tb-col tb-col-mb">Jenis Paket</th> 
                        <th class="nk-tb-col tb-col-mb">Berat</th> 
                        <th class="nk-tb-col tb-col-mb">Harga</th> 
                        <th class="nk-tb-col tb-col-mb">Grandtotal</th>  
                        </tr>
                    </thead>
            <tbody>
                  @foreach ($posts as $post)
                     <tr class="nk-tb-item">
                    <td class="nk-tb-col tb-col-lg">{{  $loop->iteration }}</td>
                    {{-- <td class="nk-tb-col tb-col-lg"><a href="/dashboard/delivery/view/{{ $post->id }}" class="badge bg-info">{{  $post->fullname }}</a></td>  --}}
                    <td class="nk-tb-col tb-col-lg">{{  $post->id_register }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->date_transaction }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->merchant_name }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->packet_name }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->weight }}</td> 
                    <td class="nk-tb-col tb-col-lg">{{  $post->price }}</td> 
                    <td class="nk-tb-col tb-col-lg">{{  $post->price_total }}</td>  
                    </tr>
                    @endforeach  
          </tbody>
          
                </table>
              </div>
                {{-- <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div> --}}
         
    </div>                                   
  </div>
</div><!-- .col --> 
@endsection
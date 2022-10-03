@extends('dashboard.layouts.main')
@section('container')
    
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Data Transaksi LogBook</h6>
              <p>Berikut Adalah Data Transaksi LogBook</p>
              <a href="/dashboard/transactionLogbook/create" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>New</span></a>
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
                        <th scope="col">ID Pegawai</th> 
                        <th scope="col">ID LogBook</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Salat Subuh<th>
                        <th scope="col">Salat Zuhur<th>
                        <th scope="col">Salat Asar<th>
                        <th scope="col">Salat Magrib<th>
                        <th scope="col">Salat Isya<th>
                        <th scope="col">Subuh Qobliyah<th>
                        <th scope="col">Zuhur Qobliyah<th>
                        <th scope="col">Zuhur Ba'diyah<th>
                        <th scope="col">Asar Qobliyah<th>
                        <th scope="col">Magrib Qobliyah<th>
                        <th scope="col">Magrib Ba'diyah<th>
                        <th scope="col">Isya Qobliyah<th>
                        <th scope="col">Isya Ba'diyah<th>
                        <th scope="col">Salat Duha</th>
                        <th scope="col">Salat Tahajud</th>
                        <th scope="col">Tahsin</th>
                        <th scope="col">Tilawah</th>
                        <th scope="col">Infaq</th>
                        <th scope="col">Puasa Senin</th>
                        <th scope="col">Puasa Kamis</th>
                        <th scope="col">Silaturahmi</th>
                        <th scope="col">Pengajian</th>
                        <th scope="col">Syariah</th>
                        <th scope="col">Pakaian</th>
                        <th scope="col">Action</th> 
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($posts as $post)
                          <tr>
                              <td>{{  $loop->iteration }}</td>
                              <td>{{  $post->ID_Pegawai }}</td>
                              <td>{{  $post->ID_LogBook }}</td>
                              <td>{{  $post->Unit }}</td>
                              <td>{{  $post->Tanggal }}</td>
                              <td>{{  $post->Salat_Subuh }}</td>
                              <td>{{  $post->Salat_Zuhur }}</td>
                              <td>{{  $post->Salat_Asar }}</td>
                              <td>{{  $post->Salat_Magrib }}</td>
                              <td>{{  $post->Salat_Isya }}</td>
                              <td>{{  $post->Subuh_Qobliyah }}</td>
                              <td>{{  $post->Zuhur_Qobliyah }}</td>
                              <td>{{  $post->Zuhur_Badiyah }}</td>
                              <td>{{  $post->Asar_Qobliyah }}</td>
                              <td>{{  $post->Magrib_Qobliyah }}</td>
                              <td>{{  $post->Magrib_Badiyah }}</td>
                              <td>{{  $post->Isya_Qobliyah }}</td>
                              <td>{{  $post->Isya_Badiyah }}</td>
                              <td>{{  $post->Salat_Duha }}</td>
                              <td>{{  $post->Salat_Tahajud }}</td>
                              <td>{{  $post->Tahsin }}</td>
                              <td>{{  $post->Tilawah }}</td>
                              <td>{{  $post->Infaq }}</td>
                              <td>{{  $post->Puasa_Senin }}</td>
                              <td>{{  $post->Puasa_Kamis }}</td>
                              <td>{{  $post->Silaturahmi }}</td>
                              <td>{{  $post->Pengajian }}</td>
                              <td>{{  $post->Syariah }}</td>
                              <td>{{  $post->Pakaian }}</td>
                              <td>
                                <a href="/dashboard/transactionLogbook/view/{{ $post->ID }}" class="btn btn-sm btn-info"><i class="icon bi bi-eye"></i></a>
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
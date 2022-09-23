@extends('dashboard.layouts.main')
@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">History Data Registration Mitra/Kurir</h6>
              <p>Data Registration Mitra/Kurir.</p>
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
              <div class="table-responsive" width="100%">
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-mb">#</th>
                        <th class="nk-tb-col tb-col-mb">Nama Lengkap</th> 
                        <th class="nk-tb-col tb-col-mb">Email</th> 
                        <th class="nk-tb-col tb-col-mb">Alamat</th> 
                        <th class="nk-tb-col tb-col-mb">No. Handphone</th> 
                        <th class="nk-tb-col tb-col-mb">Type</th> 
                        <th class="nk-tb-col tb-col-mb">Status</th> 
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </tr>
                    </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col tb-col-lg">{{  $loop->iteration }}</td>
                    {{-- <td class="nk-tb-col tb-col-lg"><a href="/dashboard/delivery/view/{{ $post->id }}" class="badge bg-info">{{  $post->fullname }}</a></td>  --}}
                    <td class="nk-tb-col tb-col-lg">{{  $post->fullname }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->email }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->address }}</td>
                    <td class="nk-tb-col tb-col-lg">{{  $post->handphone }}</td> 
                    @if ($post->typemember =="mitra")
                         <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-grey">{{ $post->typemember }}</span></td>  
                    @else
                        <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-success">{{ $post->typemember }}</span></td>  
                    @endif
                    @if ($post->status =="Unconfirmed")
                         <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-warning">{{ $post->status }}</span></td>  
                    @endif
                   @if ($post->status =="Confirmed")
                         <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-success">{{ $post->status }}</span></td>  
                    @endif
                     @if ($post->status =="Waiting")
                         <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-primary">{{ $post->status }}</span></td>  
                    @endif
                     @if ($post->status =="Generating")
                         <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-danger">{{ $post->status }}</span></td>  
                    @endif
                     @if ($post->status =="Finished")
                         <td class="nk-tb-col tb-col-lg"> <span class="tb-status text-danger">{{ $post->status }}</span></td>  
                    @endif
                     <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1"> 
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr"> 
                                                                                    <li>
                                                                                        <a href="#modalFormConfirmation" data-bs-toggle="modal" onclick="showdata({{ $post->id }})"><em class="icon ni ni-eye"></em><span>View Details</span></a>
                                                                                    </li> 
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
<!-- Modal Content Code -->
<div class="modal fade" id="modalFormConfirmation"  tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registration - Confirmation Data</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="/dashboard/Confirmation"> 
                       @csrf
                        <input type="hidden" class="form-control form-control-sm name_regencies_sender"  id="id" name="id" placeholder="Kabupaten Akhir">
                        <input type="hidden" class="form-control form-control-sm name_regencies_sender"  id="emails" name="emails" placeholder="Kabupaten Akhir">
                        <input type="hidden" class="form-control form-control-sm name_regencies_sender"  id="stauses" name="stauses" placeholder="Kabupaten Akhir">
                        <input type="hidden" class="form-control form-control-sm name_regencies_sender"  id="usernames" name="usernames" placeholder="Kabupaten Akhir">
                        <input type="hidden" class="form-control form-control-sm name_regencies_sender"  id="fullnames" name="fullnames" placeholder="Kabupaten Akhir">
                        <input type="hidden" name="tokexn" value="MkK8Zov5ZnoARfyC6HKSVgiNPNbMKTcrJW49vFfN">                                      
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-file-person"></i> Fullname</label> 
                                        <div class="form-control-wrap">
                                           <p id="fullname"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-envelope-open"></i> Email</label> 
                                        <div class="form-control-wrap">
                                             <p id="email"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-phone"></i> Handphone</label> 
                                        <div class="form-control-wrap">
                                             <p id="handphone"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-house-fill"></i> Address</label> 
                                        <div class="form-control-wrap">
                                             <p id="address"></p>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-house"></i> Provinsi</label> 
                                        <div class="form-control-wrap">
                                             <p id="name_provinces"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-house"></i> Kabupaten</label> 
                                        <div class="form-control-wrap">
                                             <p id="name_regencies"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-house"></i> Kecamatan</label> 
                                        <div class="form-control-wrap">
                                             <p id="name_distrits"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-house"></i> Kelurahan</label> 
                                        <div class="form-control-wrap">
                                             <p id="name_villages"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-archive"></i> Type</label> 
                                        <div class="form-control-wrap">
                                             <p id="typemember"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-card-text"></i> Identitas ID</label> 
                                        <div class="form-control-wrap">
                                             <p id="id_identitas"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-clipboard2"></i> Dob Place</label> 
                                        <div class="form-control-wrap">
                                             <p id="dob_place"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-calendar"></i> Dob</label> 
                                        <div class="form-control-wrap">
                                             <p id="dob"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-phone"></i> Status</label> 
                                        <div class="form-control-wrap">
                                             <p id="status"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-image"></i> KTP Foto</label> 
                                        <div class="form-control-wrap">
                                             <p id="foto_ktp"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-image"></i> STNK Foto</label> 
                                        <div class="form-control-wrap">
                                             <p id="foto_stnk"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="id_register" class="form-label"><i class="bi bi-image"></i> SK Foto</label> 
                                        <div class="form-control-wrap">
                                             <p id="foto_sk"></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-12"> 
                                <div class="form-group">
                                    {{-- <button type="submit" class="btn btn-lg btn-primary">Save Confirmation</button> --}}
                                </div>
                            </div>
                    </form> 
                </div> 
            </div>
        </div>
    </div>
</div> 
    <script>
    var base_url = window.location.origin; 
    async function showdata(params) { 
            $('#id').val(params);
            $('#id_f').val(params);
             try{ 
                const dtgetRegistrationMitraKurirByIDJson= await getRegistrationMitraKurirByIDJson(params);
                updateUIdtgetRegistrationMitraKurirByIDJson(dtgetRegistrationMitraKurirByIDJson);
                console.log(dtgetRegistrationMitraKurirByIDJson);
            } catch (err) { 
            console.log(err);
            } 
    }
    function updateUIdtgetRegistrationMitraKurirByIDJson(params) {
        document.getElementById("fullname").innerHTML  = params.data[0][0].fullname; 
        document.getElementById("email").innerHTML  = params.data[0][0].email; 
        $("#emails").val(params.data[0][0].email); 
        $("#stauses").val(params.data[0][0].status); 
        $("#type_f").val(params.data[0][0].typemember);

        $("#fullnames").val(params.data[0][0].fullname);
        $("#usernames").val(params.data[0][0].username); 

        
        document.getElementById("handphone").innerHTML  = params.data[0][0].handphone; 
        document.getElementById("address").innerHTML  = params.data[0][0].address; 
        document.getElementById("name_provinces").innerHTML  = params.data[0][0].name_provinces; 
        document.getElementById("name_regencies").innerHTML  = params.data[0][0].name_regencies; 
        document.getElementById("name_distrits").innerHTML  = params.data[0][0].name_distrits; 
        document.getElementById("name_villages").innerHTML  = params.data[0][0].name_villages; 
        document.getElementById("typemember").innerHTML  = params.data[0][0].typemember; 
 
        $('#foto_ktp').prepend('<img src="/img/ktp/'+ params.data[0][0].foto_ktp +'" >');
        $('#foto_sk').prepend('<img src="/img/sk/'+ params.data[0][0].foto_sk +'" >');
        $('#foto_stnk').prepend('<img src="/img/stnk/'+ params.data[0][0].foto_stnk +'" >'); 
        document.getElementById("id_identitas").innerHTML  = params.data[0][0].id_identitas; 
        document.getElementById("dob").innerHTML  = params.data[0][0].dob; 
        document.getElementById("dob_place").innerHTML  = params.data[0][0].dob_place; 
        document.getElementById("status").innerHTML  = params.data[0][0].status; 
    }
    function getRegistrationMitraKurirByIDJson(params) {
        let url = base_url + '/getRegistrationMitraKurirByIDJson';
         var form_data = new FormData();  
            form_data.append("id", $("#id").val());
            var id = params;
        return fetch(url, {
            method: 'POST',
            headers: {   "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
            body : "id=" + id
        })
            .then(response => {
                if (!response.ok) { throw new Error(response.statusText) }  return response.json();
            })
            .then(response => {
                if (response.status === "error") { throw new Error(response.message.errorInfo[2]);  } 
                else if (response.status === "warning") {  throw new Error(response.errorname);  }
                return response
            })
            .finally(() => {
                // $("#caramasuk").select2(); 
            })
    }
    </script>
@endsection
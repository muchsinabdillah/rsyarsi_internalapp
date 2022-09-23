@extends('dashboard.layouts.main')
@section('container')
   <div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">List Data Delivery Packet - {{ auth()->user()->merchant_id }}</h6>
              <p>Data Packet base On Merchant.</p>
         </div>
        <div class="card-tools" >
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
            <form method="POST" action="/dashboard/transit/create" id="form-price-list"> 
            <meta name="csrf-token" content="{{ csrf_token() }}">
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
                         <label for="name_provinces_start" class="form-label"> Status Update <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select col-sm-9" name="id_packet" id="id_packet"  >
                                </select>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="name_provinces_start" class="form-label"> Couriers <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select col-sm-9" name="id_courier" id="id_courier"  >
                                </select>
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="No_resi" class="form-label">Kode Resi <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input autocomplete="off" type="text" class="form-control form-control-sm No_resi"  id="No_resi" name="No_resi" autofocus placeholder="Scan No. Resi Here" onchange="goValidate();"> 
                            </div>
                    </div>
                </div>    
            </div> 
        </form> 
        <hr>
              <div class="table-responsive" width="100%"> 
                  {{-- <table class="table datatable-init nowrap " id="data-table"> --}}
                    <table class="table nowrap" id="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Resi</th>
                            <th>Status</th>
                            <th>Provinsi Receive</th>
                            <th>Kota/Kab Receive</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
                
         
    </div>                                   
  </div>
</div><!-- .col -->
<script type="text/javascript">
 var base_url = window.location.origin;
  $(function () {
    loadall();
     getTablesData(); 
  });
  function getTablesData() {
    $('#data-table').DataTable().clear().destroy();
      $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/dashboard/deliverykurir",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'id_transaction_delivery', name: 'id_transaction_delivery'},
            {data: 'transaction_status', name: 'transaction_status'},
            {data: 'name_provinces_receiver', name: 'name_provinces_receiver',
             orderable: false, searchable: false},
            {data: 'name_regencies_receiver', name: 'name_regencies_receiver'},
        ]
    });
  }
    async function loadall() {
        try{
            const dtgetDataMasterHistoryDelivery = await getDataMasterHistoryDelivery(); 
             updateUIdtgetDataMasterHistoryDelivery(dtgetDataMasterHistoryDelivery); 
              const dtgetDataMasterCourierss = await getDataMasterCouriersa(); 
             updateUIdtgetDataMasterCouriers(dtgetDataMasterCourierss);  
        } catch (err) {
           // toast(err, "error")
           console.log(err);
        }
    }
    function updateUIdtgetDataMasterCouriers(dtgetDataMasterCourierss) { 
        let responseApi = dtgetDataMasterCourierss.data[0];
        if (responseApi !== null && responseApi !== undefined) { 
            var newRow = '<option value="">-- PILIH --</option';
            $("#id_courier").append(newRow);
            for (i = 0; i < responseApi.length; i++) { 
                var newRow = '<option value="' + responseApi[i].ID + '">' + responseApi[i].Name + '</option';
                $("#id_courier").append(newRow);
            }
        }
    }
    function getDataMasterCouriersa() {
        var base_url = window.location.origin;
        let url = base_url + '/getDataMasterCouriersbyRegenciesJSon';
        return fetch(url, {
            method: 'GET',
            headers: {   "Content-type": "application/x-www-form-urlencoded; charset=UTF-8" }
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
    function updateUIdtgetDataMasterHistoryDelivery(dtgetDataMasterHistoryDelivery) { 
        let responseApi = dtgetDataMasterHistoryDelivery.data[0];
        if (responseApi !== null && responseApi !== undefined) { 
            var newRow = '<option value="">-- PILIH --</option';
            $("#id_packet").append(newRow);
            for (i = 0; i < responseApi.length; i++) { 
                var newRow = '<option value="' + responseApi[i].NAME + '">' + responseApi[i].NAME + '</option';
                $("#id_packet").append(newRow);
            }
        }
    }
    function getDataMasterHistoryDelivery() {
        var base_url = window.location.origin;
        let url = base_url + '/getDataMasterHistoryDeliveryJSon';
        return fetch(url, {
            method: 'GET',
            headers: {   "Content-type": "application/x-www-form-urlencoded; charset=UTF-8" }
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
    function goValidate() {
       var No_resi =  $('#No_resi').val();
       var id_packet =  $('#id_packet').val();
       var id_courier =  $('#id_courier').val();
        if(No_resi.length == "17"){
          updateDataTransit(id_packet,No_resi,id_courier);
        }
    }
    async function updateDataTransit(id_packet,No_resi,id_courier) {
        try{
            const dtGoTransitDataPacket= await GoTransitDataPacket(id_packet,No_resi,id_courier); 
            console.log(dtGoTransitDataPacket);
            updateUIdtGoTransitDataPacket(dtGoTransitDataPacket); 
        } catch (err) {
           // toast(err, "error")
           console.log(err);
        }
    }
    function updateUIdtGoTransitDataPacket(params) {
        if(params.success === false){
            swalError(params.data); 
        }
        $('#No_resi').val(''); 
        $('#No_resi').focus();
        getTablesData();  
    }
    function swalError(data) { 
         swal({
            title: "Error",
            text: data,
            icon: "error",  
        }).then((willDelete) => {
                if (willDelete) {
                   $('#No_resi').focus();
                }  
            }); 
    }
    function swalSuccess(data) {
            swal({
                title: "Success",
                text: data,
                icon: "success",  
            }).then((willDelete) => {
                    if (willDelete) {
                        location.reload();
                    }  
                });
    }
    function GoTransitDataPacket(id_packet,No_resi,id_courier) {
       var base_url = window.location.origin;
        let url = base_url + '/dashboard/deliverykurir/create'; 
        
        var id_packet = id_packet; 
        var No_resi =  No_resi; 
        var id_courier =  id_courier; 

        return fetch(url, {
            method: 'POST',
            headers: {   "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
            body : "id_packet=" + id_packet + "&No_resi=" + No_resi + "&id_courier=" + id_courier 
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
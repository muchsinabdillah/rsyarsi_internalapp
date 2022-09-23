@extends('dashboard.layouts.main')
@section('container')
{{-- 
<div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Total Packets</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Deposited"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> 49,595.34 
                                                        </span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">DELIVERED</div>
                                                                <div class="amount">2,940.59 
                                                                 </div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title">HOLD</div>
                                                                <div class="amount">1,259.28 
                                                                 </div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col --> --}}
                                        {{-- <div class="col-md-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Performed</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Withdraw"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> 91 %
                                                         </span>
                                                        <span class="change down text-danger">
                                                         </span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">Rating</div>
                                                                <ul class="rating mt-1">
                                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                                    <li><em class="icon ni ni-star-fill"></em></li>
                                                                    <li><em class="icon ni ni-star-half-fill"></em></li>
                                                                    <li><em class="icon ni ni-star"></em></li>
                                                                </ul>
                                                            </div> 
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col --> --}}
                                        {{-- <div class="col-md-4">
                                            <div class="card card-bordered  card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start mb-0">
                                                        <div class="card-title">
                                                            <h6 class="subtitle">Balance in Account</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Balance in Account"></em>
                                                        </div>
                                                    </div>
                                                    <div class="card-amount">
                                                        <span class="amount"> 79,358.50 <span class="currency currency-usd">USD</span>
                                                        </span>
                                                    </div>
                                                    <div class="invest-data">
                                                        <div class="invest-data-amount g-2">
                                                            <div class="invest-data-history">
                                                                <div class="title">This Month</div>
                                                                <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                            <div class="invest-data-history">
                                                                <div class="title">This Week</div>
                                                                <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-data-ck">
                                                            <canvas class="iv-data-chart" id="totalBalance"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col --> --}}
   <div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">List Data Delivery Packet - Courier : {{ auth()->user()->name }} </h6>
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
            
        <hr>
        
              <div class="table-responsive" width="100%"> 
                  {{-- <table class="table datatable-init nowrap " id="data-table"> --}}
                    {{-- <table class="table nowrap" id="data-table"> --}}
                        <table class="nk-tb-list nk-tb-ulist" id="data-table" data-auto-responsive="false">
                    <thead>
                        <tr>
                            <th>No. Resi</th>
                            <th>Sender</th>
                            <th>Receiver</th> 
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
        "processing": true,
        "serverSide": true,
        "ajax": "/driver",
        "columns": [
            {
                "render": function (data, type, row) { // Tampilkan kolom aksi
                    var html = ""

                    var html = '<a href="/dashboard/delivery/kurir/' + row.id + '" class="badge bg-info">' + row.id_transaction_delivery + '</a>'
                    return html
                }
            },
            {
                "render": function (data, type, row) { // Tampilkan kolom aksi
                    var html = "" 
                    var html = '  <li><i class="bi bi-house-fill"></i> <span>Address</span></li><span class="tb-lead">' + row.address_sender + ', ' + row.name_provinces_sender + ', ' + row.name_regencies_sender + '<span class="dot dot-success d-md-none ms-1"></span></span><br><li><i class="bi bi-file-person-fill"></i> <span>Person</span></li><span class="tb-lead">' + row.sender + '<span class="dot dot-success d-md-none ms-1"></span></span><br><li><i class="bi bi-telephone-fill"></i> <span>Phone</span></li><span class="tb-lead">' + row.senderphonenumber + '<span class="dot dot-success d-md-none ms-1"></span></span>'
                    return html
                }
            },
            {
                "render": function (data, type, row) { // Tampilkan kolom aksi
                    var html = "" 
                    var html = '  <li><i class="bi bi-house-fill"></i> <span>Address</span></li><span class="tb-lead">' + row.address_sender + ', ' + row.name_provinces_sender + ', ' + row.name_regencies_sender + '<span class="dot dot-success d-md-none ms-1"></span></span><br><li><i class="bi bi-file-person-fill"></i> <span>Person</span></li><span class="tb-lead">' + row.sender + '<span class="dot dot-success d-md-none ms-1"></span></span><br><li><i class="bi bi-telephone-fill"></i> <span>Phone</span></li><span class="tb-lead">' + row.senderphonenumber + '<span class="dot dot-success d-md-none ms-1"></span></span>'
                    return html
                }
            },
        ]
    });
  }
    async function loadall() {
        try{
            const dtgetDataMasterHistoryDelivery = await getDataMasterHistoryDelivery(); 
             updateUIdtgetDataMasterHistoryDelivery(dtgetDataMasterHistoryDelivery); 
              const dtgetDataMasterCourierss = await getDataMasterCouriersa(); 
             updateUIdtgetDataMasterCouriers(dtgetDataMasterCourierss); 
            console.log(dtgetDataMasterCouriers);
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
        let url = base_url + '/getDataMasterCouriersJSon';
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
      if(params.success){
        $('#No_resi').val('');
        getTablesData(); 

      } 
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
    function ShowData(params) {
        console.log(params);
    }
</script>

@endsection
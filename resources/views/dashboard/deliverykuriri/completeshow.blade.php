@extends('dashboard.layouts.main')

@section('container')
  <div class="col-lg-12 col-xxl-12">
  <div class="card card-bordered">
    <div class="card-inner">
      <div class="card-title-group align-start mb-2">
        <div class="card-title">
            <h6 class="title">Show Data Shipping Packet <button type="button" class="btn btn-primary" data-bs-toggle="modal"  id="cekhistory" data-bs-target="#modalDefault">View History</button> </h6> 
              <p>You can See Your Packet Data here.</p> 
        </div>
        <div class="card-tools">
            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
        </div>
      </div> 
            <div class="row g-4">
                <figure  style="margin-bottom: -10px">
                <blockquote class="blockquote">
                    <p>Input Data Pengirim</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Silahkan Masukan Data Pengirim
                </figcaption>
                </figure> 
                <div class="col-lg-12">
                      <form method="POST" action="{{ route('arrived')  }}" enctype="multipart/form-data">  
                           @csrf
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
                    <div class="form-group">
                       <label for="id" class="form-label">ID <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm id" id="id"  value="{{  $merchant->id }}"  name="id" readonly> 
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">  
                         <label for="name_provinces_sender" class="form-label"> <i class="fa-brands fa-figma"></i>Provinsi Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_provinces_sender" id="name_provinces_sender" name="name_provinces_sender"  placeholder="Ketik Provinsi Pengirim"  readonly value="{{  $merchant->name_provinces_sender }}" >
                                @error('name_provinces_sender') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden"  class="form-control form-control-sm"   id="id_provinces_sender" name="id_provinces_sender" readonly  value="{{  $merchant->id_provinces_sender }}" >
                            </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_regencies_sender" class="form-label">Kab/Kota Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text"  autocomplete="off" class="form-control form-control-sm name_regencies_sender"  id="name_regencies_sender" name="name_regencies_sender"   readonly  value="{{  $merchant->name_regencies_sender }}">
                                @error('name_regencies_sender') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm" value="{{  $merchant->id_regencies_sender }}" id="id_regencies_sender" name="id_regencies_sender" readonly >
                            </div>
                    </div>
                </div>      
                <div class="col-lg-6">
                    <div class="form-group">
                       <label for="name_distrits_sender" class="form-label">Kecamatan Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm " id="name_distrits_sender"  value="{{  $merchant->name_distrits_sender }}"  name="name_distrits_sender" readonly>
                                @error('name_distrits_sender') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm"  value="{{  $merchant->id_distrits_sender }}"   id="id_distrits_sender" name="id_distrits_sender" readonly >
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_villages_sender" class="form-label">Kelurahan Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_villages_sender" id="name_villages_sender" name="name_villages_sender"   readonly  value="{{  $merchant->name_villages_sender }}">
                                @error('name_villages_sender') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm"   value="{{  $merchant->id_villages_sender }}" id="id_villages_sender" name="id_villages_sender" placeholder="Keluarahan Awal">
                            </div>
                    </div>
                </div>     

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="address_sender" class="form-label">Alamat Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label> 
                            <div class="form-control-wrap">
                                <textarea class="form-control" placeholder="Ketik Alamat Pengirim" id="address_sender" name="address_sender" id="address_sender" readonly style="height: 100px">{{  $merchant->address_sender }}</textarea>
                                @error('address_sender') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sender" class="form-label">Nama Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-sm" id="sender"  value="{{  $merchant->sender }}"  name="sender" readonly>
                                @error('sender') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>     
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="senderphonenumber" class="form-label">No. Hp Pengirim <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-sm"   value="{{  $merchant->senderphonenumber }}" id="senderphonenumber" name="senderphonenumber" readonly>
                                @error('senderphonenumber')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div> 
                 <hr>
                <figure  style="margin-bottom: -10px">
                <blockquote class="blockquote">
                    <p>Input Data Pengirim</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Silahkan Masukan Data Pengirim
                </figcaption>
                </figure>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_provinces_receiver" class="form-label">Provinsi Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_provinces_receiver" id="name_provinces_receiver" name="name_provinces_receiver" placeholder="Ketik Provinsi Penerima" value="{{  $merchant->name_provinces_receiver }}" readonly>
                                @error('name_provinces_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm" id="id_provinces_receiver" name="id_provinces_receiver" value="{{  $merchant->id_provinces_receiver }}" readonly >
                            </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_regencies_receiver" class="form-label">Kab/Kota Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_regencies_receiver" id="name_regencies_receiver" name="name_regencies_receiver" placeholder="Ketik Kabupaten Penerima"   value="{{  $merchant->name_regencies_receiver }}" readonly >
                                @error('name_regencies_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm" id="id_regencies_receiver" name="id_regencies_receiver"  value="{{  $merchant->id_regencies_receiver }}" readonly >
                            </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_distrits_receiver" class="form-label">Kecamatan Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_distrits_receiver" id="name_distrits_receiver" name="name_distrits_receiver" placeholder="ketik Kecamatan Penerima"  value="{{  $merchant->name_distrits_receiver }}" readonly >
                                @error('name_distrits_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm" id="id_distrits_receiver" name="id_distrits_receiver"  value="{{  $merchant->id_distrits_receiver }}" readonly  >
                            </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_villages_receiver" class="form-label">Kelurahan Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" autocomplete="off" class="form-control form-control-sm name_villages_receiver" id="name_villages_receiver" name="name_villages_receiver" placeholder="Ketik kelurahan Penerima"   value="{{  $merchant->name_villages_receiver }}" readonly  >
                                @error('name_villages_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                                <input type="hidden" class="form-control form-control-sm" id="id_villages_receiver" name="id_villages_receiver" placeholder="Ketik kelurahan Penerima"  value="{{  $merchant->id_villages_receiver }}" readonly  >
                            </div>
                    </div>
                </div> 
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="address_receiver" class="form-label">Alamat Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <textarea class="form-control" readonly placeholder="Ketik Alamat Penerima" id="address_receiver" name="address_receiver" style="height: 100px">{{  $merchant->address_receiver }}</textarea>
                                @error('address_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sender_receiver" class="form-label">Nama Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-sm" id="sender_receiver" placeholder="Ketik Nama Penerima"  value="{{  $merchant->sender_receiver }}" readonly  >
                                @error('sender_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="senderphonenumber_receiver" class="form-label">No. Hp Penerima <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                               <input type="text" class="form-control form-control-sm" id="senderphonenumber_receiver" placeholder="Ketik No. Hp Penerima"  value="{{  $merchant->senderphonenumber_receiver }}" readonly >
                                @error('senderphonenumber_receiver')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div>  
                <hr>
                 <figure  style="margin-bottom: -10px">
                <blockquote class="blockquote">
                    <p>Input Data Transaksi</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Silahkan Masukan Data Transaksi
                </figcaption>
                </figure> 
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="id_transaction_delivery" class="form-label">No. Resi <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                               <input type="email" class="form-control form-control-sm" id="id_transaction_delivery" name="id_transaction_delivery"  value="{{  $merchant->id_transaction_delivery }}" readonly  >
                            </div>
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="id_packet" class="form-label">Jenis Paket <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap"> 
                                <input type="text" class="form-control form-control-sm" id="id_packet" name="id_packet"    readonly  >
                            </div>
                    </div>
                </div>  

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name_shippingype" class="form-label">Jenis Pengiriman <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap"> 
                                <input type="text" class="form-control form-control-sm" id="id_shippingtype" name="id_shippingtype"    readonly  >
                            </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="weight" class="form-label">Berat (Kg)<span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-sm" id="weight" name="weight" placeholder="Masukan Berat Barang" value="{{  $merchant->weight }}" readonly  onkeyup="calculatePrice()">
                                @error('weight')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="size" class="form-label">Ukuran (Kg)<span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                               <input type="text" class="form-control form-control-sm" id="size" name="size" placeholder="Masukan Ukurang Barang"  value="{{  $merchant->size }}" readonly >
                                @error('size')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="price_asuransi" class="form-label">Asuransi (Kg) <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                               <input type="text" class="form-control form-control-sm"   id="price_asuransi" name="price_asuransi"  value="{{  $merchant->price_asuransi }}" readonly >
                                @error('price_asuransi')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="price" class="form-label">Harga (Kg) <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-sm"   id="price" name="price" value="{{  $merchant->price }}" readonly >
                                @error('price')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div>  

                 <div class="col-lg-3">
                    <div class="form-group">
                        <label for="price_total" class="form-label">Total Harga <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" readonly class="form-control form-control-sm" id="price_total" name="price_total"  value="{{  $merchant->price_total }}" readonly>
                                @error('price_total')  
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                    </div>
                </div>  
                 <div class="col-lg-3">
                    <div class="form-group">
                        <label for="transaction_status" class="form-label">Status Pengiriman <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" readonly class="form-control form-control-sm" id="transaction_status"  >
                            </div>
                    </div>
                </div>  
                 <div class="col-lg-3">
                    <div class="form-group">
                        <label for="date_update" class="form-label">Date Update <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" readonly class="form-control form-control-sm" id="date_update" name="date_update" >
                            </div>
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Description" class="form-label">Deskripsi Barang <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label> 
                            <div class="form-control-wrap">
                                <textarea class="form-control" readonly placeholder="Ketik Deskripsi Barang" id="Description" name="Description" id="Description" style="height: 100px">{{  $merchant->Description }}</textarea>
                                @error('Description') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>  
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Instruction" class="form-label">Instruksi Khusus <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label> 
                            <div class="form-control-wrap">
                                <textarea class="form-control" readonly placeholder="Ketik Instruksi Khusus" id="Instruction" name="Instruction" id="Instruction" style="height: 100px">{{  $merchant->Instruction }}</textarea>
                                @error('Instruction') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>  <hr>
                <figure  style="margin-bottom: -10px">
                <blockquote class="blockquote">
                    <p>Upload Bukti Penerimaan</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    Silahkan Upload Bukti Foto dan Masukan Keterangan ( Contoh : Diterima Oleh Abdul ).
                </figcaption>
                </figure> 
                <div class="col-lg-6">
                    <div class="form-group">
                         <label for="name_provinces_start" class="form-label"> Status Update <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label>
                            <div class="form-control-wrap">
                                <select required class="form-select col-sm-9   @error('id_packet_arrive') is-invalid @enderror" name="id_packet_arrive" id="id_packet_arrive"  >
                                    <option value="">-- PILIH --</option>
                                    <option value="ARRIVE AT DESTINATION">ARRIVE AT DESTINATION</option>
                                    <option value="HOLD">HOLD</option>
                                </select>
                                 @error('id_packet_arrive') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Instruction" class="form-label">Upload Foto <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label> 
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" id="file" name="file" required class="form-file-input  @error('file') is-invalid @enderror"  >
                                    <label class="form-file-label" for="customFile">Choose file</label>
                                </div>
                                 @error('file') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>    
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Instruction" class="form-label">Keterangan <span aria-hidden="true" role="presentation" class="field_required" style="color:#ee0000;">*</span></label> 
                            <div class="form-control-wrap">
                                <textarea required class="form-control  @error('KeteranganSampai') is-invalid @enderror"  placeholder="Ketik Keterangan ( Contoh : Diterima Oleh Abdul )" 
                                id="KeteranganSampai" name="KeteranganSampai"  style="height: 100px"></textarea>
                                @error('KeteranganSampai') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                </div>  
            </div>
             <div class="btn-group"> 
                 <button type="submit" class="btn btn-danger mt-3"><i class="icon bi bi-file-earmark-plus"></i><span>FINISH</span></button>
                <button type="button" onclick="backurl()" class="btn btn-light mt-3"><i class="icon bi bi-arrow-down-right-square"></i><span>Back</span></button>
             </div>
        </form> 
    </div>                                   
  </div>
</div><!-- .col --> 
<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="modalDefault">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Tracking History Packet </h5>
            </div>
            <div class="modal-body">   
                 <div id="references"></div>
                                         
            </div>
            <div class="modal-footer bg-light">
                {{-- <span class="sub-text">Check Status</span> --}}
            </div>
        </div>
    </div>
</div>
<script >  
var base_url = window.location.origin; 
loadall();
async function loadall() {
        try{
            const dtgetPaket = await getPaket(); 
            updateUIdtgetPaket(dtgetPaket); 
            const dtgetDeliveryPacketByIDJson= await getDeliveryPacketByIDJson();
             updateUIdtgetDeliveryPacketByIDJson(dtgetDeliveryPacketByIDJson); 
            // console.log(dtgetDeliveryPacketByIDJson.data[0][0].id_packet);

        } catch (err) {
           // toast(err, "error")
           console.log(err);
        }
}
function updateUIdtgetDeliveryPacketByIDJson(params) {
        $('#id_packet').val(params.data[0][0].packet_name).trigger('change'); 
        $('#id_shippingtype').val(params.data[0][0].shipping_type_name).trigger('change'); 
        $('#transaction_status').val(params.data[0][0].transaction_status).trigger('change'); 
        $('#date_update').val(params.data[0][0].updated_at).trigger('change'); 
        $('#price').val(number_to_price(params.data[0][0].price) ); 
        $('#price_asuransi').val(number_to_price(params.data[0][0].price_asuransi) ); 
        $('#price_total').val(number_to_price(params.data[0][0].price_total) ); 
}
 function updateUIdtgetPaket(updateUIdtgetPaket) { 
        let responseApi = updateUIdtgetPaket.data[0];
         $("#id_packet").empty();
        if (responseApi !== null && responseApi !== undefined) { 
            var newRow = '<option value="">-- PILIH --</option';
            $("#id_packet").append(newRow);
            for (i = 0; i < responseApi.length; i++) { 
                var newRow = '<option value="' + responseApi[i].id + '">' + responseApi[i].packet_name + '</option';
                $("#id_packet").append(newRow);
            }
        }
    }
    function getPaket() {
        let url = base_url + '/getDataPacketJSon';
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
    function getDeliveryPacketByIDJson() {
        let url = base_url + '/getDeliveryPacketByIDJson';
         var form_data = new FormData();  
            form_data.append("id", $("#id").val());
            var id = $("#id").val();
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
    // create
//  $( "#form-delivery-transaction" ).submit(function( e ) {
//         e.preventDefault();
//          swal({
//             title: "Delete",
//             text: "Are Your Sure want to Delete this Transaction  ?",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//         })
//             .then((willDelete) => {
//                 if (willDelete) {
//                     var form_data = new FormData();  
//                     form_data.append("id_transaction_delivery", $("#id_transaction_delivery").val());  
//                     form_data.append("id_packet_arrive", $("#id_packet_arrive").val());  
//                     form_data.append("file", $("#file").val());  
//                     form_data.append("KeteranganSampai", $("#KeteranganSampai").val());  
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                     }
//                 });
//                 $.ajax({
//                     type: "POST",
//                     url: "/dashboard/delivery/kurir/arrived",
//                     data: form_data, //pass to our Ajax data to send 
//                     success: function (response) {
//                         swalSuccess(response.message); 
//                     },
//                     error: function(response) { 
//                         swalError(response.responseJSON.message);
//                     },
//                     contentType: false,
//                     processData: false,
//                 });
//                 } else {
//                    // swal("Transaction Rollback !");
//                 }
//             });
           
//     });
    function backurl() {
        window.location.href = '/driver';
    }
function swalError(data) {
        swal({
            title: "Error",
            text: data,
            icon: "error",  
        });
}
function swalSuccess(data) {
        swal({
            title: "Success",
            text: data,
            icon: "success",  
        }).then((willDelete) => {
                if (willDelete) {
                     window.location.href = '/dashboard/delivery';
                }  
            });
}
function number_to_price(v) {
    if (v == 0) { return '0,00'; }
    v = parseFloat(v);
    v = v.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    v = v.split('.').join('*').split(',').join('.').split('*').join(',');
    return v;
}
function price_to_number(v) {
    if (!v) { return 0; }
    v = v.split('.').join('');
    v = v.split(',').join('.');
    return Number(v.replace(/[^0-9.]/g, ""));
}
function convertNumberToRp() {
    var v_weight = document.getElementById("weight");
    v_weight.addEventListener("keyup", function (e) {
        v_weight.value = formatRupiah(this.value);
    }); 
    var v_size = document.getElementById("size");
    v_size.addEventListener("keyup", function (e) {
        v_size.value = formatRupiah(this.value);
    }); 
}
document.getElementById("cekhistory").addEventListener("click", myFunction);

async function myFunction() {
      try{
            const dtgetPacketStatus = await getPacketStatus(); 
             
            updateUidtgetPacketStatus(dtgetPacketStatus);

        } catch (err) {
           // toast(err, "error")
           console.log(err);
        }
}

function updateUidtgetPacketStatus(params) {
    var monthNames = [
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
];
    $("#references").empty();
    console.log(params.data[0].length);
    if (params.data[0] !== null && params.data[0] !== undefined) {
        console.log(params.data[0]);
        var newRow = '<option value="">-- PILIH --</option';
        $("#dokter").append(newRow);
        for (i = 0; i < params.data[0].length; i++) { 

            var timeall = params.data[0][i].jam;

            if(params.data[0][i].status == "SHIPMENT DATA ENTRY"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status bg-primary "></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html);
            } else if(params.data[0][i].status == "TRANSIT PERWAKILAN"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status  bg-warning "></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html); 
            } 
            else if(params.data[0][i].status == "TRANSIT PUSAT"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status  bg-pink "></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html); 
            }
            else if(params.data[0][i].status == "DELIVERY"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status  bg-azure"></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html); 
            } 
            else if(params.data[0][i].status == "ARRIVE AT DESTINATION"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status  bg-success"></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html); 
            } 
            else if(params.data[0][i].status == "HOLD"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status  bg-indigo"></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html); 
            } 
            else if(params.data[0][i].status == "TRANSACTION CANCELLED"){
                var html =  '<div class="card-inner"><div class="timeline"><ul class="timeline-list">';
                    html += '<li class="timeline-item"><div class="timeline-status  bg-danger"></div>';
                    html += '<div class="timeline-date">'+ new Date(params.data[0][i].updated_at).getDate() +' '+ monthNames[new Date(params.data[0][i].updated_at).getMonth()] +' <em class="icon ni ni-alarm-alt"></em></div> <div class="timeline-data">';
                    html += '<h6 class="timeline-title">'+ params.data[0][i].status +'</h6><div class="timeline-des">';
                    html += '<p>'+ params.data[0][i].note +'</p>';
                    html += ' <span class="time">'+ timeall +'</span>';
                    html += '  </div> </div> </li>';
                    html += '</ul></div></div> ';
                html = $.parseHTML( html);
                $("#references").append(html); 
            } 
        }
    }
    
}
function getPacketStatus() {
        let url = base_url + '/showstatuspacketJson';
         var form_data = new FormData();  
            var id_transaction_delivery = $("#id_transaction_delivery").val();
        return fetch(url, {
            method: 'POST',
            headers: {   "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
            body : "id_transaction_delivery=" + id_transaction_delivery
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
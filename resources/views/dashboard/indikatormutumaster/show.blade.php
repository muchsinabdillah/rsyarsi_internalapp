@extends('dashboard.layouts.main')

@section('container')
    
<div class="col-lg-12 col-xxl-12">
    <div class="card card-bordered">
      <div class="card-inner">
        <div class="card-title-group align-start mb-2">
          <div class="card-title">
              <h6 class="title">Input Profile Indikator Mutu</h6>
                <p>Silahkan Masukan Data Profile Indikator Mutu.</p> 
          </div>
          <div class="card-tools">
              <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Revenue from subscription"></em>
          </div>
        </div>
          <form  method="POST" action="/dashboard/indikatormutu/prosesUpdate"  > 
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
                           <label for="ID" class="form-label">ID</label> 
                              <div class="form-control-wrap">
                                  <input type="text" class="form-control @error('ID') is-invalid @enderror " id="ID"
                                  name="ID" autocomplete="off" readonly value="{{   $merchant->ID  }}"> 
                                  @error('ID') 
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="JudulIndikator" class="form-label">Judul Indikator </label> 
                              <div class="form-control-wrap">
                                  <input type="text" class="form-control @error('JudulIndikator') is-invalid @enderror " id="JudulIndikator"
                                  name="JudulIndikator" autocomplete="off"   autofocus  value="{{  $merchant->JudulIndikator  }}"> 
                                  @error('JudulIndikator') 
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>
                      </div>
                  </div>     
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="GroupIndikator" class="form-label">Group Indikator</label> 
                              <div class="form-control-wrap">
                                  <select class="form-select" name="GroupIndikator" id="GroupIndikator"  > 
                                      <option value="{{  $merchant->GroupIndikator  }}" >{{  $merchant->GroupIndikator  }}</option>   
                                      <option value="Indikator Nasional Mutu" >Indikator Nasional Mutu</option>   
                                      <option value="Indikator Mutu Prioritas RS" >Indikator Mutu Prioritas RS</option>   
                                      <option value="Indikator Mutu Prioritas Unit" >Indikator Mutu Prioritas Unit</option>   
                                  </select> 
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="Department" class="form-label">Unit</label>  
                              <div class="form-control-wrap">
                                  <select class="form-select" name="Department" id="Department"> 
                                      <option value="" >-- PILIH --</option>   
                                      <option value="1" >IT</option>   
                                      <option value="2" >Medrec</option>    
                                  </select> 
                                  @error('Department') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                                  @enderror 
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="DasarPemikiran" class="form-label">Dasar Pemikiran</label>
                              <div class="form-control-wrap"> 
                                      <input id="DasarPemikiran" maxlength="140" class="form-control @error('DasarPemikiran') is-invalid @enderror " type="text" name="DasarPemikiran" value="{{  $merchant->DasarPemikiran  }}">
                                      @error('DasarPemikiran') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>   
                  <div class="col-lg-2">
                      <div class="form-group">
                          <label for="DimensiMutu" class="form-label">Efisiensi</label>
                              <div class="form-control-wrap">
                                      @error('DimensiMutu') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                      @enderror 
                                     
                                      <div class="form-check">
                                          <input type="checkbox" name="DimensiMutu[]"  value="1" {{  ($merchant->DimensiMutu == 1 ? ' checked' : '') }} >
                                          <label class="form-check-label" for="DimensiMutu">
                                            YA
                                          </label>
                                      </div> 
                              </div>
                      </div>
                  </div>     
                  <div class="col-lg-2">
                      <div class="form-group">
                          <label for="DimensiMutu2" class="form-label">Efektifitas</label>
                              <div class="form-control-wrap">
                                      @error('DimensiMutu2') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                      @enderror  
                                      <div class="form-check"> 
                                          <input type="checkbox" name="DimensiMutu2[]" value="1" {{  ($merchant->DimensiMutu2 == 1 ? ' checked' : '') }} >
                                          <label class="form-check-label" for="DimensiMutu2">
                                              YA
                                          </label>
                                      </div>
                              </div>
                      </div>
                  </div>     
                  <div class="col-lg-2">
                      <div class="form-group">
                          <label for="DimensiMutu3" class="form-label">Aksesbilitas</label>
                              <div class="form-control-wrap">
                                      @error('DimensiMutu3') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                      @enderror  
                                      <div class="form-check">
                                          <input type="checkbox" name="DimensiMutu3[]" value="1" {{  ($merchant->DimensiMutu3 == 1 ? ' checked' : '') }} >
                                          <label class="form-check-label" for="DimensiMutu3">
                                              YA
                                          </label>
                                      </div>
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="form-group">
                          <label for="DimensiMutu4" class="form-label">Keselamatan</label>
                              <div class="form-control-wrap">
                                      @error('DimensiMutu4') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                      @enderror  
                                      <div class="form-check">
                                          <input type="checkbox" name="DimensiMutu4[]" value="1" {{  ($merchant->DimensiMutu4 == 1 ? ' checked' : '') }} >
                                          <label class="form-check-label" for="DimensiMutu4">
                                              YA
                                          </label>
                                      </div>
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="form-group">
                          <label for="DimensiMutu5" class="form-label">Fokus kepada pasien</label>
                              <div class="form-control-wrap">
                                      @error('DimensiMutu5') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                      @enderror  
                                      <div class="form-check">
                                          <input type="checkbox" name="DimensiMutu5[]" value="1" {{  ($merchant->DimensiMutu5 == 1 ? ' checked' : '') }} >
                                          <label class="form-check-label" for="DimensiMutu5">
                                              YA
                                          </label>
                                      </div>
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="form-group">
                          <label for="DimensiMutu6" class="form-label">Kesinambungan</label>
                              <div class="form-control-wrap">
                                      @error('DimensiMutu6') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                      @enderror  
                                      <div class="form-check">
                                          <input type="checkbox" name="DimensiMutu6[]" value="1" {{  ($merchant->DimensiMutu6 == 1 ? ' checked' : '') }} >
                                          <label class="form-check-label" for="DimensiMutu6">
                                              YA
                                          </label>
                                      </div>
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="Tujuan" class="form-label">Tujuan</label>
                              <div class="form-control-wrap"> 
                                  <input id="Tujuan" maxlength="145" class="form-control @error('Tujuan') is-invalid @enderror " type="text" name="Tujuan" value=" {{  $merchant->Tujuan  }}">
                                  @error('Tujuan') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                              @enderror
                              </div>
                      </div>
                  </div>   
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="DefinisiOperasional" class="form-label">Definisi Operasional </label>
                              <div class="form-control-wrap"> 
                                  <textarea name="DefinisiOperasional" class="form-control" id="DefinisiOperasional"  >
                                    {{  $merchant->DefinisiOperasional  }}
                                   </textarea>
                                   @error('DefinisiOperasional') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>        
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="JenisIndikator" class="form-label">Jenis Indikator</label> 
                              <div class="form-control-wrap">
                                  <select class="form-select" name="JenisIndikator" id="JenisIndikator"> 
                                      <option value=" {{  $merchant->JenisIndikator  }}" > {{  $merchant->JenisIndikator  }}</option>   
                                      <option value="Proses" >Proses</option>   
                                      <option value="Outcome" >Outcome</option>      
                                  </select> 
                                  @error('JenisIndikator') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                                  @enderror
                              </div>
                             
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="SatuanPengukuran" class="form-label">Satuan Pengukuran</label> 
                              <div class="form-control-wrap">
                                  <select class="form-select" name="SatuanPengukuran" id="SatuanPengukuran"> 
                                      <option value=" {{  $merchant->SatuanPengukuran  }}" > {{  $merchant->SatuanPengukuran  }}</option>   
                                      <option value="Persentase" >Persentase</option>   
                                      <option value="Indeks" >Indeks</option>      
                                  </select> 
                                  @error('SatuanPengukuran') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                                  @enderror
                              </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="Numerator" class="form-label">Numerator (pembilang)</label>
                              <div class="form-control-wrap">
                                  <input id="Numerator" maxlength="145" class="form-control @error('Numerator') is-invalid @enderror " type="text" name="Numerator" value="{{  $merchant->Numerator  }}">
                                  @error('Numerator') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>    
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="Denominator" class="form-label">Denominator
                              (penyebut)</label>
                              <div class="form-control-wrap">
                                  <input id="Denominator" maxlength="145" class="form-control @error('Denominator') is-invalid @enderror " type="text" name="Denominator" value="{{  $merchant->Denominator  }}">
                                  @error('Denominator') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>   
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label for="TargetPencapaian" class="form-label">Target Pencapaian</label>
                              <div class="form-control-wrap">
                                  
                                  <input id="TargetPencapaian" maxlength="145" class="form-control @error('TargetPencapaian') is-invalid @enderror " type="text" name="TargetPencapaian" value="{{  $merchant->TargetPencapaian  }}">
                                  @error('TargetPencapaian') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>  
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="Kriteria" class="form-label">Kriteria </label>
                              <div class="form-control-wrap">
                                  <textarea name="Kriteria" class="form-control" id="Kriteria"  >
                                    {{  $merchant->Kriteria  }}
                                   </textarea>
                                   @error('Kriteria') 
                                   <p class="text-danger">
                                       {{ $message }}
                                   </p>
                               @enderror
                              </div>
                      </div>
                  </div> 
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="MetodePengumpulanData" class="form-label">Metode Pengumpulan Data</label>
                              <div class="form-control-wrap"> 
                                  <input id="MetodePengumpulanData" maxlength="145" class="form-control @error('MetodePengumpulanData') is-invalid @enderror " type="text" name="MetodePengumpulanData" value="{{  $merchant->MetodePengumpulanData  }}">
                                  @error('MetodePengumpulanData') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>    
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="SumberData" class="form-label">Sumber Data</label>
                              <div class="form-control-wrap">
                                  
                                  <input id="SumberData" maxlength="145" class="form-control @error('SumberData') is-invalid @enderror " type="text" name="SumberData" value="{{  $merchant->SumberData  }}">
                                  @error('SumberData') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                              @enderror
                              </div>
                      </div>
                  </div>    
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="InstrumenPengambilanData" class="form-label">Instrumen Pengambilan Data</label>
                              <div class="form-control-wrap">
                                   
                                  <input id="InstrumenPengambilanData" maxlength="145" class="form-control @error('InstrumenPengambilanData') is-invalid @enderror " type="text" name="InstrumenPengambilanData" value="{{  $merchant->InstrumenPengambilanData  }}">
                                  @error('InstrumenPengambilanData') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                              @enderror
                              </div>
                      </div>
                  </div> 
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="BesarSample" class="form-label">Besar Sampel </label>
                              <div class="form-control-wrap">
                                   
                                  <textarea name="BesarSample" class="form-control" id="BesarSample"  >
                                    {{  $merchant->BesarSample  }}
                                   </textarea>
                                   @error('BesarSample') 
                                      <p class="text-danger">
                                          {{ $message }}
                                      </p>
                                  @enderror
                              </div>
                      </div>
                  </div>  
                  <div class="col-lg-12">
                    <div class="form-group">
                        <label for="CaraPengambilanSample" class="form-label">Cara Pengambilan Sampel  </label>
                    </div>
                </div>    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="CaraAmbilSample" class="form-label">Probability Sampling</label>
                            <div class="form-control-wrap">
                                    @error('CaraAmbilSample') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror 
                                    <div class="form-check">
                                        <input type="checkbox" name="CaraAmbilSample[]" value="1" {{  ($merchant->CaraAmbilSample == 1 ? ' checked' : '') }} >
                                        <label class="form-check-label" for="CaraAmbilSample">
                                          YA
                                        </label>
                                    </div> 
                            </div>
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="CaraAmbilSample2" class="form-label">Simple Random Sampling</label>
                            <div class="form-control-wrap">
                                    @error('CaraAmbilSample2') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror  
                                    <div class="form-check"> 
                                        <input type="checkbox" name="CaraAmbilSample2[]" value="1" {{  ($merchant->CaraAmbilSample2 == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="CaraAmbilSample2">
                                            YA
                                        </label>
                                    </div>
                            </div>
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="CaraAmbilSample3" class="form-label">Stratified Random Sampling</label>
                            <div class="form-control-wrap">
                                    @error('CaraAmbilSample3') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror  
                                    <div class="form-check">
                                        <input type="checkbox" name="CaraAmbilSample3[]"  value="1" {{  ($merchant->CaraAmbilSample3 == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="CaraAmbilSample3">
                                            YA
                                        </label>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="CaraAmbilSample4" class="form-label">Consecutive Sampling</label>
                            <div class="form-control-wrap">
                                    @error('CaraAmbilSample4') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror  
                                    <div class="form-check">
                                        <input type="checkbox" name="CaraAmbilSample4[]"  value="1" {{  ($merchant->CaraAmbilSample4 == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="CaraAmbilSample4">
                                            YA
                                        </label>
                                    </div>
                            </div>
                    </div>
                </div>
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="WaktuPengumpulanData" class="form-label">Periode Pengumpulan Data</label>
                              <div class="form-control-wrap">
                                  
                                  <select class="form-select" name="WaktuPengumpulanData" id="WaktuPengumpulanData"> 
                                      <option value=" {{  $merchant->WaktuPengumpulanData  }}"> {{  $merchant->WaktuPengumpulanData  }}</option>   
                                      <option value="Bulanan" >Bulanan</option>   
                                      <option value="Triwulan" >Triwulan</option>      
                                      <option value="Semesteran" >Semesteran</option>      
                                      <option value="Tahunan" >Tahunan</option>      
                                  </select> 
                                  @error('WaktuPengumpulanData') 
                                  <p class="text-danger">
                                      {{ $message }}
                                  </p>
                              @enderror
                                   
                              </div>
                      </div>
                  </div>   
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="PenyajianData" class="form-label">Penyajian Data</label>
                      </div>
                  </div>  
                  <div class="col-lg-3">
                    <div class="form-group">
                        <label for="PenyajianData2" class="form-label">Run Chart</label>
                            <div class="form-control-wrap">
                                    @error('PenyajianData2') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror  
                                    <div class="form-check"> 
                                        <input type="checkbox" name="PenyajianData2[]"  value="1" {{  ($merchant->PenyajianData2 == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="PenyajianData2">
                                            YA
                                        </label>
                                    </div>
                            </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="PenyajianData3" class="form-label">Table</label>
                            <div class="form-control-wrap">
                                    @error('PenyajianData3') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror 
                                    <div class="form-check">
                                        <input type="checkbox" name="PenyajianData3[]"  value="1" {{  ($merchant->PenyajianData3 == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="PenyajianData3">
                                          YA
                                        </label>
                                    </div> 
                            </div>
                    </div>
                </div>  
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="PeriodeAnalisa" class="form-label">Periode Analisis dan Pelaporan
                              Data</label> 
                      </div>
                  </div> 
                  <div class="col-lg-3">
                    <div class="form-group">
                        <label for="PeriodePengumpulanData" class="form-label">Triwulan</label>
                            <div class="form-control-wrap">
                                    @error('PeriodePengumpulanData') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror  
                                    <div class="form-check"> 
                                        <input type="checkbox" name="PeriodePengumpulanData[]"  value="1" {{  ($merchant->PeriodePengumpulanData == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="PeriodePengumpulanData">
                                            YA
                                        </label>
                                    </div>
                            </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="PeriodePengumpulanData2" class="form-label">Tahunan</label>
                            <div class="form-control-wrap">
                                    @error('PeriodePengumpulanData2') 
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror 
                                    <div class="form-check">
                                        <input type="checkbox" name="PeriodePengumpulanData2[]"  value="1" {{  ($merchant->PeriodePengumpulanData2 == 1 ? ' checked' : '') }}  >
                                        <label class="form-check-label" for="PeriodePengumpulanData2">
                                          YA
                                        </label>
                                    </div> 
                            </div>
                    </div>
                </div>   
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label for="PenaggungJawab" class="form-label">Penanggung Jawab</label>
                              <div class="form-control-wrap">
                                  
                                  <input id="PenaggungJawab" maxlength="145" class="form-control @error('PenaggungJawab') is-invalid @enderror " type="text" name="PenaggungJawab" value=" {{  $merchant->PenaggungJawab  }}">
                                  @error('PenaggungJawab') 
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
    CKEDITOR.replace('DefinisiOperasional'); 
    CKEDITOR.replace('Kriteria');
    CKEDITOR.replace('BesarSample');
    CKEDITOR.replace('PenyajianData');

    
    </script>
<script > 
    
    function backurl() {
        window.location.href = '/dashboard/indikatormutu';
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
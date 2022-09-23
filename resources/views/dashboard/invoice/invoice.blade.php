 
  <table class="tabler h_tengah" width="100%" cellspacing="2" cellpadding="2" border="1" style="padding: 2px" >
                  
                  <tbody> 
                    <tr> 
					    <td width="20%" rowspan="2"><img src="img/joki.png"  width="90" height="45"></td>
					    <td align="center" width="60%"><b>NO. RESI PENGIRIMAN</b></td>
					    <td align="center" width="30%" rowspan="2"><b><font size="30">B1</font> <br>Reguler</b></td>
					  </tr>
			        <tr>
				    <td align="center" width="60%">
                        <svg class="barcode"
                        jsbarcode-format="upc"
                        jsbarcode-value="123456789012"
                        jsbarcode-textmargin="0"
                        jsbarcode-fontoptions="bold">
                        </svg>    
                    </td> 
			        </tr> 
         <table  width="100%" cellspacing="0" cellpadding="10" border="1">
                  
                  <tbody> 
            <tr>
				<td width="50%">Data Pengirim :</td>
				<td width="50%">Data Penerima :</td> 
			</tr> 
			<tr>
				<td width="50%"> M Muchsin Abdillah <br> Jl. H. Bambang RT 01 Rw 04 No. 2 Kelurahan Wanasari Kecamatan Cibitung BEkasi Jawab Barat </td>
				<td width="50%"> Udin <br> Jl. H. Toing RT 04 Rw 03 No. 5 Kelurahan Kebon Pala Kecamatan Makasar Jakarta Timur DKI Jakarta </td> 
			</tr>
			<tr>
				<td width="20%" > Deskripsi </td>
				<td width="2%">:</td>
				<td width="78%" class="h_kiri">Barang Pecah belah gelas</td>
			</tr>
		   <tr>
				<td width="20%"> Instruksi Khusus </td>
				<td width="2%">:</td>
				<td width="78%" class="h_kiri">Jangan di Banting</td>
			</tr>
                  </tbody>
                </table> 
                   <script src="{{ URL::asset('js/JsBarcode.all.min.js') }}"></script>
                   <script>
                       JsBarcode(".barcode").init();
                    </script>

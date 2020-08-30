<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-handshake"></i> Halaman Riwayat Transaksi Penjualan</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Riwayat Transaksi Penjualan</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<!-- <button type="button" id="tmb_tes" class="btn btn-sm btn-primary">Tes</button> -->
  			<a href="<?=site_url('sale')?>">
  				<button class="btn btn-sm btn-dark">Transaksi Baru+</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Invoice</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
        	<?php 
            $nomor = 1;
            foreach ($daftar_penjualan->result() as $key => $data) {
          ?>
          		<tr>
          			<td><?=$nomor++?></td>
          			<td><?=$data->sale_tanggal?></td>
          			<td><?=$data->sale_invoice?></td>
          			<td><?=$data->customer_nama == null ? 'Umum' : $data->customer_nama ?></td>
          			<td><?=$data->sale_finaltotal?></td>
          			<td class="td-opsi" align="center">
                  <button type="button" class="btn btn-sm btn-info tmb_detail" title="detail" data-toggle="modal" data-target="#modal_detail"
                    data-sale_id = "<?=$data->sale_id?>"
                    data-sale_invoice = "<?=$data->sale_invoice?>"
                    data-sale_tanggal = "<?=$data->sale_tanggal?>"
                    data-sale_total = "<?=number_format($data->sale_total)?>"
                    data-sale_diskon = "<?=$data->sale_diskon?>"
                    data-sale_finaltotal = "<?=number_format($data->sale_finaltotal)?>"
                    data-user_nama = "<?=$data->user_nama?>"
                    data-customer_nama = "<?=$data->customer_nama == null ? 'Umum' : $data->customer_nama ?>"
                  >
                    <i class="fas fa-eye"></i>
                  </button>
                  <button type="button" class="btn btn-sm btn-danger tmb_hapus" id="<?=$data->sale_id?>" data-sale_invoice="<?=$data->sale_invoice?>" title="hapus data">
                      <i class="fas fa-trash"></i>
                  </button>
                </td>
          		</tr>
        	<?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="modal_detail_pjl_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_detail_pjl_Label">Detail Transaksi</h5>
        <button type="button" class="close" id="modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="font-size: 12px;">
        <table class="mb-2">
          <tr>
            <td class="pr-2 pb-1">Invoice</td>
            <td class="pb-1">: <span id="detail_invoice">PJL20200711001</span></td>
          </tr>
          <tr>
            <td class="pr-2 pb-1">Waktu</td>
            <td class="pb-1">: <span id="detail_tanggal">15 July 2020 [19:58:43]</span></td>
          </tr>
          <tr>
            <td class="pr-2 pb-1">Customer</td>
            <td class="pb-1">: <span id="detail_customer">Amal Setiawan</span></td>
          </tr>
          <tr>
            <td class="pr-2 pb-1">Pegawai</td>
            <td class="pb-1">: <span id="detail_user">Faizal Nur Abidin</span></td>
          </tr>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Barang</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody id="isi_detail_pjl">
            <tr>
              <td>Nuvo Hand Sanitizer 50ml</td>
              <td>Rp11,500</td>
              <td>1</td>
              <td>Rp11,500</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3" align="right">Subtotal</td>
              <td>Rp<span id="detail_total">11,500</span></td>
            </tr>
            <tr>
              <td colspan="3" align="right">Diskon</td>
              <td><span id="detail_diskon">0</span> %</td>
            </tr>
            <tr style="font-weight: bold;">
              <td colspan="3" align="right">Total Akhir</td>
              <td>Rp<span id="detail_finaltotal">11,500</span></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(".tmb_detail").click(function() {
		var sale_invoice = $(this).data('sale_invoice');
		var sale_tanggal = $(this).data('sale_tanggal');
		var customer_nama = $(this).data('customer_nama');
		var user_nama = $(this).data('user_nama');
		var sale_total = $(this).data('sale_total');
		var sale_diskon = $(this).data('sale_diskon');
		var sale_finaltotal = $(this).data('sale_finaltotal');

		$("#detail_invoice").text(sale_invoice);
		$("#detail_tanggal").text(sale_tanggal);
		$("#detail_customer").text(customer_nama);
		$("#detail_user").text(user_nama);
		$("#detail_total").text(sale_total);
		$("#detail_diskon").text(sale_diskon);
		$("#detail_finaltotal").text(sale_finaltotal);

		$.ajax({
      method: "POST",
      url: "detail_transaksi",
      data: "sale_invoice="+sale_invoice,
      success: function(hasil) {
        var objData = JSON.parse(hasil);
        // console.log(objData);
        $("#isi_detail_pjl").html("");
        $.each(objData, function(key,val){
          var baris_baru = '';
          baris_baru += '<tr>';
          baris_baru +=   '<td>'+val.item_nama+'</td>';
          baris_baru +=   '<td>Rp '+val.sale_detail_harga+'</td>';
          baris_baru +=   '<td>'+val.sale_detail_qty+'</td>';
          baris_baru +=   '<td>Rp '+val.sale_detail_total+'</td>';
          baris_baru += '</tr>';

          $("#isi_detail_pjl").append(baris_baru);
        })
      }
    })
	})

	$(".tmb_hapus").click(function() {
		var sale_id = $(this).attr('id');
		var sale_invoice = $(this).data('sale_invoice');
		Swal.fire({
      title: 'Peringatan',
      text: 'Data yang telah dihapus tidak dapat dipulihkan kembali, anda yakin menghapus riwayat transaksi ini?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((ok) => {
      if (ok.value) {
        $.ajax({
          type: "POST",
          url: "delete_transaksi",
          data: "sale_id="+sale_id+"&sale_invoice="+sale_invoice,
          success: function(hasil) {
            Swal.fire({
              title: 'Berhasil',
              text: 'Data Berhasil Dihapus',
              type: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then((ok) => {
              if (ok.value) {
                location.reload();
              }
            })
          }
        })
      }
    })
	})
</script>
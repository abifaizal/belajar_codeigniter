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
                    data-sale_total = "<?=$data->sale_total?>"
                    data-sale_diskon = "<?=$data->sale_diskon?>"
                    data-sale_finaltotal = "<?=$data->sale_finaltotal?>"
                    data-customer_nama = "<?=$data->customer_nama == null ? 'Umum' : $data->customer_nama ?>"
                  >
                    <i class="fas fa-eye"></i>
                  </button>
                  <button type="button" class="btn btn-sm btn-danger tmb-hapus" id="<?=$data->sale_id?>" data-sale_invoice="<?=$data->sale_invoice?>" title="hapus data">
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
            <td class="pb-1">: <span id="detail_nomor_pjl">PJL20200711001</span></td>
          </tr>
          <tr>
            <td class="pr-2 pb-1">Waktu</td>
            <td class="pb-1">: <span id="detail_waktu_pjl">15 July 2020 [19:58:43]</span></td>
          </tr>
          <tr>
            <td class="pr-2 pb-1">Customer</td>
            <td class="pb-1">: <span id="detail_nama_pgw">Amal Setiawan</span></td>
          </tr>
          <tr>
            <td class="pr-2 pb-1">Pegawai</td>
            <td class="pb-1">: <span id="detail_nama_pgw">Faizal Nur Abidin</span></td>
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
              <td>Rp<span id="detail_total_pjl">11,500</span></td>
            </tr>
            <tr>
              <td colspan="3" align="right">Diskon</td>
              <td><span id="detail_total_pjl">0</span> %</td>
            </tr>
            <tr style="font-weight: bold;">
              <td colspan="3" align="right">Total Akhir</td>
              <td>Rp<span id="detail_total_pjl">11,500</span></td>
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
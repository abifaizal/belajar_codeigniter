<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-folder-minus"></i> Halaman Riwayat Stock Out</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Riwayat Stock Out</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('stock/out/add')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data +</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
  	<? $this->view('message') ?>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($stock_out->result() as $key => $data) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td>
                  <?=date_format(date_create($data->stock_tanggal), 'd  M  Y')?>
                </td>
                <td><?=$data->item_nama?></td>
                <td><?=$data->stock_qty?></td>
                <td class="td-opsi" align="center">
                  <form action="<?=site_url('stock/out/del')?>" method="post">
                    <button type="button" class="btn btn-sm btn-info tmb_detail" title="detail" data-toggle="modal" data-target="#modal_detail"
                      data-stock_tanggal = "<?=$data->stock_tanggal?>"
                      data-item_barcode = "<?=$data->item_barcode?>"
                      data-item_nama = "<?=$data->item_nama?>"
                      data-stock_qty = "<?=$data->stock_qty?>"
                      data-unit_nama = "<?=$data->unit_nama?>"
                      data-stock_detail = "<?=$data->stock_detail == null ? '-' : $data->stock_detail?>"
                      data-user_nama = "<?=$data->user_nama?>"
                    >
                      <i class="fas fa-eye"></i>
                    </button>
                    <input type="hidden" name="stock_id" value="<?=$data->stock_id?>">
                    <button type="submit" class="btn btn-sm btn-danger tmb-hapus" title="hapus data" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                        <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_detail" tabindex="-1" aria-labelledby="modal_detailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_detailLabel">Detail Data Stock In</h5>
        <button type="button" class="close" id="modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <style>
          .tbl-detail-stock {
            width: 100%;
            font-size: 14px;
          }
          .tbl-detail-stock th, .tbl-detail-stock td {
            padding: 3px 5px 3px 0;
          }
        </style>
        <table class="tbl-detail-stock">
          <tr>
            <th>Tanggal</th>
            <td id="dt_stock_tanggal">10 Oktober 2020</td>
          </tr>
          <tr>
            <th>Barcode Item</th>
            <td id="dt_item_barcode">2019023348</td>
          </tr>
          <tr>
            <th>Item</th>
            <td id="dt_item_nama">Kopi Hitam Kapal Api</td>
          </tr>
          <tr>
            <th>Jumlah</th>
            <td id="dt_stock_qty_unit">20 Pcs</td>
          </tr>
          <tr>
            <th>Detail</th>
            <td id="dt_stock_detail">Stock Bulanan</td>
          </tr>
          <tr>
            <th>User</th>
            <td id="dt_user_id">Faizal Nur Abidin</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(".tmb_detail").click(function() {
    var stock_tanggal = $(this).data('stock_tanggal');
    var item_barcode = $(this).data('item_barcode');
    var item_nama = $(this).data('item_nama');
    var stock_qty = $(this).data('stock_qty');
    var unit_nama = $(this).data('unit_nama');
    var stock_detail = $(this).data('stock_detail');
    var user_nama = $(this).data('user_nama');
    $("#dt_stock_tanggal").text(stock_tanggal);
    $("#dt_item_barcode").text(item_barcode);
    $("#dt_item_nama").text(item_nama);
    $("#dt_stock_qty_unit").text(stock_qty+" "+unit_nama);
    $("#dt_stock_detail").text(stock_detail);
    $("#dt_user_nama").text(user_nama);
  })
</script>
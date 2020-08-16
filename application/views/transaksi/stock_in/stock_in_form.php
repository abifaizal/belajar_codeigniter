<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-box"></i> Halaman Tambah Data Stock In</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form Tambah Data Stock In</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('stock/in')?>">
  				<button class="btn btn-sm btn-dark">Daftar Stock In</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <? $this->view('message') ?>
    <div class="col-lg-6 offset-lg-3">
      <form action="<?=site_url('stock/proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
      	<div class="form-group">
          <label for="supplier_id">Supplier*</label>
          <select class="form-control form-control-sm" name="supplier_id" id="supplier_id" required>
            <option value="">- pilih -</option>
            <?php foreach ($supplier->result() as $key => $d_supplier) { ?>
              <option value="<?=$d_supplier->supplier_id?>" >
                <?=$d_supplier->supplier_nama?>
              </option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="item_barcode">Barcode Item*</label>
          <div class="input-group input-group-sm">
	        <input type="text" class="form-control" id="item_barcode" name="item_barcode" placeholder="masukkan barcode / klik tombol cari" value="" required>
	        <div class="input-group-append">
	        	<button class="btn btn-dark" type="button" id="tmb_cari_item" data-toggle="modal" data-target="#modal_daftar_item"><i class="fas fa-search"></i></button>
	        </div>
	      </div>
        </div>
        <div class="form-group">
          <label for="item_nama">Nama Item</label>
          <input type="text" class="form-control form-control-sm" id="item_nama" name="item_nama" placeholder="nama item terpilih" value="" readonly>
          <input type="hidden" name="item_id" id="item_id">
        </div>
        <div class="form-group">
          <label for="stock_qty">Qty*</label>
          <div class="input-group input-group-sm">
          	<input type="number" class="form-control" id="stock_qty" name="stock_qty" placeholder="masukkan jumlah item" value="" required>
          	<div class="input-group-append">
	        	<span class="input-group-text" id="unit_nama">Unit</span>
	        </div>
          </div>
        </div>
        <div class="form-group">
          <label for="stock_detail">Detail</label> <small>(biarkan kosong jika tidak diperlukan)</small>
          <textarea class="form-control form-control-sm" id="stock_detail" name="stock_detail" placeholder="masukkan detail/keterangan stock in"></textarea>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-primary" id="submit_stock_in" name="submit_stock_in" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Cari Item -->
<div class="modal fade" id="modal_daftar_item" tabindex="-1" aria-labelledby="modal_daftar_itemLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_daftar_itemLabel">Daftar Item</h5>
        <button type="button" class="close" id="modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		        <thead>
		          <tr>
		            <th>#</th>
		            <th>Barcode</th>
		            <th>Nama item</th>
		            <th>Kategori</th>
		            <th>Unit</th>
		            <th>Stok</th>
		            <th>Opsi</th>
		          </tr>
		        </thead>
		        <tbody>
							<?php 
		            $nomor = 1;
		            foreach ($item->result() as $key => $data_item) {
		          ?>
		              <tr>
		                <td><?=$nomor++?></td>
		                <td><?=$data_item->item_barcode?></td>
		                <td><?=$data_item->item_nama?></td>
		                <td><?=$data_item->category_nama?></td>
		                <td><?=$data_item->unit_nama?></td>
		                <td><?=$data_item->item_stok?></td>
		                <td align="center" class="td-opsi">
	                    <button type="button" class="btn btn-sm btn-primary tmb_pilih_item" title="pilih item"
												data-item_id = "<?=$data_item->item_id?>"
												data-item_barcode = "<?=$data_item->item_barcode?>"
												data-item_nama = "<?=$data_item->item_nama?>"
												data-unit_nama = "<?=$data_item->unit_nama?>"
	                    >
	                      pilih
	                    </button>
		                </td>
		              </tr>
		          <?php } ?>
		        </tbody>
		      </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(".tmb_pilih_item").click(function() {
		var item_id = $(this).data('item_id');
		var item_barcode = $(this).data('item_barcode');
		var item_nama = $(this).data('item_nama');
		var unit_nama = $(this).data('unit_nama');
		$("#item_id").val(item_id);
		$("#item_barcode").val(item_barcode);
		$("#item_nama").val(item_nama);
		$("#unit_nama").text(unit_nama);

		$("#modal_close").click();
	})
</script>
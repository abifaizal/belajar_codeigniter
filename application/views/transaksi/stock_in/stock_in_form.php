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
          <label for="item_id">Item*</label>
          <div class="input-group input-group-sm">
	        <input type="text" class="form-control" id="item_id" name="item_id" placeholder="masukkan barcode / pilih item" value="" required>
	        <div class="input-group-append">
	        	<button class="btn btn-dark" type="button" id="tmb_cari_item" data-toggle="modal" data-target="#modal_daftar_item"><i class="fas fa-search"></i></button>
	        </div>
	      </div>
        </div>
        <div class="form-group">
          <label for="item_name">Nama Item</label>
          <input type="text" class="form-control form-control-sm" id="item_name" name="item_name" placeholder="nama item terpilih" value="" readonly>
        </div>
        <div class="form-group">
          <label for="stock_qty">Qty*</label>
          <div class="input-group input-group-sm">
          	<input type="text" class="form-control" id="stock_qty" name="stock_qty" placeholder="masukkan jumlah item" value="" required>
          	<div class="input-group-append">
	        	<span class="input-group-text" id="unit_item">Unit</span>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary btn-sm">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-box"></i> Halaman <?=$aktif_page == 'stock_tambah' ? 'Tambah' : 'Edit' ?> Data Stock In</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form <?=$aktif_page == 'stock_tambah' ? 'Tambah' : 'Edit' ?> Data Stock In</h6>
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
      <form action="<?=site_url('stock/stock_in_proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
      	<div class="form-group">
          <label for="supplier_id">Supplier*</label>
          <input type="text" class="form-control form-control-sm" id="supplier_id" name="supplier_id" placeholder="pilih supplier" value="" required>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-primary" id="<?=$aktif_page?>" name="<?=$aktif_page?>" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
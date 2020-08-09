<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-box"></i> Halaman <?=$aktif_page == 'item_tambah' ? 'Tambah' : 'Edit' ?> Data Item</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form <?=$aktif_page == 'item_tambah' ? 'Tambah' : 'Edit' ?> Data Item</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('item')?>">
  				<button class="btn btn-sm btn-dark">Daftar Item</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <div class="col-lg-6 offset-lg-3">
      <form action="<?=site_url('item/proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
      	<input type="hidden" name="item_id" value="<?=$row->item_id?>">
        <div class="form-group">
          <label for="item_barcode">Nama item</label>
          <input type="text" class="form-control form-control-sm" id="item_barcode" name="item_barcode" placeholder="masukkan nama item" value="<?=$row->item_barcode?>" required>
        </div>
        <div class="form-group">
          <label for="item_nama">Nama item</label>
          <input type="text" class="form-control form-control-sm" id="item_nama" name="item_nama" placeholder="masukkan nama item" value="<?=$row->item_nama?>" required>
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          <select class="form-control form-control-sm" name="category_id" id="category_id">
            <!-- <option value="L" <?=$row->category_id == 'L' ? 'selected' : null?>>Laki-laki</option> -->
          </select>
        </div>
        <div class="form-group">
          <label for="unit_id">Unit</label>
          <select class="form-control form-control-sm" name="unit_id" id="unit_id">
            <!--  -->
          </select>
        </div>
        <div class="form-group">
          <label for="item_harga">Harga</label>
          <input type="number" class="form-control form-control-sm" id="item_harga" name="item_harga" placeholder="masukkan nomor hp item" value="<?=$row->item_harga?>" required>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-primary" id="<?=$aktif_page?>" name="<?=$aktif_page?>" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
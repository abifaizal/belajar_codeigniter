<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-truck"></i> Halaman <?=$aktif_page == 'supplier_tambah' ? 'Tambah' : 'Edit' ?> Data Supplier</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form <?=$aktif_page == 'supplier_tambah' ? 'Tambah' : 'Edit' ?> Data Supplier</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('supplier')?>">
  				<button class="btn btn-sm btn-dark">Daftar Supplier</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <div class="col-lg-6 offset-lg-3">
      <form action="<?=site_url('supplier/proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
      	<input type="hidden" name="supplier_id" value="<?=$row->supplier_id?>">
        <div class="form-group">
          <label for="supplier_nama">Nama Supplier</label>
          <input type="text" class="form-control form-control-sm" id="supplier_nama" name="supplier_nama" placeholder="masukkan nama supplier" value="<?=$row->supplier_nama?>" required>
        </div>
        <div class="form-group">
          <label for="supplier_hp">Nomor Hp Supplier</label>
          <input type="number" class="form-control form-control-sm" id="supplier_hp" name="supplier_hp" placeholder="masukkan nomor hp supplier" value="<?=$row->supplier_hp?>" required>
        </div>
        <div class="form-group">
          <label for="supplier_alamat">Alamat</label>
          <textarea class="form-control form-control-sm" id="supplier_alamat" name="supplier_alamat" placeholder="masukkan alamat supplier" required><?=$row->supplier_alamat?></textarea>
        </div>
        <div class="form-group">
          <label for="supplier_ket">Keterangan</label> <small>(biarkan kosong jika tidak diperlukan)</small>
          <textarea class="form-control form-control-sm" id="supplier_ket" name="supplier_ket" placeholder="masukkan keterangan/deskripsi supplier"><?=$row->supplier_ket?></textarea>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-primary" id="<?=$aktif_page?>" name="<?=$aktif_page?>" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-tag"></i> Halaman <?=$aktif_page == 'unit_tambah' ? 'Tambah' : 'Edit' ?> Data Unit <?=$aktif_page == 'unit_tambah' ? 'Baru' : null ?></h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form <?=$aktif_page == 'unit_tambah' ? 'Tambah' : 'Edit' ?> Data Unit <?=$aktif_page == 'unit_tambah' ? 'Baru' : null ?></h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('unit')?>">
  				<button class="btn btn-sm btn-dark">Daftar Unit</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <div class="col-lg-6 offset-lg-3">
      <form action="<?=site_url('unit/proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
      	<input type="hidden" name="unit_id" value="<?=$row->unit_id?>">
        <div class="form-group">
          <label for="unit_nama">Nama unit <?=$aktif_page == 'unit_tambah' ? 'baru' : null ?></label>
          <input type="text" class="form-control form-control-sm" id="unit_nama" name="unit_nama" placeholder="masukkan nama unit" value="<?=$row->unit_nama?>" required>
        </div>
        <div class="form-group">
          <label for="unit_ket">Keterangan</label> <small>(biarkan kosong jika tidak diperlukan)</small>
          <textarea class="form-control form-control-sm" id="unit_ket" name="unit_ket" placeholder="masukkan keterangan/deskripsi unit"><?=$row->unit_ket?></textarea>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-primary" id="<?=$aktif_page?>" name="<?=$aktif_page?>" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
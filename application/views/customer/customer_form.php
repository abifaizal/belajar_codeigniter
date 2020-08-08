<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-user-tag"></i> Halaman <?=$aktif_page == 'customer_tambah' ? 'Tambah' : 'Edit' ?> Data Customer</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form <?=$aktif_page == 'customer_tambah' ? 'Tambah' : 'Edit' ?> Data Customer</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('customer')?>">
  				<button class="btn btn-sm btn-dark">Daftar Customer</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <div class="col-lg-6 offset-lg-3">
      <form action="<?=site_url('customer/proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
      	<input type="hidden" name="customer_id" value="<?=$row->customer_id?>">
        <div class="form-group">
          <label for="customer_nama">Nama customer</label>
          <input type="text" class="form-control form-control-sm" id="customer_nama" name="customer_nama" placeholder="masukkan nama customer" value="<?=$row->customer_nama?>" required>
        </div>
        <div class="form-group">
          <label for="customer_gender">Gender customer</label>
          <select class="form-control form-control-sm" name="customer_gender" id="customer_gender">
            <option value="L" <?=$row->customer_gender == 'L' ? 'selected' : null?>>Laki-laki</option>
            <option value="P" <?=$row->customer_gender == 'P' ? 'selected' : null?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="customer_hp">Nomor Hp customer</label>
          <input type="number" class="form-control form-control-sm" id="customer_hp" name="customer_hp" placeholder="masukkan nomor hp customer" value="<?=$row->customer_hp?>" required>
        </div>
        <div class="form-group">
          <label for="customer_alamat">Alamat</label>
          <textarea class="form-control form-control-sm" id="customer_alamat" name="customer_alamat" placeholder="masukkan alamat customer" required><?=$row->customer_alamat?></textarea>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-primary" id="<?=$aktif_page?>" name="<?=$aktif_page?>" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
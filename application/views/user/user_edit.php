<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-users"></i> Halaman Edit Data User</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form Edit Data User</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('user')?>">
  				<button class="btn btn-sm btn-dark">Daftar User</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <div class="col-lg-6 offset-lg-3">
      <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
      	<input type="hidden" name="user_id" value="<?=$data_user->user_id?>">
        <div class="form-group">
          <label for="user_nama">Nama User</label>
          <input type="text" class="form-control form-control-sm <?=form_error('user_nama') ? 'is-invalid' : null ?>" id="user_nama" name="user_nama" placeholder="masukkan nama" value="<?=$this->input->post('user_nama') ?? $data_user->user_nama ?>">
          <?=form_error('user_nama')?>
        </div>
        <div class="form-group">
          <label for="user_level">Level User</label>
          <select name="user_level" id="user_level" class="custom-select form-control form-control-sm <?=form_error('user_level') ? 'is-invalid' : null ?>" style="font-size: 14px;">
          	<?php $option_level = $this->input->post('user_level') ?? $data_user->user_level ?>
            <option value="Kasir">Kasir</option>
            <option value="Admin" <?=$option_level == 'Admin'? 'selected' : null ?>>Admin</option>
          </select>
          <?=form_error('user_level')?>
        </div>
        <div class="form-group">
          <label for="user_alamat">Alamat</label>
          <textarea class="form-control form-control-sm <?=form_error('user_alamat') ? 'is-invalid' : null ?>" id="user_alamat" name="user_alamat" placeholder="masukkan alamat"><?=$this->input->post('user_alamat') ?? $data_user->user_alamat ?></textarea>
          <?=form_error('user_alamat')?>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control form-control-sm <?=form_error('username') ? 'is-invalid' : null ?>" id="username" name="username" placeholder="masukkan username" value="<?=$this->input->post('username') ?? $data_user->username ?>">  
          <?=form_error('username')?> 
        </div>
        <div class="form-group">
          <label for="password">Password <small>(biarkan kosong jika tidak ingin mengubah password)</small></label>
          <input type="password" class="form-control form-control-sm <?=form_error('password') ? 'is-invalid' : null ?>" id="password" name="password" placeholder="masukkan password" value="<?=$this->input->post('password')?>">
          <?=form_error('password')?> 
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm Password <small>(biarkan kosong jika tidak ingin mengubah password)</small></label>
          <input type="password" class="form-control form-control-sm <?=form_error('confirm_password') ? 'is-invalid' : null ?>" id="confirm_password" name="confirm_password" placeholder="masukkan password" value="<?=$this->input->post('confirm_password')?>">
          <?=form_error('confirm_password')?>
        </div>
        <div class="form-group" style="text-align: right;">
          <button type="reset" class="btn btn-sm btn-danger" id="reset_form" name="reset_form">Reset</button>
          <input type="submit" class="btn btn-sm btn-warning" id="submit_user" name="submit_user" value="Simpan Perubahan">
        </div>
      </form>
    </div>
  </div>
</div>
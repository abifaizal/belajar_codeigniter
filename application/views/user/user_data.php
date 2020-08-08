<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-users"></i> Halaman Data User</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Data User</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('user/tambah')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data User Baru</button>
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
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Alamat</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($daftar_user->result() as $key => $data_user) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data_user->user_nama?></td>
                <td><?=$data_user->username?></td>
                <td><?=$data_user->user_level?></td>
                <td><?=$data_user->user_alamat?></td>
                <td align="center" class="td-opsi">
                  <form action="<?=site_url('user/del')?>" method="post">
                    <a href="<?=site_url('user/edit/'.$data_user->user_id)?>" class="btn btn-sm btn-info tmb_edit" title="edit data">
                      <i class="fas fa-edit"></i>
                    </a>
                    <input type="hidden" name="user_id" value="<?=$data_user->user_id?>">
                    <button type="submit" class="btn btn-sm btn-danger tmb-hapus" title="hapus data" onclick="return confirm('Yakin akan menghapus data ini?')">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
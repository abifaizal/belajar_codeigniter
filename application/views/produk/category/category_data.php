<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-bookmark"></i> Halaman Data Category</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Data Category</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('category/tambah')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data Category Baru</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
  	<?php if(@$_SESSION['success']) { ?>
  	<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Sukses !</strong> <?=$_SESSION['success']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Category</th>
            <th>Keterangan</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($daftar_category->result() as $key => $data_category) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data_category->category_nama?></td>
                <td><?=$data_category->category_ket == null ? '-' : $data_category->category_ket ?></td>
                <td align="center" class="td-opsi">
                  <form action="<?=site_url('category/del')?>" method="post">
                    <a href="<?=site_url('category/edit/'.$data_category->category_id)?>" class="btn btn-sm btn-info tmb_edit" title="edit data">
                      <i class="fas fa-edit"></i>
                    </a>
                    <input type="hidden" name="category_id" value="<?=$data_category->category_id?>">
                    <button type="submit" class="btn btn-sm btn-danger tmb-hapus" title="hapus data" onclick="return confirm('Anda yakin akan menghapus data ini?')">
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
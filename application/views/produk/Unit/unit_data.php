<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-tag"></i> Halaman Data Unit</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Data Unit</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('unit/tambah')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data Unit Baru</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
  	<? $this->view('message') ?>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama unit</th>
            <th>Keterangan</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($daftar_unit->result() as $key => $data_unit) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data_unit->unit_nama?></td>
                <td><?=$data_unit->unit_ket == null ? '-' : $data_unit->unit_ket ?></td>
                <td align="center" class="td-opsi">
                  <form action="<?=site_url('unit/del')?>" method="post">
                    <a href="<?=site_url('unit/edit/'.$data_unit->unit_id)?>" class="btn btn-sm btn-info tmb_edit" title="edit data">
                      <i class="fas fa-edit"></i>
                    </a>
                    <input type="hidden" name="unit_id" value="<?=$data_unit->unit_id?>">
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
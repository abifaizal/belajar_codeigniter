<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-truck"></i> Halaman Data Supplier</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Data Supplier</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('supplier/tambah')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data Supplier Baru</button>
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
            <th>Nama Supplier</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($daftar_supplier->result() as $key => $data_supplier) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data_supplier->supplier_nama?></td>
                <td><?=$data_supplier->supplier_hp?></td>
                <td><?=$data_supplier->supplier_alamat?></td>
                <td align="center" class="td-opsi">
                  <form action="<?=site_url('supplier/del')?>" method="post">
                    <a href="<?=site_url('supplier/edit/'.$data_supplier->supplier_id)?>" class="btn btn-sm btn-info tmb_edit" title="edit data">
                      <i class="fas fa-edit"></i>
                    </a>
                    <input type="hidden" name="supplier_id" value="<?=$data_supplier->supplier_id?>">
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
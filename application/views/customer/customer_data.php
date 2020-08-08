<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-user-tag"></i> Halaman Data Customer</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Data Customer</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('customer/tambah')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data Customer Baru</button>
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
            <th>Gender</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($daftar_customer->result() as $key => $data_customer) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data_customer->customer_nama?></td>
                <td><?=$data_customer->customer_gender?></td>
                <td><?=$data_customer->customer_hp?></td>
                <td><?=$data_customer->customer_alamat?></td>
                <td align="center" class="td-opsi">
                  <form action="<?=site_url('customer/del')?>" method="post">
                    <a href="<?=site_url('customer/edit/'.$data_customer->customer_id)?>" class="btn btn-sm btn-info tmb_edit" title="edit data">
                      <i class="fas fa-edit"></i>
                    </a>
                    <input type="hidden" name="customer_id" value="<?=$data_customer->customer_id?>">
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
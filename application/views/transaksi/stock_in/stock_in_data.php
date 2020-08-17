<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-box"></i> Halaman Riwayat Stock In</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Riwayat Stock In</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('stock/in/add')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data +</button>
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
            <th>Tanggal</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Supplier</th>
            <th>User</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($stock_in->result() as $key => $data) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data->stock_tanggal?></td>
                <td><?=$data->item_nama?></td>
                <td><?=$data->stock_qty?></td>
                <td><?=$data->supplier_nama?></td>
                <td><?=$data->user_nama?></td>
                <td class="td-opsi" align="center">
                  <button class="btn btn-sm btn-info tmb_detail" title="detail">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="btn btn-sm btn-danger tmb_hapus" title="hapus">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
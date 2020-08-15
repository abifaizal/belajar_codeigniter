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

        </tbody>
      </table>
    </div>
  </div>
</div>
<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-box"></i> Halaman Data Item</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Tabel Data Item</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('item/tambah')?>">
  				<button class="btn btn-sm btn-dark">Tambah Data Item Baru</button>
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
            <th>Barcode</th>
            <th>Nama item</th>
            <th>Kategori</th>
            <th>Unit</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $nomor = 1;
            foreach ($daftar_item->result() as $key => $data_item) {
          ?>
              <tr>
                <td><?=$nomor++?></td>
                <td><?=$data_item->item_barcode?></td>
                <td><?=$data_item->item_nama?></td>
                <td><?=$data_item->category_nama?></td>
                <td><?=$data_item->unit_nama?></td>
                <td><?=$data_item->item_harga?></td>
                <td><?=$data_item->item_stok?></td>
                <td align="center" class="td-opsi">
                  <form action="<?=site_url('item/del')?>" method="post">
                    <a href="<?=site_url('item/edit/'.$data_item->item_id)?>" class="btn btn-sm btn-info tmb_edit" title="edit data">
                      <i class="fas fa-edit"></i>
                    </a>
                    <input type="hidden" name="item_id" value="<?=$data_item->item_id?>">
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
<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-handshake"></i> Halaman Transaksi Penjualan</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form Transaksi Penjualan</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<a href="<?=site_url('sale/data')?>">
  				<button class="btn btn-sm btn-dark">Riwayat Transaksi</button>
  			</a>
  		</div>
  	</div>  
  </div>
  <div class="card-body">
    <? $this->view('message') ?>
    <form action="<?=site_url('sale/proses')?>" method="post" autocomplete="off" enctype="multipart/form-data">
			<div class="row">
				<!-- Kotak Tanggal, Kasir -->
				<div class="col-lg-4">
					<div class="card shadow h-100">
            <div class="card-body">
              <div class="form-group row">
						    <label for="sale_tanggal" class="col-sm-3 col-form-label">Tanggal</label>
						    <div class="col-sm-9">
						      <input type="date" class="form-control form-control-sm" name="sale_tanggal" id="sale_tanggal" value="<?=date('Y-m-d')?>" required>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="user_nama" class="col-sm-3 col-form-label">Kasir</label>
						    <div class="col-sm-9">
						    	<input type="hidden" name="user_id" value="<?=$this->fungsi->user_login()->user_id?>">
						      <input type="text" class="form-control form-control-sm" name="user_nama" id="user_nama" value="<?=ucfirst($this->fungsi->user_login()->user_nama)?>" readonly="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="customer_id" class="col-sm-3 col-form-label" style="padding-right: 2px;">Customer</label>
						    <div class="col-sm-9">
						      <select name="customer_id" id="customer_id" class="form-control form-control-sm js-example-basic-single">
						      	<option value="Umum">Umum</option>
						      	<?php foreach ($customer as $key => $d_customer) { ?>
				              <option value="<?=$d_customer->customer_id?>" >
				                <?=$d_customer->customer_nama?>
				              </option>
				            <?php } ?>
						      </select>
						    </div>
						  </div>
            </div>
          </div>
				</div>

				<!-- Kotak Item, Qty -->
				<div class="col-lg-4">
					<div class="card shadow h-100">
            <div class="card-body">
              <div class="form-group row">
						    <label for="sale_tanggal" class="col-sm-3 col-form-label">Barcode</label>
						    <div class="col-sm-9">
						      <div class="input-group input-group-sm">
				  	        <input type="text" class="form-control" id="item_barcode" name="item_barcode" value="">
				  	        <div class="input-group-append">
				  	        	<button class="btn btn-dark" type="button" id="tmb_cari_item" data-toggle="modal" data-target="#modal_daftar_item"><i class="fas fa-search"></i></button>
				  	        </div>
				  	      </div>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="item_qty" class="col-sm-3 col-form-label">Qty</label>
						    <div class="col-sm-9">
						      <input type="number" class="form-control form-control-sm" id="item_qty" placeholder="jumlah item">
						    </div>
						  </div>
						  <div class="form-group" align="right">
						  	<button type="button" class="btn btn-sm btn-success"><i class="fas fa-cart-plus"></i> add</button>
						  </div>
            </div>
          </div>
				</div>

				<!-- Kotak Invoice#, Total -->
				<div class="col-lg-4">
					<div class="card shadow h-100">
            <div class="card-body">
            	<div class="ivoice-box" align="right" style="font-size: 18px;">
            		Invoice <strong><span class="invoice-number"><?=$invoice_number?></span></strong>
            		<input type="hidden" name="sale_invoice" value="<?=$invoice_number?>">
            	</div>
            	<div class="total-box" align="right" style="font-size: 45px; font-weight: bold; margin-top: 10px;">
            		170,845
            	</div>
            </div>
          </div>
				</div>

				<!-- Kotak Keranjang -->
				<div class="col-12 mt-3">
					<div class="card shadow h-100">
            <div class="card-body table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Item</th>
										<th>Harga</th>
										<th>Qty</th>
										<th>Subtotal</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="6" align="center">Keranjang masih kosong</td>
									</tr>
								</tbody>
							</table>
            </div>
          </div>
				</div>

				<!-- Kotak Diskon, Total Akhir -->
				<div class="col-lg-6 mt-3">
					<div class="card shadow h-100">
            <div class="card-body">
              <div class="form-group row">
						    <label for="sale_subtotal" class="col-sm-4 col-form-label">Subtotal</label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control form-control-sm" name="sale_subtotal" id="sale_subtotal" readonly>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="sale_diskon" class="col-sm-4 col-form-label">Diskon</label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control form-control-sm" name="sale_diskon" id="sale_diskon" value="0" required="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="sale_total" class="col-sm-4 col-form-label">Total Akhir</label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control form-control-sm" name="sale_total" id="sale_total" readonly>
						    </div>
						  </div>
            </div>
          </div>
				</div>

				<!-- Kotak Bayar, Kembali -->
				<div class="col-lg-6 mt-3">
					<div class="card shadow h-100">
            <div class="card-body">
              <div class="form-group row">
						    <label for="sale_bayar" class="col-sm-4 col-form-label">Bayar</label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control form-control-sm" name="sale_bayar" id="sale_bayar" required>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="sale_kembali" class="col-sm-4 col-form-label">Kembali</label>
						    <div class="col-sm-8">
						      <input type="number" class="form-control form-control-sm" name="sale_kembali" id="sale_kembali" readonly>
						    </div>
						  </div>
            </div>
          </div>
				</div>
			</div>
			<hr>
			<div class="submit-cancel-button" align="right">
				<button type="button" class="btn btn-danger">
					<i class="fas fa-sync-alt"></i> Cancel
				</button>
				<button type="button" class="btn btn-success">
					<i class="fas fa-paper-plane"></i> Proses Transaksi
				</button>
			</div>
    </form>
  </div>
</div>

<!-- modal daftar item -->
<div class="modal fade" id="modal_daftar_item" tabindex="-1" aria-labelledby="modal_daftar_itemLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_daftar_itemLabel">Daftar Item</h5>
        <button type="button" class="close" id="modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		        <thead>
		          <tr>
		            <th>#</th>
		            <th>Barcode</th>
		            <th>Nama item</th>
		            <th>Kategori</th>
		            <th>Unit</th>
		            <th>Stok</th>
		            <th>Opsi</th>
		          </tr>
		        </thead>
		        <tbody>
							<?php 
		            $nomor = 1;
		            foreach ($item->result() as $key => $data_item) {
		          ?>
		              <tr>
		                <td><?=$nomor++?></td>
		                <td><?=$data_item->item_barcode?></td>
		                <td><?=$data_item->item_nama?></td>
		                <td><?=$data_item->category_nama?></td>
		                <td><?=$data_item->unit_nama?></td>
		                <td><?=$data_item->item_stok?></td>
		                <td align="center" class="td-opsi">
	                    <button type="button" class="btn btn-sm btn-primary tmb_pilih_item" title="pilih item"
												data-item_id = "<?=$data_item->item_id?>"
												data-item_barcode = "<?=$data_item->item_barcode?>"
												data-item_nama = "<?=$data_item->item_nama?>"
												data-unit_nama = "<?=$data_item->unit_nama?>"
	                    >
	                      pilih
	                    </button>
		                </td>
		              </tr>
		          <?php } ?>
		        </tbody>
		      </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
	  $('.js-example-basic-single').select2();
	});
</script>
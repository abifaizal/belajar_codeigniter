<h1 class="h3 mb-2 text-gray-800 judul-halaman"><i class="fas fa-handshake"></i> Halaman Transaksi Penjualan</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  	<div class="row">
  		<div class="col-md-6">
  			<h6 class="font-weight-bold text-primary">Form Transaksi Penjualan</h6>
  		</div>
  		<div class="col-md-6" style="text-align: right;">
  			<button type="button" id="tmb_tes" class="btn btn-sm btn-primary">Tes</button>
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
						  <input type="hidden" id="item_id">
						  <input type="hidden" id="item_nama">
						  <input type="hidden" id="item_harga">
						  <input type="hidden" id="item_stok">
						  <div class="form-group row">
						    <label for="item_qty" class="col-sm-3 col-form-label">Qty</label>
						    <div class="col-sm-9">
						      <input type="number" class="form-control form-control-sm" id="item_qty" placeholder="jumlah item">
						    </div>
						  </div>
						  <div class="form-group" align="right">
						  	<button type="button" class="btn btn-sm btn-success" id="add_item_cart"><i class="fas fa-cart-plus"></i> add</button>
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
            		<span id="sale_total_text">0</span>
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
										<th>Total</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody id="tbody_cart">
									<!-- diisi dengan jquery -->
								</tbody>
								<tfoot>
		              <tr id="no_data" align="center">
		                <td colspan="6">Belum ada item ditambahkan</td>
		              </tr>
		              <tr id="baris_total" style="display: none;">
		                <td colspan="5">
		                  Total : Rp <span id="total_keranjang"></span>
		                </td>
		                <td class="td-opsi" align="center">
		                  <button type="button" class="btn btn-sm btn-danger" id="hapus_keranjang">
		                    <i class="fas fa-trash"></i>
		                  </button>
		                </td>
		              </tr>
		            </tfoot>
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
												data-item_harga = "<?=$data_item->item_harga?>"
												data-item_stok = "<?=$data_item->item_stok?>"
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
	var total_pjl = 0;

	$(document).ready(function() {
	  $('.js-example-basic-single').select2();
	});

	function clear() {
		$("#item_id").val("");
		$("#item_barcode").val("");
		$("#item_qty").val("");
		$("#item_nama").val("");
		$("#item_harga").val("");
		$("#item_stok").val("");
	}

	$(".tmb_pilih_item").click(function() {
		var item_id = $(this).data('item_id');
		var item_barcode = $(this).data('item_barcode');
		var item_nama = $(this).data('item_nama');
		var item_harga = $(this).data('item_harga');
		var item_stok = $(this).data('item_stok');
		$("#item_id").val(item_id);
		$("#item_barcode").val(item_barcode);
		$("#item_nama").val(item_nama);
		$("#item_harga").val(item_harga);
		$("#item_stok").val(item_stok);
		$("#item_qty").val(1);

		$("#modal_close").click();
	})

	$("#add_item_cart").click(function() {
		var item_id = $("#item_id").val();
		var item_barcode = $("#item_barcode").val();
		var item_nama = $("#item_nama").val();
		var item_harga = Number($("#item_harga").val());
		var item_stok = Number($("#item_stok").val());
		var item_qty = Number($("#item_qty").val());

		if(item_id == "") {
			alert("Anda belum memilih item");
			$("#item_barcode").focus();
		} else if(item_qty == "" || item_qty <= 0) {
			alert("Qty tidak boleh kosong atau kurang dari 0");
			$("#item_qty").focus();
		} else if(item_qty > item_stok) {
			alert("Jumlah stok item tidak cukup");
			$("#item_qty").focus();
		} else {
			var item_sama = "kosong";
			var item_total = item_harga * item_qty;
			var jml_baris = $("input[name='hidden_item_id[]']").map(function(){return $(this).val();}).get();

			if(jml_baris.length > 0) {
				for(var i = 0; i < jml_baris.length; i++) {
					if(item_id == jml_baris[i]) {
						item_sama = "ada";
						var this_qty = Number($("#hidden_item_qty"+jml_baris[i]).val());
						var new_qty = item_qty + this_qty;
						var this_total = Number($("#hidden_item_total"+jml_baris[i]).val());
						var new_total = item_total + this_total;
						$("#hidden_item_qty"+jml_baris[i]).val(new_qty);
						$("#span_hidden_item_qty"+jml_baris[i]).text(new_qty);
						$("#hidden_item_total"+jml_baris[i]).val(new_total);
						$("#span_hidden_item_total"+jml_baris[i]).text(new_total);
					}
				}
			}
			if(item_sama == "kosong") {
	      var baris_baru = '';
	      baris_baru += '<tr id="row_'+item_id+'">';
	      baris_baru +=   '<td>'+item_barcode+'<input type="hidden" class="hidden_item_id" id="hidden_item_id'+item_id+'" name="hidden_item_id[]" value="'+item_id+'"></td>';
	      baris_baru +=   '<td>'+item_nama+'</td>';
	      baris_baru +=   '<td>'+item_harga+'</td>';
	      baris_baru +=   '<td><span id="span_hidden_item_qty'+item_id+'">'+item_qty+'</span><input type="hidden" class="hidden_item_qty" id="hidden_item_qty'+item_id+'" name="hidden_item_qty[]" value="'+item_qty+'"></td>';
	      baris_baru +=   '<td><span id="span_hidden_item_total'+item_id+'">'+item_total+'</span><input type="hidden" class="hidden_item_total" id="hidden_item_total'+item_id+'" name="hidden_item_total[]" value="'+item_total+'"></td>';
	      baris_baru +=   '<td class="td-opsi" align="center"><button type="button" class="btn btn-sm btn-danger del_item_cart" id="'+item_id+'"><i class="fas fa-trash"></i></button></td>';
	      baris_baru += '</tr>';
	      $("#tbody_cart").append(baris_baru);
	    }
      $("#no_data").hide();
      total_pjl = total_pjl + item_total;
      $("#total_keranjang").text(total_pjl);
      $("#sale_total_text").text(total_pjl);
      $("#sale_subtotal").val(total_pjl);
      $("#baris_total").show();
      // $("#bayar_pjl").val("");
      // $("#kembalian_pjl").val("");
      clear();
		}
	})

	$(document).on("click", ".del_item_cart", function() {
    var row_id = $(this).attr("id");
    var item_total = Number($("#hidden_item_total"+row_id).val());
    total_pjl = total_pjl - item_total;
    $("#total_keranjang").text(total_pjl);
    $("#sale_total_text").text(total_pjl);
    $("#sale_subtotal").val(total_pjl);
    $("#row_"+row_id).remove();
    // $("#bayar_pjl").val("");
    // $("#kembalian_pjl").val("");
    if(total_pjl == 0) {
      $("#no_data").show();
      $("#baris_total").hide();
    }
  })

	$("#tmb_tes").click(function() {
		// var values = ["Banana", "Orange", "Apple", "Mango"];
		var values = $("input[name='hidden_item_total[]']").map(function(){return $(this).val();}).get();
		alert(values);
	})
</script>
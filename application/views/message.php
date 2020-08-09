<?php if($this->session->has_userdata('success')) { ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong><i class="fas fa-check"></i> Berhasil !</strong> <?=$_SESSION['success']?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php } ?>

<?php if($this->session->has_userdata('error')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong><i class="fas fa-ban"></i> Gagal !</strong> <?=$_SESSION['error']?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
<?php } ?>
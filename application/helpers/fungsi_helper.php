<?php 
	function cek_sudah_login() {
		$ci =& get_instance();
		$user_session = @$ci->session->userdata['user_id'];
		if($user_session) {
			redirect('dashboard');
		}
	}

	function cek_belum_login() {
		$ci =& get_instance();
		$user_session = $ci->session->userdata['user_id'];
		if(!$user_session) {
			redirect('auth/login');
		}
	}

	function cek_admin() {
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if($ci->fungsi->user_login()->user_level != 'Admin') {
			redirect('dashboard');
		}
	}

	function nominal_indo($nominal) {
		$result = "Rp" . number_format($nominal);
		return $result;
	}
 ?>
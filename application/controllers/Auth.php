<?php 
    class Auth extends CI_Controller {

    	function __construct() {
			parent::__construct();
			$this->load->model('user_m');
		}

        public function login() {
        	cek_sudah_login();
            $this->load->view('login');
        }

        public function proses() {
            $inputan = $this->input->post(null, TRUE);
            if(isset($inputan['submit_login'])) {
				$query = $this->user_m->login($inputan);
				if($query->num_rows() > 0)
				{
					$row = $query->row();
					$param = array(
						'user_id'		=> $row->user_id,
						'username'		=> $row->username,
						'level'			=> $row->user_level,
					);
					$this->session->set_userdata($param);
					echo "<script>
							alert('Selamat, Login Berhasil');
							window.location='".site_url()."';
						</script>";
				}
				else 
				{
					echo "<script>
							alert('Maaf, Login Gagal');
							window.location='".site_url('auth/login')."';
						</script>";
				}
			}
        }

        public function logout() {
        	$params = array('user_id', 'username', 'level'); 
        	$this->session->unset_userdata($params);
        	redirect('auth/login');
        }
    }
?>
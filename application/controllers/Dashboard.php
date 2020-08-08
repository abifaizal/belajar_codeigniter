<?php 
    class Dashboard extends CI_Controller {
        public function index() {
        	cek_belum_login();
        	$data['header'] = 'Dashboard';
            $this->template->load('template', 'dashboard', $data);
        }
    }
?>
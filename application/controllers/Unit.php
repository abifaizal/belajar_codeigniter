<?php 
    class Unit extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model('unit_m');
            $this->load->library('form_validation');
		}

        public function index() {
        	$data['header'] = 'Data unit';
            $data['aktif_menu'] = 'unit';
        	$data['aktif_page'] = 'unit_data';
        	$data['daftar_unit'] = $this->unit_m->get();
            $this->template->load('template', 'produk/unit/unit_data', $data);
        }

        public function tambah() {
        	$data['header'] = 'Form Tambah unit';
            $data['aktif_menu'] = 'unit';
        	$data['aktif_page'] = 'unit_tambah';

        	$unit = new stdClass();
        	$unit->unit_id = null;
            $unit->unit_nama = null;
        	$unit->unit_ket = null;
        	$data['row'] = $unit;

            $this->template->load('template', 'produk/unit/unit_form', $data);
        }

        public function edit($id) {
        	$data['header'] = 'Form Edit unit';
            $data['aktif_menu'] = 'unit';
        	$data['aktif_page'] = 'unit_edit';
        	
        	$query = $this->unit_m->get($id);
            if($query->num_rows() > 0) {
               $data['row'] = $query->row();
               $this->template->load('template', 'produk/unit/unit_form', $data);
            } else {
                echo "<script>
                            alert('Maaf, data tidak ditemukan');
                            window.location='".site_url('unit')."';
                        </script>";
            }
        }

        public function del() {
            $unit_id = $this->input->post('unit_id');
            $cek_item = $this->unit_m->check_item_unit($unit_id);
            if($cek_item->num_rows() > 0) {
                $this->session->set_flashdata('error', "Unit ini tidak dapat dihapus karena telah digunakan pada item");
            } else {
                $this->unit_m->del($unit_id);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data telah terhapus');
                }
            }
            redirect('unit');
        }

        public function proses() {
        	$inputan = $this->input->post(null, TRUE);
        	if(isset($_POST['unit_tambah'])) {
        		$this->unit_m->add($inputan);
        	}
        	if(isset($_POST['unit_edit'])) {
        		$this->unit_m->edit($inputan);
        	}

        	if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data telah tersimpan');
            }
            redirect('unit');
        }
    }
?>
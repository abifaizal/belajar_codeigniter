<?php 
    class Supplier extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model('supplier_m');
            $this->load->library('form_validation');
		}

        public function index() {
        	$data['header'] = 'Data Supplier';
        	$data['aktif_page'] = 'supplier_data';
        	$data['daftar_supplier'] = $this->supplier_m->get();
            $this->template->load('template', 'supplier/supplier_data', $data);
        }

        public function del() {
        	$supplier_id = $this->input->post('supplier_id');
            $this->supplier_m->del($supplier_id);
            if($this->db->affected_rows() > 0)
            {
                echo "<script>
                        alert('Sukses! Data berhasil dihapus');
                        window.location='".site_url('supplier')."';
                    </script>";
            }
        }

        public function tambah() {
        	$data['header'] = 'Form Tambah Supplier';
        	$data['aktif_page'] = 'supplier_tambah';

        	$supplier = new stdClass();
        	$supplier->supplier_id = null;
        	$supplier->supplier_nama = null;
        	$supplier->supplier_hp = null;
        	$supplier->supplier_alamat = null;
        	$supplier->supplier_ket = null;
        	$data['row'] = $supplier;

            $this->template->load('template', 'supplier/supplier_form', $data);
        }

        public function edit($id) {
        	$data['header'] = 'Form Edit Supplier';
        	$data['aktif_page'] = 'supplier_edit';
        	
        	$query = $this->supplier_m->get($id);
            if($query->num_rows() > 0) {
               $data['row'] = $query->row();
               $this->template->load('template', 'supplier/supplier_form', $data);
            } else {
                echo "<script>
                            alert('Maaf, data tidak ditemukan');
                            window.location='".site_url('supplier')."';
                        </script>";
            }
        }

        public function proses() {
        	$inputan = $this->input->post(null, TRUE);
        	if(isset($_POST['supplier_tambah'])) {
        		$this->supplier_m->add($inputan);
        	}
        	if(isset($_POST['supplier_edit'])) {
        		$this->supplier_m->edit($inputan);
        	}

        	if($this->db->affected_rows() > 0) {
                echo "<script>
                        alert('Sukses! data berhasil disimpan');
                    </script>";
            }

            echo "<script>
                        window.location='".site_url('supplier')."';
                    </script>";
        }
    }
?>
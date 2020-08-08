<?php 
    class Customer extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model('customer_m');
            // $this->load->library('form_validation');
		}

        public function index() {
        	$data['header'] = 'Data customer';
        	$data['aktif_page'] = 'customer_data';
        	$data['daftar_customer'] = $this->customer_m->get();
            $this->template->load('template', 'customer/customer_data', $data);
        }

        public function del() {
        	$customer_id = $this->input->post('customer_id');
            $this->customer_m->del($customer_id);
            if($this->db->affected_rows() > 0)
            {
                echo "<script>
                        alert('Sukses! Data berhasil dihapus');
                        window.location='".site_url('customer')."';
                    </script>";
            }
        }

        public function tambah() {
        	$data['header'] = 'Form Tambah customer';
        	$data['aktif_page'] = 'customer_tambah';

        	$customer = new stdClass();
        	$customer->customer_id = null;
        	$customer->customer_nama = null;
        	$customer->customer_hp = null;
        	$customer->customer_alamat = null;
        	$customer->customer_gender = null;
        	$data['row'] = $customer;

            $this->template->load('template', 'customer/customer_form', $data);
        }

        public function edit($id) {
        	$data['header'] = 'Form Edit customer';
        	$data['aktif_page'] = 'customer_edit';
        	
        	$query = $this->customer_m->get($id);
            if($query->num_rows() > 0) {
               $data['row'] = $query->row();
               $this->template->load('template', 'customer/customer_form', $data);
            } else {
                echo "<script>
                            alert('Maaf, data tidak ditemukan');
                            window.location='".site_url('customer')."';
                        </script>";
            }
        }

        public function proses() {
        	$inputan = $this->input->post(null, TRUE);
        	if(isset($_POST['customer_tambah'])) {
        		$this->customer_m->add($inputan);
        	}
        	if(isset($_POST['customer_edit'])) {
        		$this->customer_m->edit($inputan);
        	}

        	if($this->db->affected_rows() > 0) {
                echo "<script>
                        alert('Sukses! data berhasil disimpan');
                    </script>";
            }

            echo "<script>
                        window.location='".site_url('customer')."';
                    </script>";
        }
    }
?>
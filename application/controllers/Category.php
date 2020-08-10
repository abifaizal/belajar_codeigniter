<?php 
    class Category extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
			$this->load->model('category_m');
            $this->load->library('form_validation');
		}

        public function index() {
        	$data['header'] = 'Data category';
            $data['aktif_menu'] = 'category';
        	$data['aktif_page'] = 'category_data';
        	$data['daftar_category'] = $this->category_m->get();
            $this->template->load('template', 'produk/category/category_data', $data);
        }

        public function tambah() {
        	$data['header'] = 'Form Tambah category';
            $data['aktif_menu'] = 'category';
        	$data['aktif_page'] = 'category_tambah';

        	$category = new stdClass();
        	$category->category_id = null;
            $category->category_nama = null;
        	$category->category_ket = null;
        	$data['row'] = $category;

            $this->template->load('template', 'produk/category/category_form', $data);
        }

        public function edit($id) {
        	$data['header'] = 'Form Edit category';
            $data['aktif_menu'] = 'category';
        	$data['aktif_page'] = 'category_edit';
        	
        	$query = $this->category_m->get($id);
            if($query->num_rows() > 0) {
               $data['row'] = $query->row();
               $this->template->load('template', 'produk/category/category_form', $data);
            } else {
                echo "<script>
                            alert('Maaf, data tidak ditemukan');
                            window.location='".site_url('category')."';
                        </script>";
            }
        }

        public function del() {
            $category_id = $this->input->post('category_id');
            $cek_item = $this->category_m->check_item_category($category_id);
            if($cek_item->num_rows() > 0) {
                $this->session->set_flashdata('error', "Category ini tidak dapat dihapus karena telah digunakan pada item");
            } else {
                $this->category_m->del($category_id);
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data telah terhapus');
                }
            }
            redirect('category');
        }

        public function proses() {
        	$inputan = $this->input->post(null, TRUE);
        	if(isset($_POST['category_tambah'])) {
        		$this->category_m->add($inputan);
        	}
        	if(isset($_POST['category_edit'])) {
        		$this->category_m->edit($inputan);
        	}

        	if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data telah tersimpan');
            }
            redirect('category');
        }
    }
?>
<?php 
    class User extends CI_Controller {
    	function __construct() {
			parent::__construct();
			cek_belum_login();
            cek_admin();
			$this->load->model('user_m');
            $this->load->library('form_validation');
		}

        public function index() {
        	$data['header'] = 'Data User';
        	$data['aktif_page'] = 'user_data';
        	$data['daftar_user'] = $this->user_m->get();
            $this->template->load('template', 'user/user_data', $data);
        }

        public function del() {
            $user_id = $this->input->post('user_id');
            $this->user_m->del($user_id);
            if($this->db->affected_rows() > 0)
            {
                echo "<script>
                        alert('Sukses! Data berhasil dihapus');
                        window.location='".site_url('user')."';
                    </script>";
            }
        }

        public function edit($id = null) {
            $data['header'] = 'Form Edit User';
            $data['aktif_page'] = 'user_edit';

            $this->form_validation->set_rules('user_nama', 'Nama', 'required');
            $this->form_validation->set_rules('user_level', 'Level', 'required');
            $this->form_validation->set_rules('user_alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_cekUsername');
            if($this->input->post('password')) { 
                $this->form_validation->set_rules('password', 'Password', 'min_length[8]');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
            }
            if($this->input->post('confirm_password')) {
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]', array('matches' => '%s tidak sesuai dengan Password'));
            }

            $this->form_validation->set_message('required', '%s masih kosong, silahkan isi dulu');
            $this->form_validation->set_message('min_length', '{field} minimal harus {param} karakter.');

            $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $query = $this->user_m->get($id);
                if($query->num_rows() > 0) {
                   $data['data_user'] = $query->row();
                   $this->template->load('template', 'user/user_edit', $data);
                } else {
                    echo "<script>
                                alert('Maaf, data tidak ditemukan');
                                window.location='".site_url('user')."';
                            </script>";
                }
            }
            else
            {
                $inputan = $this->input->post(null, TRUE);
                $this->user_m->edit($inputan);
                if($this->db->affected_rows() > 0)
                {
                    // $params = array(
                    //     'user_id'       => $inputan['user_id'],
                    //     'username'      => $inputan['username'],
                    //     'level'         => $inputan['user_level'],
                    // );
                    // $this->session->set_userdata($params);
                    echo "<script>
                            alert('Sukses! Perubahan data berhasil disimpan');
                            window.location='".site_url('user')."';
                        </script>";
                }
                echo "<script>
                            window.location='".site_url('user')."';
                        </script>";
            }
        }
        public function cekUsername() {
            $post = $this->input->post(null, TRUE);
            $query = $this->db->query("SELECT * FROM tb_user WHERE username = '$post[username]' AND user_id != '$post[user_id]' ");
            if($query->num_rows() > 0) {
                $this->form_validation->set_message('cekUsername', '{field} tersebut telah digunakan, mohon pilih yang lain');
                return FALSE;
            }
            else {
                return TRUE;
            }
        }

        public function tambah() {
        	$data['header'] = 'Form Tambah User';
        	$data['aktif_page'] = 'user_tambah';

        	$this->form_validation->set_rules('user_nama', 'Nama', 'required');
        	$this->form_validation->set_rules('user_level', 'Level', 'required');
        	$this->form_validation->set_rules('user_alamat', 'Alamat', 'required');
        	$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');
        	$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', array('matches' => '%s tidak sesuai dengan Password'));

        	$this->form_validation->set_message('required', '%s masih kosong, silahkan isi dulu');
        	$this->form_validation->set_message('is_unique', 'Username tersebut telah digunakan, mohon pilih yang lain');
        	$this->form_validation->set_message('min_length', '{field} minimal harus {param} karakter.');

        	$this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('template', 'user/user_tambah', $data);
            }
            else
            {
                $inputan = $this->input->post(null, TRUE);
                $this->user_m->add($inputan);
                if($this->db->affected_rows() > 0)
                {
                	echo "<script>
							alert('Sukses! Data berhasil disimpan');
							window.location='".site_url('user')."';
						</script>";
                }
            }
        }
    }
?>
<?php
    class User_m extends CI_Model {

        public function login($inputan) {
            $this->db->select('*');
            $this->db->from('tb_user');
            $param_where = array(
                'username'  => $inputan['username_login'],
                'password'  => sha1($inputan['password_login']),
            );
            $this->db->where($param_where);
            $query = $this->db->get();
            return $query;
        }

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_user');
            if($id != null) {
                $this->db->where('user_id', $id);
            }
            else {
                $this->db->order_by('user_nama ASC');
            }
            $query = $this->db->get();
            return $query; 
        }

        public function add($inputan) {
            $params = array(
                'user_nama'     => $inputan['user_nama'],
                'user_level'    => $inputan['user_level'],
                'user_alamat'   => $inputan['user_alamat'],
                'username'      => $inputan['username'],
                'password'      => sha1($inputan['password'])
            );
            $this->db->insert('tb_user', $params);
        }

        public function del($user_id) {
            $this->db->where('user_id', $user_id);
            $this->db->delete('tb_user');
        }

        public function edit($inputan) {
            $params = array(
                'user_nama'     => $inputan['user_nama'],
                'user_level'    => $inputan['user_level'],
                'user_alamat'   => $inputan['user_alamat'],
                'username'      => $inputan['username']
            );
            if(!empty($inputan['password'])) {
                $params['password'] = sha1($inputan['password']);
            }
            $this->db->set($params);
            $this->db->where('user_id', $inputan['user_id']);
            $this->db->update('tb_user');
        }
    }
?>
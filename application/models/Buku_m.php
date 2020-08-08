<?php
    class Buku_m extends CI_Model {
        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_buku');
            if($id != null) {
                $this->db->where('id_buku', $id);
            }
            else {
                // $this->db->order_by('judul_buku', 'ASC');
                $this->db->order_by('tahun_terbit ASC, judul_buku ASC');
            }
            $query = $this->db->get();
            return $query;
        }

        public function add($inputan) {
            $param = array(
                'judul_buku'        => $inputan['judul_buku'],
                'pengarang_buku'    => $inputan['pengarang_buku'],
                'tahun_terbit'      => $inputan['tahun_terbit'],
            );
            $this->db->insert('tb_buku', $param);
        }

        public function edit($inputan) {
            $param = array(
                'judul_buku'        => $inputan['judul_buku'],
                'pengarang_buku'    => $inputan['pengarang_buku'],
                'tahun_terbit'      => $inputan['tahun_terbit'],
            );
            $this->db->set($param);
            $this->db->where('id_buku', $inputan['id_buku']);
            $this->db->update('tb_buku');
        }

        public function delete($id) {
            $this->db->where('id_buku', $id);
            $this->db->delete('tb_buku');
        }
    }
?>
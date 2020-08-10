<?php
    class Category_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_category');
            if($id != null) {
                $this->db->where('category_id', $id);
            }
            else {
                $this->db->order_by('category_nama ASC');
            }
            $query = $this->db->get();
            return $query; 
        }

        public function del($category_id) {
            $this->db->where('category_id', $category_id);
            $this->db->delete('tb_category');
        }

        public function add($inputan) {
            $params = array(
                'category_nama'     => $inputan['category_nama'],
                'category_ket'      => empty($inputan['category_ket']) ? null : $inputan['category_ket'],
            );
            $this->db->insert('tb_category', $params);
        }

        public function edit($inputan) {

            $sql = "UPDATE tb_category SET category_nama = ?, category_ket = ?, updated = NOW() WHERE category_id = ?";
            $params = array(
                $inputan['category_nama'],
                empty($inputan['category_ket']) ? null : $inputan['category_ket'],
                $inputan['category_id'],
            );
            $this->db->query($sql, $params);
        }

        function check_item_category($category_id) {
            $this->db->from('tb_item');
            $this->db->where('category_id', $category_id);
            $query = $this->db->get();
            return $query;
        }
    }
?>
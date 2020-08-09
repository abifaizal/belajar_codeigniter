<?php
    class item_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_item');
            if($id != null) {
                $this->db->where('item_id', $id);
            }
            else {
                $this->db->order_by('item_nama ASC');
            }
            $query = $this->db->get();
            return $query; 
        }

        public function del($item_id) {
            $this->db->where('item_id', $item_id);
            $this->db->delete('tb_item');
        }

        public function add($inputan) {
            $params = array(
                'item_nama'     => $inputan['item_nama'],
                'item_ket'      => empty($inputan['item_ket']) ? null : $inputan['item_ket'],
            );
            $this->db->insert('tb_item', $params);
        }

        public function edit($inputan) {

            $sql = "UPDATE tb_item SET item_nama = ?, item_ket = ?, updated = NOW() WHERE item_id = ?";
            $params = array(
                $inputan['item_nama'],
                empty($inputan['item_ket']) ? null : $inputan['item_ket'],
                $inputan['item_id'],
            );
            $this->db->query($sql, $params);
        }
    }
?>
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
                'item_barcode'     => $inputan['item_barcode'],
                'item_nama'     => $inputan['item_nama'],
                'category_id'     => $inputan['category_id'],
                'unit_id'     => $inputan['unit_id'],
                'item_harga'     => $inputan['item_harga'],
            );
            $this->db->insert('tb_item', $params);
        }

        public function edit($inputan) {

            $sql = "UPDATE tb_item SET item_barcode = ?, item_nama = ?, category_id = ?, unit_id = ?, item_harga = ?, updated = NOW() WHERE item_id = ?";
            $params = array(
                $inputan['item_barcode'],
                $inputan['item_nama'],
                $inputan['category_id'],
                $inputan['unit_id'],
                $inputan['item_harga'],
                $inputan['item_id'],
            );
            $this->db->query($sql, $params);
        }
    }
?>
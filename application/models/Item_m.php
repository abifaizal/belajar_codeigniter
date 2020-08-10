<?php
    class item_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_item');
            $this->db->join('tb_category', 'tb_category.category_id = tb_item.category_id');
            $this->db->join('tb_unit', 'tb_unit.unit_id = tb_item.unit_id');
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
                'item_nama'        => $inputan['item_nama'],
                'category_id'      => $inputan['category_id'],
                'unit_id'          => $inputan['unit_id'],
                'item_harga'       => $inputan['item_harga'],
                'item_gambar'      => $inputan['item_gambar'],
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

        function check_barcode($barcode, $id = null) {
            $this->db->from('tb_item');
            $this->db->where('item_barcode', $barcode);
            if($id != null) {
                $this->db->where('item_id !=', $id);
            }
            $query = $this->db->get();
            return $query;
        }
    }
?>
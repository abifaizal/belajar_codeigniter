<?php
    class item_m extends CI_Model {

        public function get($id = null, $stock_type = null) {
            $this->db->select('*');
            $this->db->from('tb_item');
            $this->db->join('tb_category', 'tb_category.category_id = tb_item.category_id');
            $this->db->join('tb_unit', 'tb_unit.unit_id = tb_item.unit_id');
            if($id != null) {
                $this->db->where('item_id', $id);
            }
            if($stock_type != null && $stock_type == 'stock_out') {
                $this->db->where('item_stok > 0');
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
            $params = array(
                'item_barcode'     => $inputan['item_barcode'],
                'item_nama'        => $inputan['item_nama'],
                'category_id'      => $inputan['category_id'],
                'unit_id'          => $inputan['unit_id'],
                'item_harga'       => $inputan['item_harga'],
                'updated'          => date('Y-m-d H:i:s'),
            );
            if($inputan['item_gambar'] != null) {
                $params['item_gambar'] = $inputan['item_gambar'];
            }
            $this->db->where('item_id', $inputan['item_id']);
            $this->db->update('tb_item', $params);
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

        function update_stock_in($inputan) {
            $this->db->set('item_stok', 'item_stok + '.$inputan['stock_qty'], FALSE);
            $this->db->where('item_id', $inputan['item_id']);
            $this->db->update('tb_item');
        }

        function update_stock_out($inputan) {
            $this->db->set('item_stok', 'item_stok - '.$inputan['stock_qty'], FALSE);
            $this->db->where('item_id', $inputan['item_id']);
            $this->db->update('tb_item');
        }
    }
?>
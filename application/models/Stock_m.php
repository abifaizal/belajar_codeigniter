<?php
    class Stock_m extends CI_Model {

        public function get_stock_in() {
            $this->db->select('*');
            $this->db->from('tb_stock');
            $this->db->join('tb_item', 'tb_stock.item_id = tb_item.item_id');
            $this->db->join('tb_unit', 'tb_item.unit_id = tb_unit.unit_id');
            $this->db->join('tb_supplier', 'tb_stock.supplier_id = tb_supplier.supplier_id', 'left');
            $this->db->join('tb_user', 'tb_stock.user_id = tb_user.user_id');
            $this->db->where('stock_type', 'Masuk');
            $this->db->order_by('stock_tanggal ASC');
            $query = $this->db->get();
            return $query; 
        }

        public function del($stock_id) {
            $this->db->where('stock_id', $stock_id);
            $this->db->delete('tb_stock');
        }

        public function add_stock_in($inputan) {
            $params = array(
                'item_id'           => $inputan['item_id'],
                'stock_type'        => 'Masuk',
                'stock_detail'      => empty($inputan['stock_detail']) ? null : $inputan['stock_detail'],
                'supplier_id'       => $inputan['supplier_id'],
                'stock_qty'         => $inputan['stock_qty'],
                'stock_tanggal'     => date('Y-m-d'),
                'user_id'           => $this->fungsi->user_login()->user_id,
                'created'           => date('Y-m-d H:i:s'),
            );
            $this->db->insert('tb_stock', $params);
        }

        function check_item_stock($stock_id) {
            $this->db->from('tb_item');
            $this->db->where('stock_id', $stock_id);
            $query = $this->db->get();
            return $query;
        }
    }
?>
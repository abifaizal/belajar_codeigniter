<?php
    class Stock_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_stock');
            if($id != null) {
                $this->db->where('stock_id', $id);
            }
            else {
                $this->db->order_by('stock_nama ASC');
            }
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
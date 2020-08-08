<?php
    class Supplier_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_supplier');
            if($id != null) {
                $this->db->where('supplier_id', $id);
            }
            else {
                $this->db->order_by('supplier_nama ASC');
            }
            $query = $this->db->get();
            return $query; 
        }

        public function del($supplier_id) {
            $this->db->where('supplier_id', $supplier_id);
            $this->db->delete('tb_supplier');
        }

        public function add($inputan) {
            $params = array(
                'supplier_nama'     => $inputan['supplier_nama'],
                'supplier_hp'       => $inputan['supplier_hp'],
                'supplier_alamat'   => $inputan['supplier_alamat'],
                'supplier_ket'      => empty($inputan['supplier_ket']) ? null : $inputan['supplier_ket'],
            );
            $this->db->insert('tb_supplier', $params);
        }

        public function edit($inputan) {

            $sql = "UPDATE tb_supplier SET supplier_nama = ?, supplier_hp = ?, supplier_alamat = ?, supplier_ket = ?, updated = NOW() WHERE supplier_id = ?";
            $params = array(
                $inputan['supplier_nama'],
                $inputan['supplier_hp'],
                $inputan['supplier_alamat'],
                empty($inputan['supplier_ket']) ? null : $inputan['supplier_ket'],
                $inputan['supplier_id'],
            );
            $this->db->query($sql, $params);
        }
    }
?>
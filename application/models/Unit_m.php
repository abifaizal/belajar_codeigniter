<?php
    class Unit_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_unit');
            if($id != null) {
                $this->db->where('unit_id', $id);
            }
            else {
                $this->db->order_by('unit_nama ASC');
            }
            $query = $this->db->get();
            return $query; 
        }

        public function del($unit_id) {
            $this->db->where('unit_id', $unit_id);
            $this->db->delete('tb_unit');
        }

        public function add($inputan) {
            $params = array(
                'unit_nama'     => $inputan['unit_nama'],
                'unit_ket'      => empty($inputan['unit_ket']) ? null : $inputan['unit_ket'],
            );
            $this->db->insert('tb_unit', $params);
        }

        public function edit($inputan) {

            $sql = "UPDATE tb_unit SET unit_nama = ?, unit_ket = ?, updated = NOW() WHERE unit_id = ?";
            $params = array(
                $inputan['unit_nama'],
                empty($inputan['unit_ket']) ? null : $inputan['unit_ket'],
                $inputan['unit_id'],
            );
            $this->db->query($sql, $params);
        }
    }
?>
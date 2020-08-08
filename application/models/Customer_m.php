<?php
    class Customer_m extends CI_Model {

        public function get($id = null) {
            $this->db->select('*');
            $this->db->from('tb_customer');
            if($id != null) {
                $this->db->where('customer_id', $id);
            }
            else {
                $this->db->order_by('customer_nama ASC');
            }
            $query = $this->db->get();
            return $query; 
        }

        public function del($customer_id) {
            $this->db->where('customer_id', $customer_id);
            $this->db->delete('tb_customer');
        }

        public function add($inputan) {
            $params = array(
                'customer_nama'     => $inputan['customer_nama'],
                'customer_gender'   => $inputan['customer_gender'],
                'customer_hp'       => $inputan['customer_hp'],
                'customer_alamat'   => $inputan['customer_alamat'],
            );
            $this->db->insert('tb_customer', $params);
        }

        public function edit($inputan) {

            $sql = "UPDATE tb_customer SET customer_nama = ?, customer_gender = ?, customer_hp = ?, customer_alamat = ?, updated = NOW() WHERE customer_id = ?";
            $params = array(
                $inputan['customer_nama'],
                $inputan['customer_gender'],
                $inputan['customer_hp'],
                $inputan['customer_alamat'],
                $inputan['customer_id'],
            );
            $this->db->query($sql, $params);
        }
    }
?>
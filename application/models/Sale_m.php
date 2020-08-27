<?php
    class Sale_m extends CI_Model {

        public function get_parent_sale() {
            $this->db->select('*');
            $this->db->from('tb_sale');
            $this->db->join('tb_customer', 'tb_sale.customer_id = tb_customer.customer_id', 'left');
            $this->db->join('tb_user', 'tb_sale.user_id = tb_user.user_id');
            $this->db->order_by('sale_id DESC');
            $query = $this->db->get();
            return $query; 
        }

        public function get_sale_number() {
            $tanggal_pjl = date('Y-m-d');
            $hari= substr($tanggal_pjl, 8, 2);
            $bulan = substr($tanggal_pjl, 5, 2);
            $tahun = substr($tanggal_pjl, 0, 4);
            $tgl = $tahun.$bulan.$hari;

            $query = "SELECT MAX(MID(sale_invoice, 12, 3)) AS invoice_no 
                        FROM tb_sale 
                        WHERE sale_tanggal = CURDATE()";
            $sql = $this->db->query($query);
            if($sql->num_rows() > 0) {
                $index = (int) $sql->row()->invoice_no;
                $new_index = $index + 1;
                $invoice_number = "PJL".$tgl."".str_pad($new_index, 3, "0", STR_PAD_LEFT);
            } else {
                $invoice_number = "PJL".$tgl."001";
            }

            return $invoice_number;
        }

        public function add_parent_sale($inputan) {
            $params = array(
                'sale_invoice'      => $inputan['sale_invoice'],
                'customer_id'       => empty($inputan['customer_id']) ? null : $inputan['customer_id'],
                'sale_tanggal'      => $inputan['sale_tanggal'],
                'sale_total'        => $inputan['sale_subtotal'],
                'sale_diskon'       => $inputan['sale_diskon'],
                'sale_finaltotal'   => $inputan['sale_total'],
                'sale_bayar'        => $inputan['sale_bayar'],
                'user_id'           => $this->fungsi->user_login()->user_id,
            );
            $this->db->insert('tb_sale', $params);
        }

        public function add_detail_sale($inputan) {
            $params = array(
                'item_id'               => $inputan['item_id'],
                'sale_detail_harga'     => $inputan['item_harga'],
                'sale_detail_qty'       => $inputan['item_qty'],
                'sale_detail_total'     => $inputan['item_total'],
                'sale_invoice'          => $inputan['sale_invoice'],
            );
            $this->db->insert('tb_sale_detail', $params);
        }

    }
?>
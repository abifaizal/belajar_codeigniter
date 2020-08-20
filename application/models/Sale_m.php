<?php
    class Sale_m extends CI_Model {

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

    }
?>
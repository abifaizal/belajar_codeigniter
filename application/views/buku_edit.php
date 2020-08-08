<html>
    <title><?php echo $header; ?></title>
    <h2>Halaman Edit Data Buku</h2>
    <a href="<?php echo site_url()."buku"; ?>">
        kembali lihat buku
    </a>
    <style>
        table input.teks {
            width: 200px;
        }
    </style>
    <?php 
        $atribut = array(
            'class'         => 'form-edit-buku',
            'id'            => 'form_editbuku',
            'autocomplete'  => 'off'
        );
        $hidden = array("id_buku" => $buku->id_buku);
        echo form_open('buku/proses', $atribut, $hidden); 
    ?>
        <table>
            <tr>
                <td>
                    <label for="judul_buku">Judul Buku</label>
                </td>
                <td>
                    <?php 
                        $data = array(
                            'name'          => 'judul_buku',
                            'id'            => 'judul_buku',
                            'class'         => 'teks',
                            'value'         => $buku->judul_buku,
                            'required'      => ''
                        );
                        echo form_input($data);
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pengarang_buku">Pengarang Buku</label>
                </td>
                <td>
                    <?php 
                        $data = array(
                            'name'          => 'pengarang_buku',
                            'id'            => 'pengarang_buku',
                            'class'         => 'teks',
                            'value'         => $buku->pengarang_buku,
                            'required'      => ''
                        );
                        echo form_input($data);
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tahun_terbit">Tahun Terbit</label>
                </td>
                <td>
                    <?php 
                        $data = array(
                            'type'          => 'number',
                            'name'          => 'tahun_terbit',
                            'id'            => 'tahun_terbit',
                            'class'         => 'teks',
                            'value'         => $buku->tahun_terbit,
                            'required'      => ''
                        );
                        echo form_input($data);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <?php 
                        $data = array(
                            'type'          => 'submit',
                            'name'          => 'edit_buku',
                            'id'            => 'edit_buku',
                            'value'         => 'Simpan Perubahan'
                        );
                        echo form_input($data);
                    ?>
                </td>
            </tr>
        </table>
    <?php echo form_close(); ?>
</html>
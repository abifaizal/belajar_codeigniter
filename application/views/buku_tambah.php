<html>
    <title><?php echo $header; ?></title>
    <h2>Halaman Tambah Data Buku</h2>
    <a href="<?php echo site_url()."buku"; ?>">
        kembali lihat buku
    </a>
    <?php echo form_open('buku/proses'); ?>
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
                            'value'         => '',
                            'required'      => '',
                            'autofocus'     => ''
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
                            'value'         => '',
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
                            'value'         => '',
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
                            'name'          => 'simpan_buku',
                            'id'            => 'simpan_buku',
                            'value'         => 'Simpan'
                        );
                        echo form_input($data);
                    ?>
                </td>
            </tr>
        </table>
    <?php echo form_close(); ?>
</html>
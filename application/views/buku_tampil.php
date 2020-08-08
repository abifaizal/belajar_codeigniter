<html>
    <title>
        <?php
            echo $header;
        ?>
    </title>
    <style>
        table {
            border-collapse: collapse;
        }
        table th,
        table td {
            padding: 5px;
        }
        .tombol {
            margin-bottom: 5px;
        }
    </style>
    <div class="tombol">
        <a href="<?=site_url('buku/add');?>">
            <button type="button">Tambah Data</button>
        </a>
    </div>
    
    <table border="1">
        <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Opsi</th>
        </tr>
        <?php
            $nomor = 1;
            foreach($buku as $b => $row) {
        ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $row->judul_buku; ?></td>
                    <td><?php echo $row->pengarang_buku; ?></td>
                    <td><?php echo $row->tahun_terbit; ?></td>
                    <td>
                        <a href="<?=site_url('buku/edit/'.$row->id_buku);?>"><button type="button">Edit</button></a>
                        <a href="<?=site_url('buku/delete/'.$row->id_buku);?>" onclick="return confirm('Yakin akan menghapus data ini?')"><button type="button">Hapus</button></a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
</html>
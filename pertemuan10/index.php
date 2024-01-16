<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman ADMIN</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br></br>


    <table border="1" cellpadding="1" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ?' )">hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="50px"></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>


    </table>


</body>

</html>
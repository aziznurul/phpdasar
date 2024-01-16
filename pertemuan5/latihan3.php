<?php
$mahasiswa = [
    ["Aziz Nurul Hidayat ", "12914007", "Oseanografi", "azizfitb@gmail.com"],
    ["Doddy Ferdiansyah ", "12914009", "Oseanografi", "dody@gmail.com"],
    ["Erik ", "12914010", "Oseanografi", "erik@gmail.com"]
];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>

        <ul>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>Nim : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email : <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach ?>
</body>

</html>
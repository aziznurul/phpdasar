<?php
/* $mahasiswa = [
    ["Aziz Nurul Hidayat", "12914007", "azizfitb@gmail.com", "Oseanografi"],
    ["Doddy Ferdiansyah", "12914009", "doddy@gmail.com", "Oseanografi"]
]; */

// Array Associative
// definisinya sama seperti array numerik, kecuali
// Key-nya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nama" => "Aziz Nurul Hidayat",
        "nim" => "12914007",
        "email" => "azizfitb@gmail.com",
        "jurusan" => "Oseanografi",
        "gambar" => "1.png"
    ],
    [
        "nama" => "Doddy Ferdiansyah",
        "nim" => "12914009",
        "email" => "doddy@gmail.com",
        "jurusan" => "Oseanografi",
        "gambar" => "2.png"
    ]
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
            <li>
                <img src="img/<?= $mhs["gambar"]; ?>">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>Nim : <?= $mhs["nim"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>
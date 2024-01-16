<?php
// $_GET
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
    <title>GET</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nim=
                <?= $mhs["nim"]; ?>&email=
                <?= $mhs["email"]; ?>&jurusan=
                <?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?php echo $mhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>


</body>

</html>
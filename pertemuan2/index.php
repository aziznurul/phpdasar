<?php
// Pertemuan 2 - PHP DASAR
// Sintaks PHP

// Standar Output
// echo, print
// print_r
// var_dump

//penulisan sintaks PHP
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variabel dan Tipe data
// Variabel
// Tidak boleh diawali dengan angka, tapi boleh mengandung angka
/* $nama = "Aziz Nurul Hidayat";
echo "Hallo, nama saya $nama"; */

// Operator 
// Aritmatika
// + - * / %
/* $x = 10;
$y = 20;
echo $x * $y; */

// Penggabungan string / concatenation / concat
//
/* $nama_depan = "Aziz Nurul";
$nama_belakang = "Hidayat";

echo $nama_depan . " " . $nama_belakang; */

// Assigment
// = , +=, -=, /=, *=, %=, .=,
/* $x = 1;
$x -= 5;
echo $x; */
/* $nama = "Aziz Nurul";
$nama .= " ";
$nama .= "Hidayat";

echo $nama; */


// Perbandingan
// <, >, <=, =>, ==,
/* var_dump(1 == "1"); */

//Identitas
// ===, !===
/* var_dump(1 === "1"); */

//Logika
// &&, ||, !
$x = 30;
var_dump($x < 20 || $x % 2 == 0);

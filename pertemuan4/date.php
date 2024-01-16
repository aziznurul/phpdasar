<?php
// Date
// Untuk menampilkan tanggal dengan format tertentu
/* echo date("l, d-M-Y"); */

//Time
// UNIX Timestamp / EPOCH time
// detik yang sudah berlalu dari sejak 1 januari 1970
/* echo time(); */

/* echo date("l", time() - 60 * 60 * 24 * 100); */

//mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
/* echo date("l", mktime(0, 0, 0, 11, 13, 1995)); */


//strtotime
/* echo date("l", strtotime("13 November 1995")); */

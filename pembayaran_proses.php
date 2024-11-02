<?php 
include 'koneksi.php';
session_start(); 
$char = 'NIA';
$query=mysqli_query($koneksi,"SELECT max(nia) as max_nia FROM transaksi 
WHERE nia LIKE '{$char}%' ORDER BY nia DESC LIMIT 1");
$data = mysqli_fetch_array($query);
$nia = $data['max_nia'];

//mengambil data menggunakan fungsi subtr, 
//misal data BRG001 akan diambil 001 
$no = substr($nia, -3, 3);

//setelah substring bilangan diambil lantas dicasting menjadi integer
 $no = (int) $no;

//bilangan yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
 $no += 1;

//perintah sprintf("%03s", $no) berguna untuk membuat string menjadi 3 karakter
$newnia = $char . sprintf("%03s", $no);

?>

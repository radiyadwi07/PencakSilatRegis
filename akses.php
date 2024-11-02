<?php 

if(@$_SESSION["admin"]){
    echo '<script language="javascript">alert("Maaf anda Bukan Anggota,"); document.location="admin/index?halaman=beranda";</script>';
}

 ?>
<?php

require_once "../functions.php";
$Id_produk = $_GET['Id_produk'];

if (hapusProduk($Id_produk)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = '../index.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = '../index.php';
            </script>";
}


?>
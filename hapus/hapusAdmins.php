<?php

require_once "../functions.php";
$id = $_GET['id'];

if (hapusAdmins($id)>0){
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
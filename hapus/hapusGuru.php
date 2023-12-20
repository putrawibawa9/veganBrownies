<?php

require_once "../functions.php";
$teacher_id = $_GET['teacher_id'];

if (hapusGuru($teacher_id)>0){
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
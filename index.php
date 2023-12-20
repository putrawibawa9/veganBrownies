<?php
session_start();

if (!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require_once "functions.php";


$students = query("SELECT * FROM students");

$teacher = query("SELECT * FROM teacher");
$admins = query("SELECT * FROM admins");

$keyword = "";

//cari mahasiswa

if(isset($_GET['cari'])){
    $students = cariMahasiswa($_GET['keyword']);
    $keyword = $_GET['keyword'];
}

// if(isset($_POST['cariNama'])){
//     $students = cariMahasiswaNama($_POST['keywordNama']);
// }

//cari guru

if(isset($_GET['cariGuru'])){
    $teacher = cariGuru($_GET['keywordGuru']);
}

// if(isset($_POST['cariNamaGuru'])){
//     $teacher = cariGuruNama($_POST['keywordNamaGuru']);
// }

//cari admin

if(isset($_POST['cariId'])){
    $admins = cariId($_POST['keywordId']);
}

// if(isset($_POST['cariUsername'])){
//     $admins = cariUsername($_POST['keywordUsername']);
// }

if(isset($_POST['backMahasiswa'])){
    $students = query("SELECT * FROM students");
    $keyword = "";
    echo "<script>
    function ButtonMahasiswa() {
      var button = document.getElementById('ButtonMahasiswa');
      button.scrollIntoView({ behavior: 'smooth' });
    }
  </script>";
}

if(isset($_POST['backGuru'])){
    $teacher = query("SELECT * FROM teacher");
    echo "<script>
    function ButtonGuru() { 
      var button = document.getElementById('ButtonGuru');
      button.scrollIntoView({ behavior: 'smooth' });
    }
  </script>";
}

if(isset($_POST['backAdmin'])){
    $admins = query("SELECT * FROM admins");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, .form {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>DAFTAR MAHASISWA</h1>

    <a href="tambahMahasiswa.php">TAMBAH DATA MAHASISWA</a>

<form action="" method="get" class="form">
    <input type="text" name="keyword" autofocus placeholder="cari id/nama " autocomplete="off" 
    value="<?= $keyword;  ?>" >
    <button type="submit" name="cari">Cari</button>
</form>
        <!-- <form action="" method="post" class="form">

            <input type="text" name="keywordNama" autofocus placeholder="cari nama" autocomplete="off" >
            <button type="submit" name="cariNama">Cari</button>
        </form> -->
    <!-- create the header -->
    <table border="1" cellpadding = '10' cellspacing = '0'>
        <tr>
            <th> No</th>
            <th> id</th>
            <th> Aksi</th>
            <th> Nim</th>
            <th> Nama</th>
            <th> Email</th>
            <th> Jurusan</th>
        </tr>
        
        <?php $i =1;?>
        <!-- create the loop -->
        <?php foreach($students as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['no']; ?></td>
            <td>
                <a href="ubah/ubahMahasiswa.php?no=<?=$row['no'];?>">ubah</a> |
                <a href="hapus/hapusMahasiswa.php?no=<?=$row['no'];?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <?php $i++?>
        </tr>
        <?php endforeach; ?>
        </table>
        <form action="" method="post" style="text-align: center;">
        <button type="submit" name="backMahasiswa" id="buttonMahasiswa" onclick="buttonMahasiswa()">Back</button>
    </form>



<h1>DAFTAR GURU</h1>
<a href="tambahGuru.php">TAMBAH DATA GURU</a>
<form action="" method="get" >
    <input type="text" name="keywordGuru" autofocus placeholder="cari guru/mapel" autocomplete="off">
    <button type="submit" name="cariGuru">Cari</button>
</form>
        <!-- <form action="" method="post" class="form">

            <input type="text" name="keywordNamaGuru" autofocus placeholder="cari nama guru" autocomplete="off" >
            <button type="submit" name="cariNamaGuru">Cari</button>
        </form> -->

<!-- create the header -->
<table border="1" cellpadding = '10' cellspacing = '0'>
    <tr>
        <th> No</th>
        <th> id guru</th>
        <th> Aksi</th>
        <th> Nama</th>
        <th> Pelajaran</th>

    </tr>
    
    <?php $i =1;?>
    <!-- create the loop -->
    <?php foreach($teacher as $row): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row['teacher_id']; ?></td>
        <td>
            <a href="ubah/ubahGuru.php?teacher_id=<?=$row['teacher_id'];?>">ubah</a> |
            <a href="hapus/hapusGuru.php?teacher_id=<?=$row['teacher_id'];?>" onclick="return confirm('yakin?');">hapus</a>
        </td>
        <td><?= $row['first_name']; ?></td>
        <td><?= $row['subject_taught']; ?></td>
        <?php $i++?>
    </tr>
    <?php endforeach; ?>

        </table>

        <form action="" method="post" style="text-align: center;  ">
        <button type="submit" name="backGuru" id="buttonGuru" onclick="buttonGuru"()>Back</button>
    </form>


        
<h1>DAFTAR ADMIN</h1>
<a href="tambahAdmins.php">TAMBAH DATA ADMIN</a>
<form action="" method="post" >
    <input type="text" name="keywordId" autofocus placeholder="cari id/username" autocomplete="off" >
    <button type="submit" name="cariId">Cari</button>
</form>
        <!-- <form action="" method="post" class="form">

            <input type="text" name="keywordUsername" autofocus placeholder="cari username" autocomplete="off" >
            <button type="submit" name="cariUsername">Cari</button>
        </form> -->

<!-- create the header -->
<table border="1" cellpadding = '10' cellspacing = '0'>
    <tr>
        <th> No</th>
        <th> id</th>
        <th> username</th>
        <th> password</th>
        <th> Aksi</th>

    </tr>
    
    <?php $i =1;?>
    <!-- create the loop -->
    <?php foreach($admins as $row): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['username']; ?></td>
        <td><?= $row['password']; ?></td>
        <td>
            <a href="ubah/ubahAdmins.php?id=<?=$row['id'];?>">ubah</a> |
            <a href="hapus/hapusAdmins.php?id=<?=$row['id'];?>"onclick="return confirm('yakin?');">hapus</a>
        </td>
        <?php $i++?>
    </tr>
    <?php endforeach; ?>
        </table>


        <form action="" method="post" style="text-align: center;">
        <button type="submit" name="backAdmin">Back</button>
    </form>
</body>
</html>



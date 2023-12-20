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
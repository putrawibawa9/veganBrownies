<?php

$conn =mysqli_connect("localhost","root","","brankas_kacamata");


function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    
    //make an empty array
    $rows = [];

    //loop the $result

    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambahProduk($data) {
    global $conn;
  
    $Nama_produk = $data['Nama_produk'];
    $Foto_produk = $data['Foto_produk'];
    $Stok_produk = $data['Stok_produk'];
    $Deskripsi_produk = $data['Deskripsi_produk'];
    $Harga_produk = $data['Harga_produk'];
  

//make the insert syntax
$query = "INSERT INTO produk VALUES 
            ('','$Nama_produk','$Foto_produk','$Stok_produk','$Deskripsi_produk','$Harga_produk')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function tambahGuru($data) {
    global $conn;
    $no = $data['no'];
    $first_name = $data['first_name'];
    $subject_taught = $data['subject_taught'];
  ;

//make the insert syntax
$query = "INSERT INTO teacher VALUES 
            ('','$first_name','$subject_taught')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function tambahAdmins($data) {
    global $conn;
    $no = $data['no'];
    $username = $data['username'];
    $password = $data['password'];
    $id = $data['id'];
  ;

//make the insert syntax
$query = "INSERT INTO admins VALUES 
            ('$username','$password','$id')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}



function hapusProduk($Id_produk){
  global $conn;
  mysqli_query($conn,"DELETE FROM produk WHERE Id_produk = $Id_produk");
  return mysqli_affected_rows($conn);
}



function hapusGuru($teacher_id){
  global $conn;
  mysqli_query($conn,"DELETE FROM teacher WHERE teacher_id = $teacher_id");
  return mysqli_affected_rows($conn);
}

function hapusAdmins($id){
  global $conn;
  mysqli_query($conn,"DELETE FROM admins WHERE id = $id");
  return mysqli_affected_rows($conn);
}


function ubahProduk($data){
  global $conn;
  $Id_produk = $data['Id_produk'];
  $Nama_produk = $data['Nama_produk'];
  $Foto_produk = $data['Foto_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];

//make the insert syntax
$query = "UPDATE produk SET
        Nama_produk = '$Nama_produk',
        Foto_produk = '$Foto_produk',
        Stok_produk = $Stok_produk,
        Deskripsi_produk = '$Deskripsi_produk',
        Harga_produk = $Harga_produk
        WHERE Id_produk =$Id_produk
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}



function ubahGuru($data){
  global $conn;
  $first_name = $data['first_name'];
  $subject_taught = $data['subject_taught'];
  $teacher_id = $data['teacher_id'];


//make the insert syntax
$query = "UPDATE teacher SET
        first_name = '$first_name',
        subject_taught = '$subject_taught'
        WHERE teacher_id =$teacher_id
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function ubahAdmins($data){
  global $conn;
  $id = $data['id'];
  $username = $data['username'];
  $password = $data['password'];


//make the insert syntax
$query = "UPDATE admins SET
        username = '$username',
        password = '$password'
        WHERE  id = $id
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}




function cariMahasiswa($keyword){
  $query = "SELECT * FROM students
            WHERE
            nim like '%$keyword%' OR
            nama like '%$keyword%'";
      return query($query);
}

// function cariMahasiswaNama($keywordNama){
//   $query = "SELECT * FROM students
//             WHERE
//             nama LIKE '%$keywordNama%'";
//       return query($query);
// }




function cariGuru($keywordGuru){
  $query = "SELECT * FROM teacher
            WHERE
            first_name LIKE '%$keywordGuru%' OR
            subject_taught LIKE  '%$keywordGuru%'";
      return query($query);
}

// function cariGuruNama($keywordNamaGuru){
//   $query = "SELECT * FROM teacher
//             WHERE
//             first_name = '$keywordNamaGuru'";
//       return query($query);
// }



//admin

function cariId($keywordId){
  $query = "SELECT * FROM admins
            WHERE
            id LIKE '%$keywordId%' OR
            username LIKE '%$keywordId%'" ;
      return query($query);
}


// function cariUsername($keywordUsername){
//   $query = "SELECT * FROM admins
//             WHERE
//             username = '$keywordUsername'";
//       return query($query);
// }

function regristrasi($data){
  global $conn;
  $Nama_pelanggan = strtolower(stripslashes($data['Nama_pelanggan'])); 
  $Alamat_pelanggan = $data['Alamat_pelanggan']; 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT Nama_pelanggan FROM pelanggan WHERE Nama_pelanggan = '$Nama_pelanggan';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }

  //enkripsi passrod
  // $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO pelanggan VALUES('','$password','$Nama_pelanggan','', '$Alamat_pelanggan')");
  return mysqli_affected_rows($conn);
}



function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile =  $_FILES['gambar']['size'];
  $error =  $_FILES['gambar']['error'];  
  $tmp =  $_FILES['gambar']['tmp_name'];  

  //cek apakah user sudah menambah gambar

  if($error ===4){
    echo "<script>
        alert ('pilih gambar dulu');
          </script>";
          return false;
  }

  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid =['jpg','jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile); 
  $ekstensiGambar = strtolower(end($ekstensiGambar)); 
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
        alert ('format gambar salah!');
          </script>";
          return false;
  }

  //cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000){
    echo "<script>
        alert ('Ukuran terlalu besar');
          </script>";
  }

  //generate nama file random
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  //lolos semua hasil cek, lalu dijalankan
  move_uploaded_file($tmp, 'img/'.$namaFileBaru);

  return $namaFileBaru;


}
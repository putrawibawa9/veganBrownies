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


function tambahMahasiswa($data) {
    global $conn;
  
    $no = $data['no'];
    $nama = $data['nama'];
    $email = $data['email'];
    $jurusan = $data['jurusan'];

//make the insert syntax
$query = "INSERT INTO students VALUES 
            ('$no','','$nama','$email','$jurusan')";

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



function hapusMahasiswa($no){
  global $conn;
  mysqli_query($conn,"DELETE FROM students WHERE no = $no");
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


function ubahMahasiswa($data){
  global $conn;
  $no = $data['no'];
  $nama = $data['nama'];
  $email = $data['email'];
  $jurusan = $data['jurusan'];
  $nim = $data['nim'];

//make the insert syntax
$query = "UPDATE students SET
        no = $no,
        nim = $nim,
        nama = '$nama',
        email = '$email',
        jurusan = '$jurusan'
        WHERE nim =$nim
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
  $password = mysqli_real_escape_string($conn,$data['password']); 
  $password2 = mysqli_real_escape_string($conn,$data['password2']); 

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
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO pelanggan VALUES('','$username', '$password')");
  return mysqli_affected_rows($conn);
}

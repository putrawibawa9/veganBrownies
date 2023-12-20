<?php
session_start();
if (!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
require_once "functions.php";




//check whether the button has been click or not
if(isset($_POST['submit'])){

    
    //check the progress
    if (tambahAdmins($_POST)>0){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'index.php';
        </script>
    ";

    }








}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamabah data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<h1>Tambah Admin</h1>

<form action="" method="post">
<ul>
    <li>
        <label for="no">no :</label>
        <input type="text" name="no" id="no" required  >
    </li>
    <li>
        <label for="username">username :</label>
        <input type="text" name="username" id="username" required >
    </li>
    <li>
        <label for="password">password :</label>
        <input type="text" name="password" id="password" required >
    </li>
    <button type="submit" name="submit">Post</button>
    <a href="index.php">back</a>
</ul>

</form>


</body>
</html>
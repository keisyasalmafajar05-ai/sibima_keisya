<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $query=mysqli_query($conn,"SELECT * FROM users
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($query)>0){

        $data=mysqli_fetch_assoc($query);

        $_SESSION['nama']=$data['nama'];
        $_SESSION['role']=$data['role'];

        header("Location: dashboard.php");
        exit;

    }else{

        echo "<script>
        alert('Username atau Password Salah');
        </script>";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login SIBIMA</title>

<style>

body{
font-family:Arial;
background:#dbeafe;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.login{

width:350px;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0px 0px 10px gray;

}

input{

width:100%;
padding:10px;
margin-top:10px;
margin-bottom:15px;

}

button{

width:100%;
padding:10px;
background:#2563eb;
color:white;
border:none;

}

</style>

</head>

<body>

<div class="login">

<h2 align="center">SIBIMA</h2>

<form method="POST">

Username

<input type="text" name="username" required>

Password

<input type="password" name="password" required>

<button name="login">Login</button>

</form>

</div>

</body>

</html>

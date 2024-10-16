<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "order_db";

$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn){
    die("koneksi gagal:".
    mysqli_connect_error());
}
?>
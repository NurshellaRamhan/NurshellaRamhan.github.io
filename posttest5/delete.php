<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "order_db"; 

    $connection = new mysqli($host, $user, $password, $db);

    $sql = "DELETE FROM order_box WHERE id=$id";
    $connection->query($sql);
}

header("location: index.php");
exit;
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $rate = htmlspecialchars($_POST['rate']);
    $review = htmlspecialchars($_POST['review']);

    // Menampilkan hasil inputan
    echo "<h2>The Review </h2>";
    echo "Nama: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Rating: " . $rate . "<br>";
    echo "Review: " . nl2br($review) . "<br>";
} else {
    echo "Form belum di-submit!";
}
?>

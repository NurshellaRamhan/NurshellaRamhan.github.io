<?php
require "koneksi.php";

if (isset($_POST['tambah'])) { // Mengecek apakah $_POST['tambah'] bernilai true
  $foto = $_POST['foto']; // mengambil data dari form fto
  $name = $_POST['name']; // Mengambil data dari form nama
  $email = $_POST['email']; // mengambil data dari email
  $password = $_POST['password']; // mengambil data dari password
  $order = $_POST['flower_order']; // mengambil data dari order
  $price = $_POST['flower_price']; // mengambil data dari price
  $message = $_POST['message']; // mengambil data dari form message
  $payment = $_POST['payment_method']; // mengambil data dari form payment


  $tmp_name = $_FILES['foto']['tmp_name'];
  $file_name = $_FILES['foto']['name'];


  $validExtension = ['jpg', 'jpeg', 'png'];
  $fileExtension = explode('.', $file_name);
  $fileExtension = strtolower(end($fileExtension));
  if(!in_array($fileExtension, $validExtension)) {
    echo "
          <script>
              alert('File yang diupload bukan gambar!');
              document.location.href = 'CRUD.php';
          </script>";
          exit;
    
  } else{
    $newFileName =  date('d-m-y'). '-' . $file_name;
    if(move_uploaded_file($tmp_name,'images/' .$newFileName)) {
      $sql = "INSERT INTO order_box (id, foto, name, email, password, flower_order, flower_price, message, payment_method) 
              VALUES (null, '$newFileName', '$name', '$email', '$password', '$order', '$price', '$message', '$payment')";
      $result = mysqli_query($conn, $sql);

      if($result) {
        echo "
          <script>
              alert('adding client data was successful');
              document.location.href = 'CRUD.php';
          </script>" ;
        } else {
          echo "
          Error: " . mysqli_error($conn);
        }
    } else {
      echo "
        <script>
            alert('Data gagal ditambahkan: " . mysqli_error($conn) . "');
            document.location.href = 'CRUD.php';
        </script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posttest6</title>
    <script src="https://kit.fontawesome.com/829fdc7544.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="crud.css">
</head>

<body>
        <div class="container">
            <a href="CRUD.php">
                <button class="back">
                <p>Back</p>
                </button>
            </a>
        </div>

    <!-- review section start -->
    <section class="review" id="review">

        <form method="POST" action="tambah.php" enctype="multipart/form-data">
            <h1>Order Box</h1>
            <div class="input-field">
                <label for="name">Product Image <sup>*</sup></label><br>
                <input type="file" id="foto" name="foto" accept="images/*" required>
                <span>input jpg, jpeg, png format here <sup>*</sup></span>
            </div>
            <div class="input-field">
                <label for="name">Your Name <sup>*</sup></label><br>
                <input type="text" id="name" name="name" value="" placeholder= "enter your name" required>
            </div>
            <div class="input-field">
                <label for="email">Your Email <sup>*</sup></label><br>
                <input type="email" id="email" name="email" value="" placeholder= "enter your email" required>
            </div>
            <div class="input-field">
                <label for="password">Password <sup>*</sup></label><br>
                <input type="password" id="password" name="password" value="" placeholder= "enter your password" required>
            </div>
            <div class="input-field">
                <label for="order">Flower Order <sup>*</sup></label><br>
                <input type="text" id="flower_order" name="flower_order"  placeholder="write your flower order" required>

            </div>
            <div class="input-field">
                <label for="price">Flower Price <sup>*</sup></label><br>
                <input type="number" id="flower_price" name="flower_price" min="1" max="5" value="" placeholder= "enter your price's flower" required>
            </div>
            <div class="input-field">
                <label for="message">Message <sup>*</sup></label><br>
                <textarea id="message" name="message" cols="30" rows="10" value=" echo $message; ?>" required></textarea>
            </div>
            <div class="input-field">
                <label for="payment">Payment Method<sup>*</sup></label><br>
                <select id="payment_method" name="payment_method" value=" echo $payment; ?>">
                    <option value="COD">COD</option>
                    <option value="Debit">Debit Card</option>
                    <option value="Credit">Credit Card</option>
                    <option value="Ovo">Ovo</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Pay Later">Pay Later</option>
                </select>
            </div>

            <input class="btn" type="submit" value="Order Now" name="tambah">
            
        </form>
        <div id="result" class="result"></div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
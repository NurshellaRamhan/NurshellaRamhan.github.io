<?php
    require "koneksi.php"; // Memanggil file koneksi ke database

    // Check if 'id' is set in URL
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<script>alert('ID is missing'); document.location.href = 'CRUD.php';</script>";
        exit;
    }

    // Mengambil ID dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data berdasarkan ID
    $result = mysqli_query($conn, "SELECT * FROM order_box WHERE id = $id");

    // Check if data exists
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<script>alert('No data found or invalid ID'); document.location.href = 'CRUD.php';</script>";
        exit;
    }

    // Mengambil data dari hasil query
    $order_box = mysqli_fetch_assoc($result);

    // Jika tombol submit ditekan
    if (isset($_POST['ubah'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $flower_order = $_POST['flower_order'];
        $flower_price = $_POST['flower_price'];
        $message = $_POST['message'];
        $payment_method = $_POST['payment_method'];
        $oldImg = $_POST['oldimg']; // Menyimpan nama file gambar lama

        // Fungsi untuk mengupdate data order
        function updateOrderBox($conn, $id, $name, $email, $password, $flower_order, $flower_price, $message, $payment_method, $file_name) {
            $stmt = $conn->prepare("UPDATE order_box SET name=?, email=?, password=?, flower_order=?, flower_price=?, message=?, payment_method=?, foto=? WHERE id=?");
            $stmt->bind_param('ssssssssi', $name, $email, $password, $flower_order, $flower_price, $message, $payment_method, $file_name, $id);
            $result = $stmt->execute();

            // Cek apakah update berhasil
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'CRUD.php'; // Redirect ke halaman utama
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'CRUD.php'; // Redirect ke halaman utama
                </script>";
            }
        }

        // Jika tidak ada file baru yang diupload
        if (empty($_FILES['foto']['name'])) {
            $file_name = $oldImg; // Menggunakan gambar lama
            updateOrderBox($conn, $id, $name, $email, $password, $flower_order, $flower_price, $message, $payment_method, $file_name);
        } else {
            // Jika ada file yang diupload
            $tmp_name = $_FILES['foto']['tmp_name']; // Lokasi sementara file
            $file_name = $_FILES['foto']['name']; // Nama file

            // Cek apakah file yang diupload adalah gambar
            $validExtensions = ['png', 'jpg', 'jpeg'];
            $fileExtension = explode('.', $file_name);
            $fileExtension = strtolower(end($fileExtension));

            if (!in_array($fileExtension, $validExtensions)) {
                echo "
                    <script>
                        alert('Please upload a valid image file (jpg, jpeg, png)');
                        document.location.href = 'edit.php?id=$id'; // Reload the page
                    </script>";
                exit;
            } else {
                $newFileName = date('d-m-Y') . '-' . $file_name; // Memberikan nama baru berdasarkan tanggal
                move_uploaded_file($tmp_name, 'images/' . $newFileName); // Memindahkan file ke folder images
                unlink('images/'.$oldImg); // Menghapus gambar lama dari folder
                updateOrderBox($conn, $id, $name, $email, $password, $flower_order, $flower_price, $message, $payment_method, $newFileName);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Box</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Form edit order box -->
    <section class="review" id="review">
        <form method="POST" action="" enctype="multipart/form-data">
            <h1>Edit Order Box</h1>

            <!-- Input hidden untuk menyimpan nama gambar lama -->
            <input type="hidden" name="oldimg" value="<?= $order_box['foto'] ?>">

            <!-- Field untuk mengubah gambar produk -->
            <div class="input-field">
                <label for="foto">Product Image <sup>*</sup></label><br>
                <input type="file" id="foto" name="foto" accept="image/*">
                <br>
                <img src="images/<?= $order_box['foto'] ?>" alt="<?= $order_box['foto'] ?>" width="80px" height="100px">
                <span>input jpg, jpeg, png format here <sup>*</sup></span>
            </div>

            <!-- Field untuk nama pengguna -->
            <div class="input-field">
                <label for="name">Your Name <sup>*</sup></label><br>
                <input type="text" id="name" name="name" value="<?= $order_box['name'] ?>" required>
            </div>

            <!-- Field untuk email pengguna -->
            <div class="input-field">
                <label for="email">Your Email <sup>*</sup></label><br>
                <input type="email" id="email" name="email" value="<?= $order_box['email'] ?>" required>
            </div>

            <!-- Field untuk password pengguna -->
            <div class="input-field">
                <label for="password">Password <sup>*</sup></label><br>
                <input type="password" id="password" name="password" value="<?= $order_box['password'] ?>" required>
            </div>

            <!-- Field untuk pesanan bunga -->
            <div class="input-field">
                <label for="flower_order">Flower Order <sup>*</sup></label><br>
                <input type="text" id="flower_order" name="flower_order" value="<?= $order_box['flower_order'] ?>" required>
            </div>

            <!-- Field untuk harga bunga -->
            <div class="input-field">
                <label for="flower_price">Flower Price <sup>*</sup></label><br>
                <input type="number" id="flower_price" name="flower_price" value="<?= $order_box['flower_price'] ?>" required>
            </div>

            <!-- Field untuk pesan -->
            <div class="input-field">
                <label for="message">Message <sup>*</sup></label><br>
                <textarea id="message" name="message" cols="30" rows="10" required><?= $order_box['message'] ?></textarea>
            </div>

            <!-- Field untuk metode pembayaran -->
            <div class="input-field">
                <label for="payment_method">Payment Method<sup>*</sup></label><br>
                <select id="payment_method" name="payment_method" required>
                    <option value="<?= $order_box['payment_method'] ?>" selected><?= $order_box['payment_method'] ?></option>
                    <option value="COD">COD</option>
                    <option value="Debit">Debit Card</option>
                    <option value="Credit">Credit Card</option>
                    <option value="Ovo">Ovo</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Pay Later">Pay Later</option>
                </select>
            </div>

            <!-- Tombol submit -->
            <input class="btn" type="submit" value="Ubah" name="ubah">
        </form>
    </section>
</body>

</html>

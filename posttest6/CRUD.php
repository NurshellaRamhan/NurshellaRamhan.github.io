<?php
  require "koneksi.php";

  // Untuk melakukan perintah SQL
  $sql = mysqli_query($conn, "SELECT * FROM order_box");

  // Menyiapkan array assosiatif
  $client = [];
  // Memindahkan data dari $sql ke array rows
  while ($row = mysqli_fetch_assoc($sql)) {
      $client[] = $row;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | List Orders</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="base.css" />
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="admin.css">
</head>

<body>

  <main class="data-mahasiswa-section">
    <h1 class="data-mahasiswa-title">
    List of order's clients
    </h1>

    <div>
      <?php
      date_default_timezone_set('Asia/Makassar');
      echo "Tanggal : " . date("d/m/Y h:i:sa");
      ?>
    </div>

    <div class="container">
      <a href="tambah.php">
        <button class="tambah">
          <p>Tambah</p>
        </button>
      </a>
      <a href="index.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

    <table class="table-mahasiswa">
        <thead>
            <tr class="table-mahasiswa-row">
                <th class="table-mahasiswa-header">Id</th>
                <th class="table-mahasiswa-header">Product Image</th>
                <th class="table-mahasiswa-header">Nama</th>
                <th class="table-mahasiswa-header">Email</th>
                <th class="table-mahasiswa-header">Password</th>
                <th class="table-mahasiswa-header">Order</th> <!-- Kolom baru untuk Order -->
                <th class="table-mahasiswa-header">Price</th>
                <th class="table-mahasiswa-header">Message</th>
                <th class="table-mahasiswa-header">Payment</th>
                <th class="table-mahasiswa-header">Action</th>
            </tr>
        </thead>

        <tbody>
          <?php $i = 1; foreach($client as $cli) : ?>
          <tr>
              <td class="table-mahasiswa-data"><?php echo $cli['id']; ?></td>
              <td class="table-mahasiswa-data"><img src="images/<?php echo $cli['foto']; ?>" width="100px"></td>
              <td class="table-mahasiswa-data"><?php echo $cli['name']; ?></td>
              <td class="table-mahasiswa-data"><?php echo $cli['email']; ?></td>
              <td class="table-mahasiswa-data"><?php echo $cli['password']; ?></td>
              <td class="table-mahasiswa-data"><?php echo $cli['flower_order']; ?></td>
              <td class="table-mahasiswa-data"><?php echo $cli['flower_price']; ?></td>
              <td class="table-mahasiswa-data"><?php echo $cli['message']; ?></td>
              <td class="table-mahasiswa-data"><?php echo $cli['payment_method']; ?></td>
              <td class="table-mahasiswa-data">
              <div class="button-UD">
                <a href="edit.php?id=<?php echo $cli['id']?>">
                  <button class="edit-data">
                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                  </button>
                </a>
                <a href="delete.php?id=<?php echo $cli['id']?>" 
                onclick="return confirm('Are you sure want remove');">
                  <button class="hapus-data">
                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                  </button>
                </a>
              </div>
            </td>
          </tr>
          <?php $i++; endforeach; ?>
</tbody>

    </table>
  </main>

  <script src="/scripts/script.js"></script>
</body>

</html>

<?php
    require "koneksi.php"; // Hubungkan ke database

    // Ambil id dari URL
    $id = $_GET['id'];

    // Ambil data dari tabel 'order_box' berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM order_box WHERE id=$id");
    $order = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $order[] = $row;
    }

    // Hapus file foto yang terkait
    unlink('images/' . $order[0]['foto']);

    // Query untuk menghapus data dari tabel 'order_box'
    $result = mysqli_query($conn, "DELETE FROM order_box WHERE id = $id");

    // Cek apakah penghapusan berhasil
    if ($result) {
        echo "
        <script>
            alert('Delete Success!');
            document.location.href = 'CRUD.php'; // Kembali ke halaman utama
        </script>";
    } else {
        echo "
        <script>
            alert('Failed to delete!');
            document.location.href = 'CRUD.php'; // Kembali ke halaman utama
        </script>";
    }
?>

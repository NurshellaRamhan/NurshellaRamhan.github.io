<?php
require 'koneksi.php';

if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    
    $sql = "SELECT * FROM order_box WHERE name LIKE '%$query%' OR flower_order LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($result)): ?>
        <h2>Search Results</h2>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div>
                <h3><?php echo $row['name']; ?></h3>
                <p>Order: <?php echo $row['flower_order']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</body>
</html>

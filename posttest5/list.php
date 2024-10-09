<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="index.php" role="button">Add More Clients</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Flower Order</th>
                    <th>Price</th>
                    <th>Message</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = "localhost";
                $user = "root";
                $password = "";
                $db = "order_db";

                $connection = new mysqli($host, $user, $password, $db);

                if ($connection->connect_error) {
                    die("connection failed: " . $connection->connect_error);
                }

                // read all row database
                $sql = "SELECT * FROM order_box";
                $result = $connection->query($sql);

                if (!$result) {
                    die("invalid query: " . $connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[password]</td>
                        <td>$row[flower_order]</td>
                        <td>$row[price]</td>
                        <td>$row[message]</td>
                        <td>$row[payment]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/posttest4/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/posttest4/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                
                ?>

                <tr>
                    <td>10</td>
                    <td>Bill Gates</td>
                    <td>bill.gates@gmail.com</td>
                    <td>111</td>
                    <td>Red Rose</td>
                    <td>150.000</td>
                    <td>Nothing</td>
                    <td>COD</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/posttest4/edit.php">Edit</a>
                        <a class="btn btn-danger btn-sm" href="/posttest4/delete.php">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
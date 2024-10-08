<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "order_db"; 

$connection = new mysqli($host, $user, $password, $db);


$id = "";
$name = "";
$email = "";
$password = "";
$order = "";
$price = "";
$message = "";
$payment = "";

$errorMessage = "";
$succesMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ( !isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }
    $id = $GET["id"];
    $sql = "SELECT*FROM order_box WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }
    $name = $_POST["name"];
    $email =  $_POST["email"];
    $password =  $_POST["password"];
    $order =  $_POST["order"];
    $price = (float)$_POST["price"];  // Cast price to float
    $message =  $_POST["message"];
    $payment =  $_POST["payment"];

}
else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email =  $_POST["email"];
    $password =  $_POST["password"];
    $order =  $_POST["order"];
    $price = (float)$_POST["price"];  // Cast price to float
    $message =  $_POST["message"];
    $payment =  $_POST["payment"];

    do {
        if (empty($name) || empty($email) || empty($password) || empty($order) || empty($price) || empty($message) || empty($payment) ) {
            $errorMessage = "All the fields are required";
            break;
        }
        $sql = "UPDATE order_box " . 
               "SET name = '$name', email = '$email', password = '$password', flower_order = '$order', flower_price = '$price', message = '$message', payment_method = '$payment' " .
               "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
                
        $successMessage = "Client updated correctly";
                
        header("location: index.php");
        exit;
                
    } while (true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posttest4</title>
    <script src="https://kit.fontawesome.com/829fdc7544.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
"></script>
</head>
</head>

<body>
    <!-- header section start -->
    <header>
        <a href="#home" class="logo"><img src="image/logo-toko.png" alt="" width="100"></a>
        <div class="navbar">
            <a href="#home">Home</a>
            <a href="#about">About Me</a>
            <a href="#shop">Product</a>
            <a href="#review">Order Flower</a>

        </div>
        <div class="icon">
            <i class="fa-brands fa-square-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-whatsapp"></i>
            <div id="menu-bar" class="fa  fa-bars"></div>
        </div>
        <div class="mode-switch">
            <button id="modeToggle">Switch to Dark Mode</button>
        </div>

    </header>
    <!-- home section start -->
    <section class="home" id="home">
        <div class="detail">
            <span>top trend</span>
            <h1>Give Emotions </h1>
            <h1>To Your Beloved Ones</h1>
            <p>Make a bouquet and pick up a gift with your wishes</p>
            <P>Deliver to any corner of the city.</p>
            <a href="#shop" class="btn">Pick Your Flower</a>
        </div>
    </section>

    </section>
    <!-- about section start -->
    <div class="about" id="about">
        <div class="row">
            <div class="box">
                <img src="foto shella.jpg" alt="" class="img">
            </div>
            <div class="content">
                <span>introduction</span>
                <h3>About Me</h3>
                <p>Hi! My name is Dyah Ayu Nurshella Ramhan. I'm currently Studying in Universitas Mulawarman majoring
                    Informatics. I have a strong interest in data analytics, machine learning, user interface/user
                    experience (UI/UX) design and graphic design. My skills include problem solving, critical thinking,
                    time work, time management, and a desire to explore new knowledge. I am committed to delivering
                    innovative and intuitive solutions, and I am always looking for opportunities to grow and
                    collaborate with results-oriented teams.
                    Let's collaborate with me we can develop our skills and social connections.</p>
                <div class="buttons">
                    <a href="#review" class="btn">shop now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- shop section start -->
    <div class="shop" id="shop">
        <h1 class="heading">our best products</h1>
        <div class="box-container">
            <div class="box">
                <img src="image/poduct.jpg" alt="">
                <p class="price">price : Rp.150.000 /-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product0.jpg" alt="">
                <p class="price">price : Rp.255.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product1.jpg" alt="">
                <p class="price">price : Rp.150.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product2.jpg" alt="">
                <p class="price">price : Rp.150.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product3.jpg" alt="">
                <p class="price">price : Rp.1.350.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product4.jpg" alt="">
                <p class="price">price : Rp.1.350.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product5.jpg" alt="">
                <p class="price">price : Rp.150.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product6.jpg" alt="">
                <p class="price">price : Rp.150.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <div class="box">
                <img src="image/product7.jpg" alt="">
                <p class="price">price : Rp.150.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <!-- product item -->
            <div class="box">
                <img src="image/product8.jpg" alt="">
                <p class="price">price : Rp.350.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <!-- product item -->
            <!-- product item -->
            <div class="box">
                <img src="image/product9.jpg" alt="">
                <p class="price">price : Rp.150.000/-</p>
                <div class="detail">
                    <h1 class="heading">red rose flowers</h1>
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-cart-plus"></i>
                        <i class="fa fa-eye"></i>

                    </div>
                </div>
            </div>
            <!-- product item -->
        </div>
    </div>

    <!-- review section start -->
    <section class="review" id="review">

        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="POST" action="index.php" id="review-form">
            <input type="hidden" name= "id" value="<?php echo $id; ?>">
            <h1>Order Box</h1>
            <div class="input-field">
                <label for="name">Your Name <sup>*</sup></label><br>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="input-field">
                <label for="email">Your Email <sup>*</sup></label><br>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-field">
                <label for="password">Password <sup>*</sup></label><br>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="input-field">
                <label for="order">Flower Order <sup>*</sup></label><br>
                <input type="text" id="order" name="order" min="1" max="5" value="<?php echo $order; ?>" required>
            </div>
            <div class="input-field">
                <label for="price">Flower Price <sup>*</sup></label><br>
                <input type="number" id="price" name="price" min="1" max="5" value="<?php echo $price; ?>" required>
            </div>
            <div class="input-field">
                <label for="message">Message <sup>*</sup></label><br>
                <textarea id="message" name="message" cols="30" rows="10" value="<?php echo $message; ?>" required></textarea>
            </div>
            <div class="input-field">
                <label for="payment">Payment Method<sup>*</sup></label><br>
                <select id="payment" name="payment" value="<?php echo $payment; ?>">
                    <option value="COD">COD</option>
                    <option value="Debit">Debit Card</option>
                    <option value="Credit">Credit Card</option>
                    <option value="Ovo">Ovo</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Pay Later">Pay Later</option>
                </select>
            </div>

            <?php
            if (!empty($succesMessage)) {
                echo '
                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>' . $succesMessage . '</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                    </div>
                </div>
                ';
            }
            ?>
            <button type="button" class="btn" onclick="window.location.href='list.php'">Order Now</button>
        </form>
        <div id="result" class="result"></div>
    </section>



    </section>

    <footer>
        <div class="content">
            <div class="box">
                <img src="image/logo-toko.png" alt="">
                <h3>Link</h3>
                <a href="#home">Home</a>
                <a href="#about">About Me</a>
                <a href="#shop">Product</a>
                <a href="#review">Order Flower</a>
            </div>
            <div class="box">
                <h3>help & information</h3>
                <a href="">help center</a>
                <a href="">address store</a>
                <a href="">privacy policy</a>
                <a href="">reveiver</a>
                <a href="">our store</a>
            </div>
            <div class="box">
                <h3>about us</h3>
                <a href="">contact us</a>
                <a href="">about us</a>
                <a href="">our shop</a>
            </div>
            <div class="box">
                <h3>get in touch</h3>
                <p>Phone : +6281347637212</p>
                <p>E-mail : shelladyahayunurshella@gmail.com</p>
                <p>Location : Sambutan, Kalimantan Timur</p>
                <div class="icon">
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
            </div>
        </div>
        <div class="bottom">
            <p>copyright @ 2024 <span>code with shella.</span>All Rights Reserved</p>
        </div>
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
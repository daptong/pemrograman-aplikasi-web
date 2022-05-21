<?php
    session_start();

    include_once("customer-check-login.php");

    $profile_username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profile | SISCKA-E</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="icon" href="../images/favicon.ico">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/fontawesome.css">
    <link rel="stylesheet" href="../css/style.css">

    <script>
        $(document).ready(function() {
            $("#orderSaved").modal('show');
        });
    </script>
</head>

<div id="orderSaved" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hi, <?php echo $profile_username ?></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="javascript:window.location='customer-order.php'">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Your order was successfully placed and is waiting to be processed.</h6>
            </div>
        </div>
    </div>
</div>

<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-7">
                <ul class="info">
                    <li><a href="#"><i class="fa fa-envelope"></i>admin@sisckae.com</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i>123-456-789</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-4 col-5">
                <ul class="username">
                    <li><a>Logged in as <?php echo "" . $profile_username ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="customer-home.php" class="logo">
                        <img src="../images/sisckae.png" alt="">
                    </a>
                    <ul class="nav">
                        <li><a href="">Home</a></li>
                        <li><a href="customer-order.php" class="active">Order Laundry</a></li>
                        <li><a href="customer-check-laundry.php">Check Laundry</a>
                        <li><a href="customer-check-packet.php">Check Packet</a></li>
                        <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
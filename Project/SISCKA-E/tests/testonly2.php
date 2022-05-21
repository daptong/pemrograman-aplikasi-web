<?php
require_once("test-connector.php");
session_start();

include_once("test-check-login.php");

$profile_username = $_SESSION['username'];
$profile_id = $_SESSION['pelanggan_id'];

// get customer name
$stmt = $db->query("SELECT nama FROM pelanggan WHERE pelanggan_id='$profile_id'");
$temp = $stmt->fetch(PDO::FETCH_ASSOC);
$nama = $temp['nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Laundry | SISCKA-E</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="icon" href="images/favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="js/price.js"></script>
    <script src="js/save.js"></script>

    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/style.css">
</head>

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
                    <li><a>Logged in as <?php echo $profile_username ?></a></li>
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
                    <a href="test-index.php" class="logo">
                        <img src="images/12312.png" alt="">
                    </a>
                    <ul class="nav">
                        <li><a href="test-customer-home.php">Home</a></li>
                        <li><a href="" class="active">Order Laundry</a></li>
                        <li><a href="test-customer-check-packet.php">Check Laundry</a></li>
                        <li><a href="test-logout.php">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<section class="order-laundry" id="order-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8"></div>
            <div class="col-lg-4">
                <form id="order" action="" method="POST">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h4>Order</h4>
                        </div>
                    </div>
                    <p>Laundry apa?</p>
                    <div class="select">
                        <select name="namalaundry" id="namalaundry" onchange="getValueOne()">
                            <option value=""></option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Bed Cover">Bed Cover</option>
                            <option value="Bantal">Bantal</option>
                            <option value="Selimut">Selimut</option>
                        </select>
                    </div>
                    <p>Tipe apa?</p>
                    <div class="select">
                        <select name="tipelaundry" id="tipelaundry" onchange="getValueTwo()">
                            <option value=""></option>
                            <option value="Reguler">Reguler</option>
                            <option value="Express">Express</option>
                        </select>
                    </div>
                    <p>Dianterin apa engga?</p>
                    <div class="select">
                        <select name="antarpickuplaundry" id="antarpickuplaundry" onchange="getValueThree()">
                            <option value=""></option>
                            <option value="Antar">Dianterin</option>
                            <option value="Pickup">Ambil sendiri</option>
                        </select>
                    </div>
                    <p>Beratnya berapa?</p>
                    <div class="col-lg-12">
                        <fieldset>
                            <input type="number" name="berat" id="berat" placeholder="kg" onchange="getValueFour()" oninput="getValueAll()">
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <p>Harga:</p>
                        <fieldset>
                            <input type="number" name="total_harga" id="total_harga" placeholder="" readonly>
                        </fieldset>
                    </div>
                    
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" name="addtocart" id="addtocart" class="main-gradient-button addmore">Place Order</button>
                        </fieldset>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>
<body>

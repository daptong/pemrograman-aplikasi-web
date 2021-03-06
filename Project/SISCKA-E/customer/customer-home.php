<?php 
    require("../connector.php"); 
    session_start();

    include_once("customer-check-login.php");

    $profile_username = $_SESSION['username'];
    $profile_id = $_SESSION['pelanggan_id'];
    
    // get name
    $stmt = $db->query("SELECT nama FROM pelanggan WHERE pelanggan_id='$profile_id'");
    $temp = $stmt->fetch(PDO::FETCH_ASSOC);
    $nama = $temp['nama'];

    $sql = "SELECT transaksi_id FROM transaksi WHERE nama_customer='$nama'";
    $stmt1 = $db->prepare($sql);
    $stmt1->execute();

    $txid = array();
    while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
        $txid[] = $row['transaksi_id'];
    }

    $txids = sizeof($txid);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home | SISCKA-E</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../images/favicon.ico">

        <link rel="stylesheet" href="../css/fontawesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-7">
                    <ul class="info">
                        <li><a href="#"><i class="fa fa-envelope"></i>admin@sisckae.com</a></li>
                        <li><a href="#" onclick="location.href='https://www.youtube.com/watch?v=fWNaR-rxAic'"><i class="fa fa-phone"></i>123-456-789</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-4 col-5">
                    <ul class="username">
                        <li><a>Logged in as <?php echo "".$profile_username;?></a></li>
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
                            <li><a href="" class="active">Home</a></li>
                            <li><a href="customer-order.php">Order Laundry</a></li>
                            <li><a href="customer-check-laundry.php">Check Laundry</a></li>
                            <li><a href="customer-check-packet.php">Check Packet</a></li>
                            <li><a href="../logout.php">Log Out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="home-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h6 style="text-transform:none">Hello, <?php echo $nama?>!</h6>
                    <h2>You currently have <?php echo $txids?> orders</h2>
                    <div class="row">
                        <div class="col-lg-5 align-self-center">
                            <div class="left-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<body>
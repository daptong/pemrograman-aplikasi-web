<?php 
    require("../connector.php");
    session_start();

    include("admin-check-login.php");

    $profile_username = $_SESSION['username'];

    $finished = "FINISHED";
    $onprocess = "ON PROCESS";
    $onhold = "ON HOLD";

    $sql = "SELECT status FROM status_laundry WHERE status != '$finished' && status != '$onprocess'";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $temp = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $temp[] = $row['status'];
    }

    $get_onhold = sizeof($temp);
    
    $sql2 = "SELECT status FROM status_laundry WHERE status != '$finished' && status != '$onhold'";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute();

    $temp = array();
    while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
        $temp[] = $row['status'];
    }

    $get_onprocess = sizeof($temp);

    $sql3 = "SELECT status FROM status_laundry WHERE status != '$onhold' && status != '$onprocess'";
    $stmt3 = $db->prepare($sql3);
    $stmt3->execute();

    $temp = array();
    while($row = $stmt3->fetch(PDO::FETCH_ASSOC)){
        $temp[] = $row['status'];
    }

    $get_finished = sizeof($temp);
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
                        <li><a href="#"><i class="fa fa-phone"></i>123-456-789</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-4 col-5">
                    <ul class="username">
                        <li><a>Logged in as <?php echo "".$profile_username?></a></li>
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
                        <a href="admin-home.php" class="logo">
                            <img src="../images/sisckae.png" alt="">
                        </a>
                        <ul class="nav">
                            <li><a href="" class="active">Home</a></li>
                            <li><a href="admin-check-customer.php">Check Customer</a></li>
                            <li><a href="admin-check-laundry.php">Check Laundry</a></li>
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
                    <h6 style="text-transform:none">Hello, <?php echo $profile_username?>!</h6>
                    <h2>You currently have:</h2>
                    <h5>•   <?php echo $get_onhold?>&nbsp;&nbsp;orders on hold</h5>
                    <h5>•   <?php echo $get_onprocess?>&nbsp;&nbsp;orders on process</h5>
                    <h5>•   <?php echo $get_finished?>&nbsp;&nbsp;finished orders</h5>
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
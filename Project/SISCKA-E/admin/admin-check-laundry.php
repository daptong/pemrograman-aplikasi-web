<?php
    require_once("../connector.php");
    session_start();

    include("admin-check-login.php");

    $profile_username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Check Laundry | SISCKA-E</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../images/favicon.ico">

        <script src="../js/jquery.min.js"></script>
        <script src="../js/driver.js"></script>
        <script src="../js/helperedit.js"></script>

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
                            <li><a href="admin-home.php">Home</a></li>
                            <li><a href="admin-check-customer.php">Check Customer</a></li>
                            <li><a href="" class="active">Check Laundry</a></li>
                            <li><a href="../logout.php">Log Out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="order-laundry" id="order-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form id="laundry" action="" method="">
              <div class="section-heading">
                <h4>Customer Laundry</h4>
              </div>
              <?php include_once("admin-get-laundry.php")?>
              <?php include_once("admin-get-laundry-state.php")?>
              <?php include_once("admin-get-packet.php")?>
            </form>
          </div>
          <div class="container-child">
              <div class="row">
                  <div class="section-heading"></div>
              </div>
          </div>
        </div> 
      </div>
    </section>

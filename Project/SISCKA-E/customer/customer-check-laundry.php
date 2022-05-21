<?php
    require("../connector.php");
    session_start();

    include("customer-check-login.php");

    $profile_username = $_SESSION['username'];
    $profile_id = $_SESSION['pelanggan_id'];

    // get name
    $stmt = $db->query("SELECT nama FROM pelanggan WHERE pelanggan_id='$profile_id'");
    $temp = $stmt->fetch(PDO::FETCH_ASSOC);
    $nama = $temp['nama'];

    $sql = "SELECT * FROM transaksi WHERE nama_customer='$nama'";
    $stmt1 = $db->prepare($sql);
    $stmt1->execute();

    $getfromsql1 = array();

    $sql2 = "SELECT transaksi_id FROM transaksi WHERE nama_customer='$nama'";
    $stmt2 = $db->prepare($sql2);

    $stmt2->execute();

    $id = array();
    while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
        $id[] = $row['transaksi_id'];
    }

    $in = '(' . implode(',', $id) .')';
 
    $sql3 = "SELECT status, transaksi_id FROM status_laundry WHERE transaksi_id IN" . $in;
    $stmt3 = $db->query($sql3);
    // $temp3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    
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
                        <li><a>Logged in as <?php echo $profile_username?></a></li>
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
                            <li><a href="customer-home.php">Home</a></li>
                            <li><a href="customer-order.php">Order Laundry</a></li>
                            <li><a href="" class="active">Check Laundry</a></li>
                            <li><a href="customer-check-packet.php">Check Packet</a></li>
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
                    <form id="cart" action="" method="">
                        <div class="section-heading">
                            <h4>Your Laundry Order</h4>
                        </div>
                        <table class="table table-bordered" style="text-align:center">
                            <tr>
                                <th>TxID</th>
                                <th>Nama</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Laundry</th>
                                <th>Tipe Laundry</th>
                                <th>Antar / Pickup</th>
                                <th>Berat</th>
                                <th>Harga</th>
                            </tr>
                                <?php $total=0; while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['transaksi_id'])?></td>
                                <td><?php echo htmlspecialchars($row['nama_customer'])?></td>
                                <td><?php echo htmlspecialchars($row['tanggal_pemesanan'])?></td>
                                <td><?php echo htmlspecialchars($row['nama_laundry'])?></td>
                                <td><?php echo htmlspecialchars($row['tipe_laundry'])?></td>
                                <td><?php echo htmlspecialchars($row['antar_pickup_laundry'])?></td>
                                <td><?php echo htmlspecialchars($row['berat'])?> kg</td>
                                <td>Rp. <?php echo number_format(($row['total_harga']), 2, ',', '.')?></td>
                            </tr>
                            <?php
                                $total = $total + $row['total_harga']; 
                                endwhile; 
                            ?>
                            <tr>
                                <td style="text-align:center" colspan="7">Total yang harus dibayar:</td>
                                <td>Rp. <?php echo number_format(($total), 2, ',', '.')?></td>
                            </tr>                            
                        </table>
                        <table class="table table-bordered" style="margin-left:auto;margin-right:auto;border:1px solid #B762C1;text-align:center;height:auto;width:100%;border-radius:10px">
                            <tr>
                                <th>Transaksi ID</th>
                                <th>Status</th>
                            </tr>
                                <?php $total=0; while($row = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['transaksi_id'])?></td>
                                <td><?php echo htmlspecialchars($row['status'])?></td>
                            </tr>
                            <?php
                                endwhile; 
                            ?>                           
                        </table>
                    </form>
                </div>
            </div>
            <div class="container-child">
                <div class="row">
                    <div class="section-heading"></div>
                </div>
            </div>
        </div>
    </section>
<body>
<?php
    require("../connector.php");
    session_start();
    
    include("customer-check-login.php");

    $profile_username = $_SESSION['username'];
    $profile_id = $_SESSION['pelanggan_id'];

    // get name
    $stmt1 = $db->query("SELECT nama FROM pelanggan WHERE pelanggan_id='$profile_id'");
    $get_name = $stmt1->fetch(PDO::FETCH_ASSOC);
    $nama = $get_name['nama'];

    $pickup = "Pickup";
    $get_paket = "SELECT * FROM paket WHERE nama_customer='$nama'";
    $stmt2 = $db->query($get_paket);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Check Packet | SISCKA-E</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="icon" href="../images/favicon.ico">

    <script src="../js/jquery.min.js"></script>

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
                    <a href="customer-home.php" class="logo">
                        <img src="../images/sisckae.png" alt="">
                    </a>
                    <ul class="nav">
                        <li><a href="customer-home.php">Home</a></li>
                        <li><a href="customer-order.php">Order Laundry</a></li>
                        <li><a href="customer-check-laundry.php">Check Laundry</a></li>
                        <li><a href="customer-check-packet.php" class="active">Check Packet</a></li>
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
                        <h4>Your Laundry Packet</h4>
                    </div>
                    <table class="table table-bordered" style="text-align:center">
                        <tr>
                            <th>TxID</th>
                            <th>Nama</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Ongkos Kirim</th>
                            <th>Driver</th>
                        </tr>
                            <?php while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['transaksi_id'])?></td>
                            <td><?php echo htmlspecialchars($row['nama_customer'])?></td>
                            <td><?php echo htmlspecialchars($row['tanggal_pemesanan'])?></td>
                            <td><?php echo htmlspecialchars($row['tanggal_pengiriman'])?></td>
                            <td><?php echo htmlspecialchars($row['alamat_customer'])?></td>
                            <td><?php echo htmlspecialchars($row['paket_state'])?></td>
                            <td>Rp. <?php echo number_format(($row['paket_ongkir']), 2, ',', '.')?></td>
                            <td><?php echo htmlspecialchars($row['paket_driver'])?></td>
                        </tr>
                            <?php endwhile;?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
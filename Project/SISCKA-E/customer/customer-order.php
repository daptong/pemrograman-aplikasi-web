<?php
    require_once("../connector.php");
    session_start();

    include_once("customer-check-login.php");

    $profile_username = $_SESSION['username'];
    $profile_id = $_SESSION['pelanggan_id'];

    // get customer name
    $stmt = $db->query("SELECT nama FROM pelanggan WHERE pelanggan_id='$profile_id'");
    $temp = $stmt->fetch(PDO::FETCH_ASSOC);
    $nama = $temp['nama'];

    // get customer address
    $stmt1 = $db->query("SELECT alamat FROM pelanggan WHERE pelanggan_id='$profile_id'");
    $temp1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $alamat = $temp1['alamat'];

    // get today date
    $tanggal = date('Y-m-d');

    if(ISSET($_POST['deleteorder'])){
        foreach($_SESSION['cart'] as $keys => $values){
            unset($_SESSION['cart'][$keys]);
        }
    }

    if(ISSET($_POST['finishorder'])){
        $sql = "INSERT INTO transaksi (nama_customer, tanggal_pemesanan, nama_laundry, tipe_laundry, antar_pickup_laundry, berat, total_harga)
                VALUES (:nama_customer, :tanggal_pemesanan, :nama_laundry, :tipe_laundry, :antar_pickup_laundry, :berat, :total_harga)";

        $stmt = $db->prepare($sql);
        $items = $_SESSION['order'];
        $saved = $stmt->execute($items);

        $stmt2 = $db->query("SELECT transaksi_id FROM transaksi WHERE transaksi_id = LAST_INSERT_ID()");
        $temp2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $transaksi_id = $temp2['transaksi_id'];
        $status = "ON HOLD";

        $sql2 = "INSERT INTO status_laundry (transaksi_id, status) VALUES ('$transaksi_id', '$status')";
        $stmt2 = $db->prepare($sql2);
        $saved2 = $stmt2->execute();

        if($_SESSION['antar_pickup_laundry'] == $antar){
            $sql3 = "INSERT INTO paket (transaksi_id, nama_customer, tanggal_pemesanan, tanggal_pengiriman, alamat_customer, paket_state, paket_ongkir, paket_driver)
                     VALUES ('$transaksi_id', '$nama', '$tanggal', '', '$alamat', '$status', 15000, '')";
            $stmt3 = $db->prepare($sql3);
            $saved3 = $stmt3->execute();
        }

        foreach($_SESSION['cart'] as $keys => $values){
            unset($_SESSION['cart'][$keys]);
        }

        if($saved2){
            header("Location: order-saved.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Laundry | SISCKA-E</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="icon" href="images/favicon.ico">

    <script src="../js/jquery.min.js"></script>
    
    <script src="../js/price.js"></script>
    <script src="../js/save.js"></script>

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
                        <li><a href="" class="active">Order Laundry</a></li>
                        <li><a href="customer-check-laundry.php">Check Laundry</a></li>
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
            <div class="col-lg-8">
                <form id="cart" action="" method="POST">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h4>Order Details</h4>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="table-responsive">
                            <table id="cart-table" class="table table-bordered" cellspacing="0">
                                <?php
                                    if(!empty($_SESSION['cart'])){
                                        foreach($_SESSION['cart'] as $keys => $values){

                                        }
                                ?>
                                <tr>
                                    <th>Nama</th>
                                    <td><?php echo $values['nama_customer'] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?php echo $values['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <td><?php echo $values['tanggal_pemesanan'] ?></td>
                                </tr>
                                <tr>
                                    <th>Laundry</th>
                                    <td><?php echo $values['nama_laundry'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tipe Laundry</th>
                                    <td><?php echo $values['tipe_laundry'] ?></td>
                                </tr>
                                <tr>
                                    <th>Antar / Pickup</th>
                                    <td><?php echo $values['antar_pickup_laundry'] ?></td>
                                </tr>
                                <tr>
                                    <th>Berat</th>
                                    <td><?php echo $values['berat'] ?></td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td><?php echo $values['total_harga'] ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" name="finishorder" id="main-gradient-button">Finish Order</button>
                            <button type="submit" name="deleteorder" id="main-gradient-button">Delete Order</button>
                        </fieldset>
                    </div>
                </form>
            </div>
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

<div id="orderSaved" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hi, <?php echo "".$profile_username?></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Your order is saved and ready to process.</h6>
            </div>
        </div>
    </div>
</div>

<div class="container-child">
    <div class="row">
        <div class="section-heading"></div>
    </div>
</div>
<body>

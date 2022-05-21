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

    if(ISSET($_POST['addtocart'])){
        $nama_laundry = $_POST['nama_laundry'];
        $tipe_laundry = $_POST['tipe_laundry'];
        $antar_pickup_laundry = $_POST['antar_pickup_laundry'];
        $berat = $_POST['berat'];
        $total_harga = 50000;
        $tanggal_pemesanan = date("Y-m-d");
         
        $temp = array(
            'nama_customer' => $nama,
            'tanggal_pemesanan' => $tanggal_pemesanan,
            'nama_laundry' => $nama_laundry,
            'tipe_laundry' => $tipe_laundry,
            'antar_pickup_laundry' => $antar_pickup_laundry,
            'berat' => $berat,
            'total_harga' => $total_harga
        );

        $order = array(
            ':nama_customer' => $nama,
            ':tanggal_pemesanan' => $tanggal_pemesanan,
            ':nama_laundry' => $nama_laundry,
            ':tipe_laundry' => $tipe_laundry,
            ':antar_pickup_laundry' => $antar_pickup_laundry,
            ':berat' => $berat,
            ':total_harga' => $total_harga
        );
            
        $_SESSION['order'] = $order;
        $_SESSION['cart'][0] = $temp;
    }

    if(ISSET($_POST['finishorder'])){

        $sql = "INSERT INTO transaksi (nama_customer, tanggal_pemesanan, nama_laundry, tipe_laundry, antar_pickup_laundry, berat, total_harga)
                VALUES (:nama_customer, :tanggal_pemesanan, :nama_laundry, :tipe_laundry, :antar_pickup_laundry, :berat, :total_harga)";
    
        $stmt = $db->prepare($sql);
        $items = $_SESSION['order'];
        $stmt->execute($items);

        $stmt2 = $db->query("SELECT transaksi_id FROM transaksi WHERE transaksi_id = LAST_INSERT_ID()");
        $temp2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        $transaksi_id = $temp2['transaksi_id'];
        $status = "ON HOLD";

        $sql2 = "INSERT INTO status_laundry (transaksi_id, status) VALUES ('$transaksi_id', '$status')";
        $stmt2 = $db->prepare($sql2);
        $stmt2->execute();

        foreach($_SESSION['cart'] as $keys => $values){
            unset($_SESSION['cart'][$keys]);
        }
    }

    if(ISSET($_POST['deleteorder'])){
        foreach($_SESSION['cart'] as $keys => $values){
            unset($_SESSION['cart'][$keys]);
        }
    }
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

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
                        <div class="dropdown">
                            <div class="select">
                                <span>Laundry apa?</span>
                            </div>
                            <input type="hidden" name="nama_laundry">
                            <ul class="dropdown-menu">
                                <li id="Pakaian">Pakaian</li>
                                <li id="Bed Cover">Bed Cover</li>
                                <li id="Bantal">Bantal</li>
                                <li id="Selimut">Selimut</li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <div class="select">
                                <span>Tipe apa?</span>
                            </div>
                            <input type="hidden" name="tipe_laundry">
                            <ul class="dropdown-menu">
                                <li id="Reguler">Reguler</li>
                                <li id="Express">Express</li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <div class="select">
                                <span>Dianterin apa engga?</span>
                            </div>
                            <input type="hidden" name="antar_pickup_laundry">
                            <ul class="dropdown-menu">
                                <li id="Antar">Dianterin</li>
                                <li id="Pickup">Ambil sendiri</li>
                            </ul>
                            <script src="js/dropdown.js"></script>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="number" name="berat" id="berat" placeholder="Berat?">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <p>Harga:</p>
                            <fieldset>
                                <input type="number" name="total_harga" id="total_harga" placeholder="Rp. 50.000 (lagi promo)" readonly>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" name="addtocart" class="main-gradient-button addmore">Place Order</button>
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
                    <h6>Thank you for ordering. If you want to order again, please go to this page.</h6>
                </div>
            </div>
        </div>
    </div>
<body>
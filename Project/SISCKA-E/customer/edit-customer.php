<?php
    require("../connector.php");
    session_start();

    include_once("customer-check-login.php");

    $profile_username = $_SESSION['username'];
    $profile_id = $_SESSION['pelanggan_id'];
    
    if(ISSET($_POST['saveprofile'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $new_user = FALSE;
        
        $sql = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', telepon='$telepon', new_user='$new_user' WHERE pelanggan_id='$profile_id'";
        $stmt = $db->prepare($sql);

        $saved = $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($saved){
            header("Location: customer-order.php");
        }
        else{
        }
    }
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
            $(document).ready(function(){
                $("#editProfileModal").modal('show');
            });
        </script>
    </head>

    <div id="editProfileModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hi, <?php echo "".$profile_username?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h6>Please edit your profile before you make your first order.</h6>
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
                        <a href="customer-home.php" class="logo">
                            <img src="../images/sisckae.png" alt="">
                        </a>
                        <ul class="nav">
                            <li><a href="../logout.php">Log Out</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="contact-us" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8"></div>
                <div class="col-lg-4">
                    <form id="contact" action="" method="POST">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h4>Edit your profile</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="nama" id="nama" placeholder="Name">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="alamat" id="alamat" placeholder="Address">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="telepon" id="telepon" placeholder="Telephone">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" name="saveprofile" class="main-gradient-button">Edit my profile</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<body>
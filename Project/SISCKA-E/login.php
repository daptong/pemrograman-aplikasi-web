<?php
    session_start();
    require_once("connector.php");
    if(ISSET($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM pelanggan WHERE username='$username'";
        $stmt = $db->prepare($sql);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            if(password_verify($password, $user['password'])){
                if($user['username'] == 'admin'){
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['pelanggan_id'] = $user['pelanggan_id'];
                    $_SESSION['loggedin'] = TRUE;

                    header("Location: admin/admin-home.php");
                    exit;
                }
                else{
                    if($user['new_user'] == TRUE){
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['pelanggan_id'] = $user['pelanggan_id'];
                        $_SESSION['loggedin'] = TRUE;

                        header("Location: customer/edit-customer.php");
                        exit;
                    }
                    else{
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['pelanggan_id'] = $user['pelanggan_id'];
                        $_SESSION['loggedin'] = TRUE;

                        header("Location: customer/customer-home.php");
                        exit;
                    }
                }
            }
            else{
                // echo "Wrong credentials";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign In | SISCKA-E</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <link rel="icon" href="images/favicon.ico">

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
                    <ul class="social-media">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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
                        <a href="index.php" class="logo">
                            <img src="images/sisckae.png" alt="">
                        </a>
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="" class="active">Sign In</a></li>
                            <li><a href="register.php">Sign Up</a></li>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <h4>Sign In</h4>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="username" placeholder="Username" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="password" name="password" placeholder="Password" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" name="login" class="main-gradient-button">Sign In</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<body>
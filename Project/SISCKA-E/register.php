<?php
    require_once("connector.php");
    if(isset($_POST['register'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $new_user = TRUE;

        $sql = "INSERT INTO pelanggan (email, username, password, new_user) VALUES (:email, :username, :password, :new_user)";
        $stmt = $db->prepare($sql);

        $params = array(
            ':email' => $email,
            ':username' => $username,
            ':password' => $password,
            ':new_user' => $new_user
        );

        $saved = $stmt->execute($params);

        if($saved) header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up | SISCKA-E</title>
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
                            <li><a href="login.php">Sign In</a></li>
                            <li><a href="" class="active">Sign Up</a></li>
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
                                    <h4>Sign Up</h4>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" placeholder="Email" required>
                                </fieldset>
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
                                    <button type="submit" name="register" class="main-gradient-button">Sign Up</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<body>
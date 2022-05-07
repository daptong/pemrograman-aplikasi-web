<?php
    require_once("./model/connector.php");
    if(ISSET($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username=:username";
        $stmt = $db->prepare($sql);

        $params = array(
            ':username' => $username
        );

        $stmt->execute($params);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){
            if(password_verify($password, $user['password'])){
                session_start();
                $_SESSION['user'] = $user;

                header("Location: home.php");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="./css/register-login-style.css"/>
    </head>
<body>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="POST">
                    <h3>Login</h3>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                    </div>
                    <button type="submit" name="login" class="btn btn-success btn-block">Log in</button>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>
<?php
require_once '../model/connector.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register-style.css">
</head>
<body>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form action="./register.php" method="post">
                    <div class="form-group">
                        <label>Sign Up</label>
                        <input type="text" name="username" placeholder="Username" required="">
                        <input type="password" name="password" placeholder="Password" required="">
                        <input type="password" name="confirm_password" placeholder="Confirm password" required="">
                        <button>Register</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>

</body>
</html>
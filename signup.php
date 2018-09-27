<?php session_start();
include('config/connect.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(!$_SESSION['username']){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration With Email PHP7</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container" style="max-width:600px;margin:60px auto;">
        <div class="row">
            <div class="col-xs-12">
                <h1>Sign Up</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="functions/insert.php" method="post" role="form">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="name" class="form-control" name="username" placeholder="Enter username" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Full Name</label>
                        <input type="address" class="form-control" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email (You'll have to confirm later)</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label for="copwd">Confirm Password</label>
                        <input type="password" class="form-control" name="copass" placeholder="Enter password" required>
                    </div>
                    <input type="submit" name="submit" value="Register" class="btn btn-default">&nbsp;
                    Already have an account? Just <a href="login.php">Sign in!</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}else{    
    header('location:index.php');
}

?>
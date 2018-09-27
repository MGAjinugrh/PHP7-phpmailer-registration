<?php 
session_start();
include('config/connect.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if($_SESSION['username']){?>
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
            <div class="col-lg-12">
                <h1>Welcome!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>Username : <?php echo $_SESSION['username'];?></p>
                <p>Nama     : <?php echo $_SESSION['name'];?></p>
                <p>Verification status : <?php if($_SESSION['verification'] == 0){echo "Belum verifikasi email.<br>Silahkan klik <a href='functions/mail.php'>disini</a> untuk verifikasi.";}else{echo "Verified.";}?></p>
                <p><a href="logout.php">Logout</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>    
</body>
</html>
<?php 
}else{    
    header('location:login.php');
}
?>
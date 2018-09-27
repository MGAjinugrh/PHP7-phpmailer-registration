<?php 
session_start();
include('config/connect.php');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if($_SESSION['username']){
    header('location:index.php');
}else{    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration With Email PHP7</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container" style="max-width:600px;margin:60px auto;">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sign In</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" role="form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <input type="submit" name="signin" value="Sign In" class="btn btn-default">&nbsp;
                    Didn't have an account? Go <a href="signup.php">Sign up!</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
<?php 

    $username = $_POST['username'];
    $password = $_POST['password'];
    $signin = $_POST['signin'];

    if($signin === "Sign In"){
        $user = $conn->query("SELECT username, name, password, email, verification, FDate, LDate FROM user WHERE username='$username'");
        if($user->num_rows === 1){
            $rowuser = $user->fetch_array(MYSQLI_ASSOC);

            if(password_verify($password, $rowuser['password'])){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $rowuser['name'];
                $_SESSION['email'] = $rowuser['email'];
                $_SESSION['verification'] = $rowuser['verification'];
                $_SESSION['FDate'] = $rowuser['FDate'];
                $_SESSION['LDate'] = $rowuser['LDate'];
                header('location:index.php');
            }else{
                ?>
                <script type="text/javascript">alert("login gagal");</script>
                <?php
            }
        }
    }

} ?>
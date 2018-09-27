<?php 
include('../config/connect.php');

$submit = $_POST['submit'];

if($submit === "Register"){
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $copass = $_POST['copass'];
    $email = $_POST['email'];

    if($password === $copass){
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = $conn->query("INSERT INTO user VALUE('$username', '$hashed', '$name', '$email', 0, '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')");
        if($sql){
            ?>
            <script type="text/javascript">alert('Data Berhasil Disimpan'); window.location.href="../login.php";</script>
            <?php 
            
        }
    }else{
        ?>
        <script type="text/javascript">
            window.location.href ="../signup.php";
            alert("Password and confirmation didn't match.");

        </script>
        <?php
    }
}
?>
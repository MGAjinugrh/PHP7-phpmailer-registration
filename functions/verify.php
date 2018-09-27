<?php
include('../config/connect.php');
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$sql = $conn->query("UPDATE user SET verification = TRUE WHERE username='".$_SESSION['username']."'");

if ($conn->error) {
    die($conn->error);
} else {
?>
    <script type="text/javascript">alert('Verifikasi berhasil'); window.location.href="../index.php";</script>
<?php
}
/*if($sql){
    ?>
    <script type="text/javascript">alert('Verifikasi berhasil'); window.location.href="../index.php";</script>
    <?php
}else{
?>
<script type="text/javascript">
    window.location.href ="../index.php";
    alert("Verifikasi gagal.");

</script>
<?php
}*/
?>
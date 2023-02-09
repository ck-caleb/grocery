<?php
session_start();
include("../connect.php");

$appid=$_POST['id'];
$updateqry="update applicatiion set approve= 'REJECTED' where app_id= '$appid' ";
if($conn->query($updateqry)){
    ?>
    <script>
    alert('Rejected')
    location.href='application.php'
    </script>
    <?php
}else{
    ?>
    <script>
    alert('Failed')
    </script>
    <?php
}

?>
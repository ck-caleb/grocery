<?php
session_start();
include("../connect.php");
$appid=$_POST['appid'];
$updateqry="update applicatiion set approve= 'APPROVED' where app_id= '$appid' ";
if($conn->query($updateqry)){
    ?>
    <script>
    alert('Approved')
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
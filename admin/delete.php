<?php
include("../connect.php");
$appid=$_POST['id'];
$updateqry="delete from applicatiion where app_id= '$appid'";
if($conn->query($updateqry)){
$deldoc="delete from documents where appointment_id='$appid' ";
$conn->query($deldoc);

    ?>
    <script>
    alert('Deleted')
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
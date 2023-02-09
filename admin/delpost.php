<?php
include("../connect.php");
$appid=$_POST['id'];
$updateqry="delete from post_info where post_id= '$appid'";
if($conn->query($updateqry)){

    ?>
   <script>
                    setTimeout(function(){
                        location.href="view.php"
                    },2000)
                   
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
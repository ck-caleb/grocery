<?php
    include('connect.php');
    $id=$_POST['id'];
    if($conn->query("delete from cart where cart_id='$id'")){
        ?>
        <script>
            alert("Deleted");
            location.reload()
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Failed");
        </script>
        <?php
    }

?>
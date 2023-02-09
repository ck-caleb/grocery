<?php
include('connect.php');
$id=$_POST['item_id'];
$quantity=$_POST['quantity'];

$result=$conn->query("select * from cart where product_id='$id'");
$rowcount=mysqli_num_rows($result);
if($rowcount<1){
    if($conn->query("insert into cart(product_id,quantity) values('$id','$quantity')")){
        echo "Added to Cart";
    }else{
        echo "Failed";
    }
}else{
    echo "Item Already Added";
}



?>
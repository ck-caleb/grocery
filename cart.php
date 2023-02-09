<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODPLUS</title>
    <link rel="stylesheet"href="style.css?V=<?php echo time();?>">
    <link rel="stylesheet"href="bootstrap.min.css?V=<?php echo time();?>">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <script src="js/jquery.js"></script>
    <script src="js/dt.js"></script>
    <script src="js/dtbt.js"></script>
    <script src="js.js?v=<?php echo time();?>"></script>
    

</head>
<body>
   
 
  <header>
    <div class="header-1">
        <a href="#" class="logo"> <i class=" fas fa-shopping-basket"></i>FoodPlus!!</a>
        <form action="" class="search-box-container">
        <input type="search" id="search-box" class="fa fa-search">
        <label for="search-box" class="fa fa-search"> </label>
        </form>
    </div>
    <div class="header-2">
        <div id="menu-bar" class="fa fa-bars">

        </div>
       

<nav class="navibar">
    <a href="index.php">Home</a>
    <a href="index.php#product">Product</a>
    <a href="index.php#contact">Contact</a>
    
 </nav>
 
 <div class="icon">
       <a href="cart.php" class="fa fa-shopping-cart"></a>
        <a href="#" class="fa fa-heart"></a>
        
         <a href="#" class="fa fa-user-circle" id="user"></a>
    </div>
    
   
    </div>
    
</header>
<section class="home" id="home">
    
<style>
    table{
        width:100%;
        font-size:25px;
    }
    .cart_table table thead{
        background-color: rgB(0,130,189);
        color:#FFFFFF;
    }
    .cart_table .row{
        font-size: 18px;
    }
    .cart_table button{
        height: 40px;
        
    }
</style>
</section>
<section style="width:90%;margin-left:5%"class="cart_table">
<table id="cart_table" class="table table-striped">
        <thead>
            <tr>
                <th hidden>#</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result=$conn->query("select * from cart inner join products on cart.product_id=products.product_id");
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td hidden><?php echo $row['cart_id'];?></td>
                <td><?php echo $row['product_name'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><i class=" fas fa-trash del_item"style="color:red;font-size:25px;cursor:pointer;"></i></td>
                </tr>
                    <?php
            }
            ?>
            
        </tbody>
</table>
<a href="login.php"><button class="btn btn-primary">CHECK OUT</button></a>
        </section>
<section class="footer">
    
    <div class="box-container">
        <div class="box">
        <a href="#" class="logo"> <i class=" fas fa-shopping-basket"></i>FoodPlus!!</a>
        <p>Fresh and Organic.Shop at your confort zone.  <br>Free delivery</p>

        <div class="share">
            <a href="#"class="btn fab fa-facebook-f"></a>
            <a href="#"class="btn fab fa-twitter"></a>
            <a href="#"class="btn fab fa-instagram"></a>
            <a href="#"class="btn fab fa-linkedin"></a>
            
        </div>
        </div>
        <div class="box">
           <h3>Contact info</h3>
           <a href="#" class="links"><i class="fas fa-phone"></i>+254746928202</a>
           <a href="#" class="links"><i class="fas fa-phone"></i>+254746928202</a>
           <a href="#" class="links"><i class="fas fa-envelope"></i>mdaicaleb@gmail.com</a>
           <a href="#" class="links"><i class="fas fa-map-marker-alt"></i>kericho, Kenya-20200</a>


<h1 class="credit">Designed by <span> CALEB KOECH</span> | All Rights Reserved!</h1>
</section>
</body>
</html>
<script>
    $('#cart_table').DataTable()
    $('.del_item').on('click', function(){
        var id=$(this).closest('tr').find('td:eq(0)').text().trim()
        $.ajax({
            url:'del_item.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                $('#cart_table').html(data)
            }
        })
    })
</script>
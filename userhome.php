<?php include('connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Home</title>
    <link rel="stylesheet"href="style.css?V=<?php echo time();?>">
    <link rel="stylesheet"href="bootstrap.min.css?V=<?php echo time();?>">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <script src="js/jquery.js"></script>
    <script src="js/dt.js"></script>
    <script src="js/dtbt.js"></script>
    <script src="js.js?v=<?php echo time();?>"></script>
</head>
<body>
    <style>
        section{
            margin-top:40px;
        }
        section table{
            font-size:23px;
        }
        section button{
            height:40px;
            width:15%;
            margin-top:30px;
        }
        .wrapper{
            display:flex;
            width:100%;
            height:100vh;
        }
        .navigation_bar{
            width:15%;
            height:100vh;
            background-color: #000;
        }
        .panel{
            width:85%;
            height:100vh;
        }
        .navigation_bar ul li {
            color:white;
            font-size:20px;
            margin-top: 30px;
            margin-left:10px;
            list-style: none;
        }
        a{
            text-decoration: none;
        }
    </style>
    <div class="wrapper">
        
    
    <div class="navigation_bar">
        <ul>
            <a href="#"><li>CART</li></a>
            <a href="index.php"><li>LOGOUT</li></a>
            <li></li>
        </ul>
    </div>
    <div class="panel">
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
<button class="btn btn-primary">CHECK OUT</button>
        </section>
        </div>

        </div>
</body>
</html>
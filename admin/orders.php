<?php
session_start();
include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer | Home</title>
    <link rel="stylesheet" href="css/index.css?v=<?php echo time();?>">
   <!--font awesome-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!-- script -->
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="student-wrap">
        <div class="student-navigation">
            <ul>
            <li><a href="companyhome.php"><i class="fa fa-home" aria-hidden="true"></i>DASHBOARD</a></li>
                <li><a href="post.php"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>PRODUCTS</a></li>
                <li><a href="application.php"><i class="fa fa-file" aria-hidden="true"></i>CATEGORIES</a></li>
                <li><a href="orders.php"><i class="fa fa-file" aria-hidden="true"></i>ORDERS</a></li>
                <li><a href="users.php"><i class="fa fa-file" aria-hidden="true"></i>USERS</a></li>
                <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>PROFILE</a></li>
                <li><a href="../index.php"><i class="fa fa-power-off"style="font-size:32px;color:red;font-weight:bold;" aria-hidden="true"></i></a></li>
                
            </ul>
        </div>
        <div class="student-panel">
            
        <div class="orders">
                        <table id="orders_table" class="table table-striped"style="width:100%;">
                            <thead>
                                <tr>
                                <th hidden>#</th>
                                <th style="width:15%">PRODUCT NAME</th>
                                <th style="width:50%">DESCRIPTION</th>
                                <th>CATEGORY</th>
                                <th>PRICE</th>
                                <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $productresult=$conn->query("select * from products");
                                    while($rows=mysqli_fetch_assoc($productresult)){
                                        ?>
                                        <tr>
                                        <td hidden><?php echo $rows['product_id'];?></td>
                                        <td style="width:15%"><?php echo $rows['product_name'];?></td>
                                        <td style="width:30%"><?php echo $rows['description'];?></td>
                                        <td><?php echo $rows['category'];?></td>
                                        <td><?php echo $rows['price'];?></td>
                                        <td>
                                        <i class="fa fa-edit" aria-hidden="true"style="color:green;font-size:26px;cursor:pointer;margin-right:5px;"></i>
                                        <i class="fa fa-trash" aria-hidden="true"style="color:red;font-size:26px;cursor:pointer;margin-right:5px;"></i>
                                    </td>
                                    </tr>
                                        <?php
                                    }
                                
                                ?>


                                
                               
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
    <!--js links-->
    <script src="js/com.js?v=<?php echo time();?>"></script>
</body>
</html>
<script>
   $(document).ready(function () {
    $('#orders_table').DataTable();
});
</script>
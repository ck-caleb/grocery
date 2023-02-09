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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
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
            
            <div class="home_highlights">
                <div class="highlight">
                    <?php
                    $res=$conn->query("select * from products");
                    $row=mysqli_num_rows($res);
                    ?>
                    <h4>Products</h4>
                   <h2><?php echo $row;?></h2>
                </div>
                <div class="highlight class_two">
                <?php
                    $res=$conn->query("select * from category");
                    $row=mysqli_num_rows($res);
                    ?>
                    <h4>Categories</h4>
                   <h2><?php echo $row;?></h2>
                </div>
                <div class="highlight class_three">
                <?php
                    $res=$conn->query("select * from user");
                    $row=mysqli_num_rows($res);
                    ?>
                    <h4>Users</h4>
                   <h2><?php echo $row;?></h2>
                </div>
            </div>
        </div>
    </div>
    <!--js links-->
    <script src="js/com.js?v=<?php echo time();?>"></script>
</body>
</html>
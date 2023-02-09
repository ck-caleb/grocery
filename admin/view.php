<?php
session_start();
include("../connect.php");
$postid=$_SESSION['postid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer | View</title>
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--js links-->
    <!--bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="../js/bootstrap/jq.js"></script>
<!--script src="../js/bootstrap/dt.js"></script>
<script src="../js/bootstrap/dtmin.js"></script>
<script src="../js/tables/table.js"></script>
<link rel="../css/bootstrap/bootmin.css">
<link rel="../css/bootstrap/bootmin5.css">
<script src="../js/bootstrap/datatables.js"></script-->
<!--css-->
<link rel="stylesheet" href="css/index.css?v=<?php echo time();?>">
<!--link rel="stylesheet" href="../css/bootstrap/table.css?v=<?php echo time();?>"-->
    <link rel="stylesheet" href="../css/view.css?v=<?php echo time();?>">
<!--end of links-->
</head>
<body>
<div id="blurr-back-update">
        
        </div>
        <div id="new-post-update">
            <h4>New Post</h4>
            <div class="line"></div>
            <div class="post-top">
                <form id="frmupdate"autocomplete="off">
                    <input type="hidden"name="prev_id"id="prev_id">
                <input type="text"name="txtpost"id="txtpostupdate"placeholder="Attachment Post Title">
                <input type="number"name="txtpay"id="txtpayupdate"placeholder="Payment if there is">
            </div>
            <textarea name="txtdescription" id="txtdescriptionupdate" cols="30" rows="10"placeholder="Attachment Description"></textarea>
            <input type="button"value="UPDATE"id="btn_updatepost">
            <p id="postresultupdate"></p>
        </form>
        </div>
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
            <div class="title-bar">
                <?php
                    $companyemail=$_SESSION['comsec'];
                    $companyqry="select * from company_info where company_id='$companyemail' ";
                    $companyresult=$conn->query($companyqry);
                    $companyrowcount=mysqli_fetch_assoc($companyresult);
                    echo "<h4>Hello <span>".$companyrowcount['company_name']."</span></h4>";
                    
                ?>
            </div>
            <div class="view-panel">
        <div class="shown">
        <?php
            $getpost="select post_id, post_title, post_pay, post_description as description from post_info where post_id='$postid' ";
            $postresult=$conn->query($getpost);
            while($postrows=mysqli_fetch_assoc($postresult)){
                ?>
                <div class="detail">
                    <span class="leid"hidden><?php echo $postrows['post_id'];?></span>
                    <h4 class="title"><?php echo $postrows['post_title'];?></h4>
                    <p class="pay">Monthly Salary: <span class="pay_amount"><?php echo $postrows['post_pay'];?></span> Kshs</p>
                    <p class="description"><?php echo $postrows['description'];?></p>
                    <div class="action">
                    <i class="fa fa-edit"id="btn-update" aria-hidden="true"style="font-size:35px;color:blue;margin-left:5%;cursor:pointer;"></i>
                    <i class="fa fa-trash "id="del_post" aria-hidden="true"style="font-size:35px;color:red;margin-left:5%;cursor:pointer;"></i>
                    </div>
                    </div>
                <?php
            }
            ?>
        </div>
        <div class="application_form" >
            <!--holds nothing-->
        </div>
    </div>
</div>

</div>
    <!--js links-->
    <script src="js/com.js?v=<?php echo time();?>"></script>
</body>
</html>
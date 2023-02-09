<?php
session_start();
include("../connect.php");

if(isset($_POST['btn_profile'])){
    $email=$_POST['email'];
    $speciality=$_POST['speciality'];
    $newpass=$_POST['newpass'];
    $txtconpassword=$_POST['txtconpassword'];
    
    $result=$conn->query("select * from company_log where company_password='$txtconpassword'");
    $rowcount=mysqli_num_rows($result);
    if($rowcount<1){
        ?><script>alert('Wrong Password')</script><?php
    }else{
        $getid=$conn->query("select * from company_log where company_password='$txtconpassword'");
        $row=mysqli_fetch_assoc($getid);
        $comid=$row['company_id'];
        if(empty($newpass)){
            $conn->query("update company_info set company_email='$email', company_speciality='$speciality' where company_id='$comid' ");
            ?><script>alert('Profile Updated')</script><?php
        }else{
            $conn->query("update company_info set company_email='$email', company_speciality='$speciality' where company_id='$comid' ");
            $conn->query("update company_log set company_password='$newpass' where company_id='$comid' ");
            ?><script>alert('Profile Updated')</script><?php
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer | Profile</title>
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
            
        <div class="profile_wrap">
            <div class="profile_one">
                <form action="profile.php"method="POST"autocomplete="off">
                    <?php
                    $res="select * from admin limit 1";
                    $response=$conn->query($res);
                    $rows=mysqli_fetch_assoc($response);
                        echo "<input type='text' name='email' value=".$rows['email'].">";
                    ?>
                    <input type="text"placeholder="Enter New Password"name="newpass"><br>
                    <input type="text"placeholder="Your Password"name="txtconpassword"required><br>
                    <input type="submit"value="Change"name="btn_profile">
                </form>
            </div>
            <div class="profile_two">
            <i class="fa fa-user" aria-hidden="true"></i>
            </div>
        </div>
        </div>
    </div>
    <!--js links-->
    <script src="js/com.js?v=<?php echo time();?>"></script>
</body>
</html>
<script>

</script>
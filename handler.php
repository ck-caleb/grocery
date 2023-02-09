<?php
session_start();
include("connect.php");


    $loguser=$_POST['email'];
    $logpass=$_POST['password'];
    $logqry="select * from logs where username=? and password=? limit 1";
    //create a statement
    $stmt=mysqli_stmt_init($conn);
    //prepare the prepared statements
    if(!mysqli_stmt_prepare($stmt,$logqry)){
        echo "Sql staments Failed";
    }else{
    //bind parameters to the place holders
        mysqli_stmt_bind_param($stmt, "ss", $loguser, $logpass);	
        //Run parameters inside db
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $row=mysqli_num_rows($result);
        $emailrow=mysqli_fetch_assoc($result);
    if($row>0){
        if($emailrow['user_type']=="Admin"){
            ?>
            <script>
                location.href='admin/companyhome.php'
            </script>
            
            <?php
        }else{
            ?>
            <script>
                location.href='userhome.php'
            </script>
            
            <?php
        }
       
    }else{
        echo "<script>alert('Wrong Username or Password')</script>";
    }

}
?>
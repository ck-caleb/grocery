<?php
ini_set(error_reporting(),0);
session_start();
include("connect.php");

if(isset($_POST['submit'])){

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
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        .login_form{
            width:40%;
            margin-left:30%;
            height:400px;
            margin-top:100px;
            text-align:center;
        }
        .login_form input[type=text],
        .login_form input[type=password],
        .login_form input[type=submit]
        {
            width:70%;
            height:35px;
            border:1px solid rgb(180,180,180);
            border-radius:3px;
            margin-bottom:30px;
        }
        .login_form input[type=submit]{
            border:0;
            border-radius:0;
            height:40px;
            background-color: black;
            color:white;
            cursor:pointer;
        }
        .login_form label{
            padding-bottom: 20px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <div class="login_form">
        <label for="">Log in to check out</label>
        <form action="login.php"method="POST">
            <input type="text"name="email"requied><br>
            <input type="password"name="password"requied><br>
            <input type="submit"value="Submit"name="submit">
        </form>
    </div>
</body>
</html>
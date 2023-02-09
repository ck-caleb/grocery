

<?php
session_start();
include("connect.php");
if(isset($_POST["signup"]))
{
$user=$_POST['username'];
$pass=$_POST['password'];
$usertype="User";

$query=$conn->prepare("INSERT INTO logs (username,password,user_type)values(?,?,?)");
$query->bind_param("sss",$user,$pass,$usertype);
$query->execute();
echo"Account created successfully";

$conn->close();
$query->close();
header('Location:index.php');


}

    
    
?>


ksjkf



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="style.css?V=<?php echo time();?>">
    <title>signUP</title>
</head>
<body>
    
    <div class="register">
        <form action="signup.php"method="POST">
        <h2>Register here!!</h2>
            <input type="text"name="username"placeholder="user">
            <input type="text"name="email"placeholder="email">
            <input type="text"name="password"placeholder="password">
            <input type="Submit"name="signup"placholder="signup">
            
        </form>
    </div>

</body>
</html>
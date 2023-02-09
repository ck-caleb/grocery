<?php
session_start();
unset($_SESSION['comsec']);
include("../connect.php");

if(isset($_POST['btncompanylogin'])){
    $loguser=$_POST['txtcomemail'];
    $logpass=$_POST['txtcompassword'];
    $logqry="select * from company_log inner join company_info on company_info.company_id=company_log.company_id and company_email=? and company_password=? limit 1";
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
        $_SESSION['comsec']=$emailrow['company_id'];
        //echo json_encode(['location'=>'studenthome.php']);
        header('Location:companyhome.php');
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
    <title>Company | Login</title>
    <link rel="stylesheet" href="css/index.css?v=<?php echo time();?>">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>
</head>
<body style="background-color:#333;">
<div class="adminlogin-wrapper"id="adminlog">
    <div class="login-form"style="background-color:#333">
    <form action="adminlogin.php"method="POST"autocomplete="off">
            <input type="text"placeholder="Email Address"name="txtcomemail"required>
            <input type="password"placeholder="Enter password"name="txtcompassword"required><br>
            <!--div class="line"></div-->
            <input type="submit"value="LOGIN"name="btncompanylogin">
            <p id="studentresult"></p>
            <span id="signin"> No account? Register Here</span><br>
            <!--a href="index.php"><span><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </span></a-->
        </form>
    </div>
</div>
            <div id="adminsign">
                <div class="login-form"style="background-color:#333">
                <form autocomplete="off"id="companysign">
            <input type="text"placeholder="Company Name"name="companyname"id="companyname"required>
            <input type="text"placeholder="Email Address"name="companyemail"id="companyemail"required>
            <input type="text"placeholder="Speciality"name="companyspeciality"id="companyspeciality"required>
            <input type="password"placeholder="Enter password"name="companypassword"id="companypassword"required><br>
            <input type="password"placeholder="Re-enter password"name="companypasswordtwo"id="companypasswordtwo"required><br>
            <!--textarea name="" id="" cols="30" rows="10"placeholder="Tell us about your company"name="about"id="about"></textarea-->
            <!--div class="line"></div-->
            <input type="button"value="LOGIN"name="companysign"id="companysign">
        </form>
            
            <p id="companyresult"></p>
            <span id="back"> Already Registered? Sign in</span>
        </div>
</div>
    <!--js links-->
    <script src="js/com.js?v=<?php echo time();?>"></script>

</body>
</html>
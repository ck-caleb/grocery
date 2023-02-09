<?php
session_start();
include('../connect.php');
if(isset($_POST['btn-post-attachment'])){
    $title=$_POST['txtpost'];
    $pay=$_POST['txtpay'];
    $description=nl2br($_POST['txtdescription']);
    $confirmqry="select * from post_info where post_title= ? and post_description=? ";
    $constmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($constmt, $confirmqry)){
        echo "Sql statements failed";
    }else{
        mysqli_stmt_bind_param($constmt,"ss",$title, $description);
        mysqli_stmt_execute($constmt);
        $conresult=mysqli_stmt_get_result($constmt);
        $conrow=mysqli_num_rows($conresult);
        if($conrow>0){
            echo "<span class='error'>Attachment already posted!</span>";
        }else{
            /*selecting company id*/
            $companyid=$_SESSION['comsec'];

            $regqry="insert into post_info(post_title,company_id,post_pay,post_description)values (?,?,?,?)";
            $regstmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($regstmt,$regqry)){
                echo "Sql statements failed";
            }else{
                mysqli_stmt_bind_param($regstmt, 'ssss',$title,$companyid,$pay,$description);
                if(mysqli_stmt_execute($regstmt)){
                    echo "Posted successfully";
                    ?>
                <script>
                    setTimeout(function(){
                        location.href="post.php"
                    },2000)
                   
                </script>
                <?php
                }else{
                    echo "Posted Failed";
                }
                
            }
        }
    }
    
}else if(isset($_POST['companysign'])){
    $companyname=$_POST['companyname'];
    $companyemail=$_POST['companyemail'];
    $companyspeciality=$_POST['companyspeciality'];
    $companypassword=$_POST['companypassword'];
    $confirmqry="select * from company_info where company_email= ? ";
    $constmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($constmt, $confirmqry)){
        echo "Sql statements failed";
    }else{
        mysqli_stmt_bind_param($constmt,"s",$companyemail);
        mysqli_stmt_execute($constmt);
        $conresult=mysqli_stmt_get_result($constmt);
        $conrow=mysqli_num_rows($conresult);
        if($conrow>0){
            echo "<span class='error'>Account already exists!</span>";
        }else{
            $regqry="insert into company_info (company_name,company_email,company_speciality)values (?,?,?)";
            $regstmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($regstmt,$regqry)){
                echo "Sql statements failed";
            }else{
                mysqli_stmt_bind_param($regstmt, 'sss',$companyname,$companyemail,$companyspeciality);
                mysqli_stmt_execute($regstmt);
                $idqry="select * from company_info order by company_id desc limit 1";
                $idresult=$conn->query($idqry);
                $idrow=mysqli_fetch_assoc($idresult);
                $id=$idrow['company_id'];
                $regpass="insert into company_log (company_id,company_password) values(?,?)";
                $idstmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($idstmt,$regpass)){
                    echo "Sql statements failed";
                }else{
                    mysqli_stmt_bind_param($idstmt, 'ss',$id,$companypassword);
                    mysqli_stmt_execute($idstmt);
                    echo "Account creation successful";
                }

            }
        }
    }
}
/*updating posts*/
if(isset($_POST['btn_updatepost'])){
    $title=$_POST['txtpost'];
    $pay=$_POST['txtpay'];
    $description=nl2br($_POST['txtdescription']);
    $prev=$_POST['prev_id'];
    
            /*selecting company id*/
            $regqry="update post_info set post_title=?,post_pay=? ,post_description=? where post_id=?";
            $regstmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($regstmt,$regqry)){
                echo "Sql statements failed";
            }else{
                mysqli_stmt_bind_param($regstmt, 'ssss',$title,$pay,$description,$prev);
                if(mysqli_stmt_execute($regstmt)){
                    echo "Updated successfully";
                }else{
                    echo "Update failed";
                }
                
                ?>
                <script>
                    setTimeout(function(){
                        location.href="view.php"
                    }, 2000)
                </script>
                <?php
            }
        }
    

else{
    $_SESSION['postid']=$_POST['postid'];
}

?>
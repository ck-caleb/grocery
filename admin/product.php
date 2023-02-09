<?php
session_start();
include("../connect.php");

if(isset($_POST['btn_add'])){
$name=$_POST['name'];
$price=$_POST['price'];
$category=$_POST['category'];
$description=$_POST['description'];

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','jfif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            
            // Insert image file name into database
            $insert = $conn->query("INSERT into products (product_name, description, category, price, product_image) VALUES ('".$name."','".$description."','".$category."','".$price."','".$fileName."')");
            if($insert){
                echo  "<script>alert('Added')</script>";
                ?>
                <script>
                    setTimeout(function(){
                        location.href='post.php'
                    },1500)
                </script>
                <?php
            }else{
                echo "<script>alert('File upload failed, please try again.')</script>";
            } 
        }else{
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }else{
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.')</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer | Post</title>
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
    <style>
        textarea{
            height:100px;

        }
    </style>
    <div id="blurr-back">
        
    </div>
    <div id="new-post">
        <h4>New Post</h4>
        <div class="line"></div>
        <div class="post-top">
            <form id="frmpost"autocomplete="off">
            <input type="text"name="txtpost"id="txtpost"placeholder="Attachment Post Title">
            <input type="number"name="txtpay"id="txtpay"placeholder="Payment if there is">
        </div>
        <textarea name="txtdescription" id="txtdescription" cols="30" rows="10"placeholder="Attachment Description"></textarea>
        <input type="button"value="POST"id="btn-post-attachment">
        <p id="postresult"></p>
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
                <div class="product">
                    <div class="product_form">
                        <form action="product.php"method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                            <input type="text"name="name"placeholder="Product Name"class="form-control"required>
                            </div>
                            <div class="form-group">
                            <select name="category" id=""class="form-control"required>
                                <option value=""selected="true"disabled>Select Category</option>
                               <?php
                                    $getselect=$conn->query("select * from category");
                                    while($sel=mysqli_fetch_assoc($getselect)){
                                        echo "<option value=".$sel['category_name'].">".$sel['category_name']."</option>";
                                    }
                               ?>
                            </select>
                        </div>
                            <div class="form-group">
                            <input type="text"name="price"placeholder="Product Price"class="form-control"required>
                        </div>
                            <div class="form-group">
                            <textarea name="description" id="" cols="30" rows="8"placeholder="Description"class="form-control"required></textarea>
                        </div>
                            <div class="form-group">
                                <input type="file"name="file"required>
                            </div>
                            <input type="submit"value="ADD"class="btn btn-primary"name="btn_add">
                        </form>
                    </div>
                </div>
        </div>
</body>
</html>
</table>
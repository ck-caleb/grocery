<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOODPLUS</title>
    <link rel="stylesheet" href="style.css?V=<?php echo time(); ?>">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <script src="js/jquery.js"></script>
    <script src="js/dt.js"></script>
    <script src="js/dtbt.js"></script>
    <script src="js.js?v=<?php echo time(); ?>"></script>


</head>

<body>

    <style>
        #capital {
            position: absolute;
            width: 100%;
            height: 100vh;
            background-color: black;
            opacity: 0.5;
            z-index: 5;
            display: none;
        }

        #cartpanel {

            position: absolute;
            width: 30%;
            height: 100vh;
            background-color: white;
            margin-left: 70%;
            z-index: 6;
            display: none;

        }

        .cart_image {
            width: 100%;
            height: 80vh;
        }

        .cart_image img {
            width: 96%;
            margin-left: 2%;
        }

        .cart_image h3 {
            font-size: 24px;
            margin-left: 15%;
        }

        .cart_image input {
            width: 70%;
            margin-left: 15%;
            height: 40px;
            border: 1px solid rgb(150, 150, 150);
            border-radius: 7px;
            margin-top: 20px;
        }

        .cart_image h4 {
            font-size: 25px;
            font-weight: bold;
            margin-top: 10px;
            margin-left: 15%;
        }

        .cart_image input[type=button] {
            background-color: green;
            border: 0;
            border-radius: 0px;
            color: white;
        }
    </style>
    <div id="capital">

    </div>
    <div id="cartpanel">
        <!--  -->
        <div class="cart_image">
            <img src="images/1.png" alt="" id="cart-image">
            <h3 id="item-title">Title</h3>
            <h4 id="item-price">Ksh. 1500</h4>
            <form id="frmcart">
                <input type="hidden" value="" id="item-id" name="item_id">
                <input type="number" value="1" name="quantity">
                <input type="button" value="ADD TO CART" id="btn_add">
                <div id="frm"></div>
            </form>
        </div>

        <!--  -->
    </div>

    <header>
        <div class="header-1">
            <a href="#" class="logo"> <i class=" fas fa-shopping-basket"></i>FoodPlus!!</a>
            <form action="" class="search-box-container">
                <input type="search" id="search-box" class="fa fa-search">
                <label for="search-box" class="fa fa-search"> </label>
            </form>
        </div>
        <div class="header-2">
            <div id="menu-bar" class="fa fa-bars">

            </div>
            <style>
                #leresult {
                    font-size: 18px;
                    margin-top: 10px;
                    height: 20px;
                    color: red;
                }
            </style>
            <div class="login form" id="form-login">
                <form id="frmlogin">
                    <li id="userhid">
                        <h3>Login Here </h3>
                    </li>
                    <input type="text" name="email" placeholder="email" id="email">
                    <input type="text" name="password" placeholder="password" id="password">
                    <input type="button" name="Login" VALUE="LOGIN" class="btn btn-primary" style="color:#FFFFFF" id="btn_login">
                    <div id="leresult"></div>
                    <p>dont have account?<a href="signup.php"><span>sign up</span></a></p>
                    -
                </form>
            </div>

            <nav class="navibar">
                <a href="#">Home</a>
                <a href="#product">Product</a>
                <a href="#contact">Contact</a>

            </nav>

            <div class="icon">
                <a href="cart.php" class="fa fa-shopping-cart"></a>
                <a href="#" class="fa fa-heart"></a>

                <a href="#" class="fa fa-user-circle" id="user"></a>
            </div>


        </div>

    </header>
    <section class="home" id="home">
        <div class="image">
            <img src="images/green.png" alt="">
        </div>

        <div class="content">
            <span>Fresh and Organic</span>
            <h3>Your Daily Need Product</h3>


        </div>
    </section>
    <section class="banner-container">
        <div class="banner">
            <img src="images/tr.png" alt="">
            <div class="content">
                <h3>special offer</h3>
                <p>upto 45% offer</p>


            </div>
        </div>
        <div class="banner">
            <img src="images/orange.png" alt="">
            <div class="content">
                <h3>Limited offer</h3>
                <p>upto 50% off</p>


            </div>
        </div>

    </section>

    <section class="product" id="product">
        <h1 class="heading">latest<span> Products</span></h1>
        <div class="box-container">
            <?php
            $product = $conn->query("select * from products");
            while ($productrow = mysqli_fetch_assoc($product)) {
            ?>
                <div class="box">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div>
                    <?php
                    echo "<img class='item-image' src='admin/uploads/" . $productrow['product_image'] . "'>";
                    ?>
                    <h3 class="product-id"><?php echo $productrow['product_id']; ?></h3>
                    <h3 class="product-name"><?php echo $productrow['product_name']; ?></h3>

                    <div class="price item-price">Ksh <?php echo $productrow['price']; ?><span></span></div>

                    <a href="#" class="btn">Add to Cart</a>
                </div>
            <?php
            }
            ?>

        </div>

    </section>

    <section class="contact" id="contact">
        <h1 class="heading">Contact<span> Us</span></h1>
        <form action="">
            <div class="inputBox">
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="Number">
                <input type="text" placeholder="Subject">
            </div>
            <textarea placeholder="Message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>
        <div class="box-container"></div>
        <div class="box"></div>
    </section>
    <section class="newsletter" id="newsletter">
        <h3>Subscribe For Latest Updates!</h3>
        <form action="">
            <input class="box" type="email" placeholder="Enter Your Email">
            <input type="submit" value="Subscribe" class="btn">
        </form>
    </section>
    <section class="footer">

        <div class="box-container">
            <div class="box">
                <a href="#" class="logo"> <i class=" fas fa-shopping-basket"></i>FoodPlus!!</a>
                <p>Fresh and Organic.Shop at your confort zone. <br>Free delivery</p>

                <div class="share">
                    <a href="#" class="btn fab fa-facebook-f"></a>
                    <a href="#" class="btn fab fa-twitter"></a>
                    <a href="#" class="btn fab fa-instagram"></a>
                    <a href="#" class="btn fab fa-linkedin"></a>

                </div>
            </div>
            <div class="box">
                <h3>Contact info</h3>
                <a href="#" class="links"><i class="fas fa-phone"></i>+254746928202</a>
                <a href="#" class="links"><i class="fas fa-phone"></i>+254746928202</a>
                <a href="#" class="links"><i class="fas fa-envelope"></i>mdaicaleb@gmail.com</a>
                <a href="#" class="links"><i class="fas fa-map-marker-alt"></i>kericho, Kenya-80100</a>


                <h1 class="credit">Designed by <span> CALEB KOECH </span> | All Rights Reserved!</h1>
    </section>
</body>

</html>

<script>
    $('.btn').on('click', function() {
        var title = $(this).closest('.box').find('.product-name')[0].innerText
        var price = $(this).closest('.box').find('.item-price')[0].innerText
        var id = $(this).closest('.box').find('.product-id')[0].innerText
        // var imgstring=$(this).closest('.box').find('.item-image').getAttribute("src")
        // document.getElementById('cart-image').setAttribute("src", imgstring)
        document.getElementById('item-id').value = id
        $('#item-title').html(title)
        $('#item-price').html(price)

        document.getElementById('capital').style.display = 'block'
        document.getElementById('cartpanel').style.display = 'block'
        document.body.style.overflowY = "hidden"
    })
    document.getElementById('capital').onclick = function() {
        document.getElementById('capital').style.display = 'none'
        document.getElementById('cartpanel').style.display = 'none'
        document.body.style.overflowY = "scroll"
    }
    $('#btn_add').on('click', function() {
        var data = $('#frmcart').serialize()
        $.ajax({
            url: 'addcart.php',
            method: 'POST',
            data: data,
            success: function(data) {
                setTimeout(function() {
                    $('#frm').html(data)
                }, 2000)
            }
        })
    })

    let countDate = new Date('october 29,2022 00:00:00').getTime();

    function countDown() {
        let now = new Date().getTime();
        gap = countDate - now;

        let second = 1000;
        let minute = second * 60;
        let hour = minute * 60;
        let day = hour * 24;

        let d = Math.floor(gap / (day));
        let h = Math.floor((gap % (day)) / (hour));
        let m = Math.floor((gap % (hour)) / (minute));
        let s = Math.floor((gap % (minute)) / (second));

        document.getElementById('day').innerText = d;
        document.getElementById('hour').innerText = h;
        document.getElementById('minute').innerText = m;
        document.getElementById('second').innerText = s;
    }
</script>

<script>
    var user = document.getElementById('user').onclick = function() {
        var login = document.getElementById('form-login')
        login.style.display = 'block'
    }
    // hidding
    var userid = document.getElementById('userhid').onclick = function() {
        var login = document.getElementById('form-login')
        login.style.display = 'none'
    }
    var userid = document.getElementById('carthid').onclick = function() {
        var login = document.getElementById('add-cart')
        login.style.display = 'none'
    }

    var btncat = document.getElementById('cart-btn').onclick = function() {
        var cart = document.getElementById('add-cart');


        cart.style.display = 'block';

    }
</script>
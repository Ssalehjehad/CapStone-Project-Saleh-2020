<?php
session_start();
include_once('includs/customer_header.php');
require('includs/connection.php');

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["theCart"] as $keys => $valuesd) {
            if ($valuesd["pro0_id"] == $_GET["iddd"]) {
                unset($_SESSION["theCart"][$keys]);
                echo '<script>alert("item Removed")</script>';
                echo "<script>window.location.href = 'single_product.php?productId={$_GET["iddd"]}'</script>";
            }
        }
    }
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="images/logo/logo.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="index.php">Home</a></li>


                                    </li>
                                    <li class="drop"><a href="grid_view.php">Shop</a>
                                        <ul class="dropdown mega_dropdown">
                                            <!-- Start Single Mega MEnu -->
                                            <li><a class="mega__title" href="grid_view.php">Shop </a>
                                                <ul class="mega__item">
                                                    <?php
                                                    $qurry1  = "SELECT * FROM category";
                                                    $result1 = mysqli_query($conn, $qurry1);
                                                    while ($cat = mysqli_fetch_assoc($result1)) {
                                                        if ($cat['cat_status'] == "active") {
                                                            echo "<li><a href='grid_view.php?catId={$cat['cat_id']}'> {$cat['cat_name']} <i class='zmdi zmdi-chevron-right'></i></a>";
                                                            echo "<div class='category-menu-dropdown'>
                                                     <div class='category-part-1 category-common mb--30'>";
                                                            echo "<ul>";
                                                        }

                                                        $qurry2  = "SELECT * FROM sub_category WHERE cat_id ={$cat['cat_id']}";
                                                        $result2 = mysqli_query($conn, $qurry2);
                                                        while ($sub_cat = mysqli_fetch_assoc($result2)) {
                                                            if (($sub_cat['sub_cat_status'] == "active") && ($cat['cat_status'] == "active")) {
                                                                echo "<li><a href='grid_view.php?catId={$cat['cat_id']}&subId={$sub_cat['sub_cat_id']}'>{$sub_cat['subcat_name']}</a></li>";
                                                            }
                                                        }
                                                        if ($cat['cat_status'] == "active") {
                                                            echo "</ul>
                                              </div>
                                              </div>
                                              </li>  ";
                                                        }
                                                    }
                                                    ?>

                                                </ul>
                                            </li>
                                            <!-- End Single Mega MEnu -->
                                            <!-- Start Single Mega MEnu -->
                                            <li><a class="mega__title" href=""></a>
                                                <ul class="mega__item">
                                                    <li><a href=""></a></li>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- End Single Mega MEnu -->
                                    <!-- Start Single Mega MEnu -->
                                    <li>
                                        <ul class="mega__item">
                                            <li>
                                                <div class="mega-item-img">
                                                    <a href="grid_view.php">
                                                        <img src="images/panal.jpg" alt="" style="width: 200px; height:340px">
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- End Single Mega MEnu -->
                                </ul>
                                </li>

                                <li><a href="about.php">about</a></li>
                                <li><a href="contact.php">contact</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                      
                                        
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">
                            <ul class="menu-extra">
                                
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                <li><a href="login-register.php"><span class="ti-user"></span></a></li>
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                                <?php 
                                if(isset($_SESSION['customer_id'])&&!empty($_SESSION['customer_id'])){
                                    echo "<li><a href='logout.php'>LogOut</a></li>";
                                }else{

                                }
                                ?>                 
                            </ul>
                        </div>
                         
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <?php
                        $total = 0;
                        if (!isset($_SESSION["theCart"])) {
                            $total = 0;
                        }
                        if (!empty($_SESSION["theCart"])) {
                            $total = 0;
                            foreach ($_SESSION["theCart"] as $keys => $values) {
                        ?>
                                <!-- Single Cart Item -->

                                <div class="shp__single__product">
                                    <div class="shp__pro__thumb">
                                        <a href="single_product.php?productId=<?php echo $values["pro0_id"]; ?>">
                                            <img src=<?php echo "admin/images/{$values['pro0_img']}" ?> alt="product images">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="single_product.php?productId=<?php echo $values["pro0_id"]; ?>"><?php echo $values['pro0_name'] ?></a></h2>
                                        <span class="quantity">quantity: <?php echo $values['pro0_qun'] ?></span>
                                        <span class="shp__price">&#36;<?php echo $values['pro0_price'] ?></span>
                                        <span class="shp__price">Total : &#36;<?php echo number_format((int)$values["pro0_qun"] * (int)$values["pro0_price"], 2);  ?></span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="?iddd=<?php echo $values["pro0_id"]; ?>&action=delete" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                                    </div>
                                </div>
                        <?php
                                $total = $total + ((int)$values["pro0_qun"] * (int)$values["pro0_price"]);
                            }
                        }
                        ?>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">&#36;<?php echo $total ?></li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.php">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
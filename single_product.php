<?php
ob_start(); //incase of multi requests

include_once('includs/customer_header.php');
require('includs/connection.php');
$qurry0     = "SELECT * FROM product WHERE product_id ={$_GET['productId']}";
$result0    = mysqli_query($conn, $qurry0);
$pro0       = mysqli_fetch_assoc($result0);

$qurry1     = "SELECT * FROM pro_images WHERE product_id ={$_GET['productId']}";
$result1    = mysqli_query($conn, $qurry1);
$proImgs    = mysqli_fetch_assoc($result1);
$vvId       = $pro0['vendor_id'];

$qurryv1    = "SELECT * FROM vendor WHERE vendor_id ='$vvId'";
$resultv1   = mysqli_query($conn, $qurryv1);
$proVinfo   = mysqli_fetch_assoc($resultv1);

if (($pro0['product_status'] == "disabled") || ($proVinfo['vendor_status'] == "disabled")) {
    echo '<script>alert("Sorry this product not available currently")</script>';
    echo '<script>window.location="grid_view.php"</script>';
}

if (isset($_POST["addtocart"])) {
    if (isset($_SESSION["theCart"])) {
        $item_array_id = array_column($_SESSION["theCart"], "pro0_id");
        if (!in_array($_GET["productId"], $item_array_id)) {
            $count = count($_SESSION["theCart"]);
            $item_array = array(
                "pro0_id"     => $_GET["productId"],
                "pro0_color"  => $_POST["color"],
                "pro0_size"   => $_POST["size"],
                "pro0_img"    => $_POST["hidden_img"],
                "pro0_name"   => $_POST["hidden_name"],
                "pro0_price"  => $_POST["hidden_price"],
                "pro0_qun"    => $_POST["qtybutton"]
            );
            $_SESSION["theCart"][$count] = $item_array;
            header("location:single_product.php?productId={$_GET['productId']}");
        } else {
            echo '<script>alert("item Already in the cart")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    } else {
        $item_array = array(
            "pro0_id"     => $_GET["productId"],
            "pro0_color"  => $_POST["color"],
            "pro0_size"   => $_POST["size"],
            "pro0_img"    => $_POST["hidden_img"],
            "pro0_name"   => $_POST["hidden_name"],
            "pro0_price"  => $_POST["hidden_price"],
            "pro0_qun"    => $_POST["qtybutton"]
        );
        $_SESSION["theCart"][0] = $item_array;
        header("location:single_product.php?productId={$_GET['productId']}");
    }
}




?>

<!-- Start Product Details -->
<section class="htc__product__details pt--120 pb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                <div class="product__details__container">
                    <!-- Start Small images -->
                    <ul class="product__small__images" role="tablist">
                        <li role="presentation" class="pot-small-img active">
                            <a href="#img-tab-1" role="tab" data-toggle="tab">
                                <img src=<?php echo "admin/images/{$proImgs['img1']}" ?> alt="small-image" style="height: 140px; width :140px">
                            </a>
                        </li>
                        <li role="presentation" class="pot-small-img">
                            <a href="#img-tab-2" role="tab" data-toggle="tab">
                                <img src=<?php echo "admin/images/{$proImgs['img2']}" ?> alt="small-image" style="height: 140px; width :140px">
                            </a>
                        </li>
                        <li role="presentation" class="pot-small-img hidden-xs">
                            <a href="#img-tab-3" role="tab" data-toggle="tab">
                                <img src=<?php echo "admin/images/{$proImgs['img3']}" ?> alt="small-image" style="height: 140px; width :140px">
                            </a>
                        </li>
                        <li role="presentation" class="pot-small-img hidden-xs hidden-sm">
                            <a href="#img-tab-4" role="tab" data-toggle="tab">
                                <img src=<?php echo "admin/images/{$proImgs['img4']}" ?> alt="small-image" style="height: 140px; width :140px">
                            </a>
                        </li>
                    </ul>
                    <!-- End Small images -->
                    <div class="product__big__images">
                        <div class="portfolio-full-image tab-content">
                            <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                <img src=<?php echo "admin/images/{$proImgs['img1']}" ?> alt="small-image" style="height: 590px; width :620px">
                                <div class="product-video">
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BBJa32lCaaY">
                                        <i class="zmdi zmdi-videocam"></i> View Video
                                    </a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-2">
                                <img src=<?php echo "admin/images/{$proImgs['img2']}" ?> alt="small-image" style="height: 590px; width :620px">
                                <div class="product-video">
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BBJa32lCaaY">
                                        <i class="zmdi zmdi-videocam"></i> View Video
                                    </a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-3">
                                <img src=<?php echo "admin/images/{$proImgs['img3']}" ?> alt="small-image" style="height: 590px; width :620px">
                                <div class="product-video">
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BBJa32lCaaY">
                                        <i class="zmdi zmdi-videocam"></i> View Video
                                    </a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade product-video-position" id="img-tab-4">
                                <img src=<?php echo "admin/images/{$proImgs['img4']}" ?> alt="small-image" style="height: 590px; width :620px">
                                <div class="product-video">
                                    <a class="video-popup" href="https://www.youtube.com/watch?v=BBJa32lCaaY">
                                        <i class="zmdi zmdi-videocam"></i> View Video
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2><?php echo $pro0['product_name']; ?></h2>
                    </div>
                    <div class="pro__dtl__rating">
                        <ul class="pro__rating">
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                            <li><span class="ti-star"></span></li>
                        </ul>
                        <span class="rat__qun"></span>
                    </div>
                    <div class="pro__details">
                        <p><?php echo $pro0['product_desc']; ?>. </p>
                    </div>
                    <?php
                    if ($pro0['product_price'] == $pro0['product_discount']) {
                        echo "<ul class='pro__dtl__prize'>
                                <li >&#36;{$pro0['product_price']}</li>
                                
                             </ul>";
                    } else {
                        echo "<ul class='pro__dtl__prize'>
                                 <li class='old__prize'>&#36;{$pro0['product_price']}</li>
                                 <li>&#36;{$pro0['product_discount']}</li>
                             </ul>";
                    }
                    ?>
                    <form action="" method="post">
                        <div class="pro__dtl__color row">
                            <h2 class="title__5">Choose Colour</h2>
                            <select class="col-3 " name="color" id="size">
                                <option value="red" style="color: red;">Red</option>
                                <option value="blue" style="color: blue;">Blue</option>
                                <option value="purple" style="color: purple;">Purple</option>
                                <option value="yellow" style="color:yellow ;">Yellow</option>
                            </select>
                        </div>
                        <div class="pro__dtl__size row">
                            <h2 class="title__5">Size</h2>
                            <select class="col-3" name="size" id="size">
                                <option value="xl">xl</option>
                                <option value="m">m</option>
                                <option value="ml">ml</option>
                                <option value="lm">lm</option>
                                <option value="xxl">xxl</option>
                            </select>

                        </div>
                        <div class="product-action-wrap">
                            <div class="prodict-statas"><span>Quantity :</span></div>
                            <div class="product-quantity">
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input type="hidden">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($pro0['product_price'] == $pro0['product_discount']) {
                            echo "<input type='hidden' name='hidden_price' value= '{$pro0['product_price']}'>";
                            echo "<input type='hidden' name='hidden_name' value= '{$pro0['product_name']}'>";
                            echo "<input type='hidden' name='hidden_img' value= '{$proImgs['img1']}'>";
                        } else {
                            echo "<input type='hidden' name='hidden_price' value= '{$pro0['product_discount']}'>";
                            echo "<input type='hidden' name='hidden_name' value= '{$pro0['product_name']}'>";
                            echo "<input type='hidden' name='hidden_img' value= '{$proImgs['img1']}'>";
                        }
                        ?>
                        <ul class="pro__dtl__btn">
                            <div class="contact-btn fv-btn">
                                <li class=""><button class="fv-btn" name="addtocart">Add to cart</button></a></li>
                            </div>
                        </ul>
                    </form>
                    <div class="pro__social__share">
                        <h2>Share :</h2>
                        <ul class="pro__soaial__link">
                            <li><a href="https://twitter.com"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com"><i class="zmdi zmdi-instagram"></i></a></li>
                            <li><a href="https://www.facebook.com"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a href="https://plus.google.com"><i class="zmdi zmdi-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- End Product Details -->
<!-- Start Product tab -->
<section class="htc__product__details__tab bg__white pb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <ul class="product__deatils__tab mb--60" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#description" role="tab" data-toggle="tab">Description</a>
                    </li>
                    <li role="presentation">
                        <a href="#sheet" role="tab" data-toggle="tab">Vendor </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product__details__tab__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="product__tab__content fade in active">
                        <div class="product__description__wrap">
                            <div class="product__desc">
                                <h2 class="title__6">Details</h2>
                                <p><?php echo $pro0['product_desc']; ?>.</p>
                            </div>
                            <div class="pro__feature">
                                <h2 class="title__6">Features</h2>
                                <ul class="feature__list">
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $pro0['product_desc']; ?>.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $pro0['product_desc']; ?>.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $pro0['product_desc']; ?>. </a></li>
                                    <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $pro0['product_desc']; ?>.</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="sheet" class="product__tab__content fade">
                        <div class="pro__feature">
                            <h2 class="title__6">Vendor Data</h2>
                            <ul class="feature__list">
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php

                                                                                        echo $proVinfo['vendor_name']; ?>.</a></li>
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $proVinfo['vendor_name'];  ?>.</a></li>
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $proVinfo['vendor_company']; ?>.</a></li>
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $proVinfo['vendor_company']; ?>.</a></li>
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $proVinfo['vendor_company']; ?>.</a></li>
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $proVinfo['vendor_company']; ?>.</a></li>
                                <li><a href="#"><i class="zmdi zmdi-play-circle"></i><?php echo $proVinfo['vendor_company']; ?>.</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->

                    <!-- End RAting Area -->

                </div>
                <!-- End Single Content -->
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Product tab -->
<?php include_once('includs/customer_footer.php') ?>
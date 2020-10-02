<?php
ob_start(); //incase of multi requests
include_once('includs/customer_header.php');
require('includs/connection.php');
?>
<!-- Start Feature Product -->
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                <!-- Start Slider Area -->
                <div class="slider__container slider--one">
                    <div class="slider__activation__wrap owl-carousel owl-theme">
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url(images/1.jpg) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn " href="cart.php" style="color: white;">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(images/2.jpg) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.php">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                    </div>
                </div>
                <!-- Start Slider Area -->
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                <div class="categories-menu mrg-xs">
                    <div class="category-heading">
                        <h3> Browse Categories</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
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
                    </div>
                </div>
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
<!-- End Feature Product -->
<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="grid_view.php"><img src="images/4.jpg" alt="new product"></a>
        </div>
        <div class="slider__inner">
            <h1>New Watches<span class="text--theme">Collection</span></h1>

        </div>
    </div>
</div>
<?php
$qurry111     = "SELECT * FROM category LIMIT 4";
$result111    = mysqli_query($conn, $qurry111);
while ($catUi = mysqli_fetch_assoc($result111)) {

    $qurry112   = "SELECT * FROM product WHERE cat_id ='{$catUi['cat_id']}' ORDER BY cat_id DESC  LIMIT 6";
    $result112  = mysqli_query($conn, $qurry112);

    $qurry113   = "SELECT * FROM sub_category WHERE cat_id ='{$catUi['cat_id']}'";
    $result113  = mysqli_query($conn, $qurry113);


?>
    <section class="htc__product__area bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-categories-all">
                        <div class="product-categories-title">
                            <h3><?php echo $catUi['cat_name'];  ?></h3>
                        </div>
                        <div class="product-categories-menu">
                            <ul>
                                <?php
                                while ($subCatUi = mysqli_fetch_assoc($result113)) {
                                    echo "<li><a href='grid_view.php?catId={$catUi['cat_id']}'>{$subCatUi['subcat_name']}</a></li>";
                                }     ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="tab-style" role="tablist">
                                <li class="active">
                                    <a href="#home1" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>latest </h4>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane active" id="home1">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <?php

                                        while ($proUi   = mysqli_fetch_assoc($result112)) {
                                            $qurry114   = "SELECT * FROM pro_images WHERE product_id ='{$proUi['product_id']}'";
                                            $result114  = mysqli_query($conn, $qurry114);
                                            $proImgUi   = mysqli_fetch_assoc($result114);

                                        ?>
                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a href="single_product.php?productId=<?php echo $proUi['product_id']; ?>">
                                                                <img src="admin/images/<?php echo $proImgUi['img1']; ?>" alt="product images" style="width: 310px;height:270px;">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="single_product.php?productId=<?php echo $proUi['product_id']; ?>"><?php echo $proUi['product_name']; ?></a></h2>
                                                        <ul class="product__price">
                                                            <?php if ($proUi['product_price'] == $proUi['product_discount']) {
                                                                echo "<li class='new__price'>&#36;{$proUi['product_price']}</li>";
                                                            } else {
                                                                echo "<li class='old__price'>&#36;{$proUi['product_price']}</li>
                                                                     <li class='new__price'>&#36;{$proUi['product_discount']}</li>";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php
}
?>

<!-- End Our Product Area -->

<?php include_once('includs/customer_footer.php') ?>
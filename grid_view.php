<?php
ob_start(); //incase of multi requests
include_once('includs/customer_header.php');
require('includs/connection.php');
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;height:200px;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Shop Page</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Shop Page</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Our Product Area -->
<section class="htc__product__area shop__page ptb--130 bg__white">
    <div class="container">
        <div class="htc__product__container">
            <!-- Start Product MEnu -->
            <div class="row">
                <div class="col-md-12">
                    <div class="filter__menu__container">
                        <div class="product__menu">
                            <button data-filter="*" class="is-checked">All</button>
                            <?php
                            if (isset($_GET['catId'])) {
                                $qurry001  = "SELECT * FROM category WHERE cat_id={$_GET['catId']}";
                                $result001 = mysqli_query($conn, $qurry001);
                                $cat0      = mysqli_fetch_assoc($result001);
                                if ($cat0['cat_status'] == "active") {
                                    $qurry0  = "SELECT * FROM sub_category WHERE cat_id={$_GET['catId']}";
                                    $result0 = mysqli_query($conn, $qurry0);
                                    while ($subcat = mysqli_fetch_assoc($result0)) {
                                        if ($subcat['sub_cat_status'] == "active") {
                                            echo "<button data-filter='.cat--{$subcat['sub_cat_id']}'>{$subcat['subcat_name']}</button>";
                                        }
                                    }
                                }
                            } else {
                                $qurry001      = "SELECT * FROM category ";
                                $result001     = mysqli_query($conn, $qurry001);
                                while ($cat00  = mysqli_fetch_assoc($result001)) {
                                    echo " <a class='htc__btn ' href='grid_view.php?catId={$cat00['cat_id']}' style='margin-left: 20px;'>{$cat00['cat_name']}</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product MEnu -->
            <div class="row">
                <div class="product__list another-product-style">
                    <!-- Start Single Product -->
                    <?php
                    if (isset($_GET['catId'])) {
                        $qurry1   = "SELECT * FROM product WHERE cat_id={$_GET['catId']}";
                        $result1  = mysqli_query($conn, $qurry1);
                        $qurry01  = "SELECT * FROM category WHERE cat_id={$_GET['catId']}";
                        $result01 = mysqli_query($conn, $qurry01);
                        $cat      = mysqli_fetch_assoc($result01);
                        if ($cat['cat_status'] == "active") {
                            while ($cat_pro = mysqli_fetch_assoc($result1)) {
                                $qurry2     = "SELECT * FROM sub_category WHERE sub_cat_id ={$cat_pro['sub_cat_id']}";
                                $result2    = mysqli_query($conn, $qurry2);
                                $subcat_pro = mysqli_fetch_assoc($result2);

                                $qurryv1    = "SELECT * FROM vendor WHERE vendor_id ={$cat_pro['vendor_id']}";
                                $resultv1   = mysqli_query($conn, $qurryv1);
                                $proVinfo   = mysqli_fetch_assoc($resultv1);
                                
                                if (($cat_pro['product_status'] == "active") && ($subcat_pro['sub_cat_status'] == "active") && ($proVinfo['vendor_status'] == "active")) {
                                    $qurry3  = "SELECT * FROM pro_images WHERE product_id ={$cat_pro['product_id']}";
                                    $result3 = mysqli_query($conn, $qurry3);
                                    $img_pro = mysqli_fetch_assoc($result3);
                                    echo "<div class='col-md-3 single__pro col-lg-3 cat--1 cat--{$cat_pro['sub_cat_id']} col-sm-4 col-xs-12'>
                                <div class='product foo'>
                                    <div class='product__inner'>
                                        <div class='pro__thumb'>
                                            <a href='single_product.php?productId={$cat_pro['product_id']}'>
                                                <img src='admin/images/{$img_pro['img1']}' alt='product images'>
                                            </a>
                                        </div>
                                       
                                    </div>
                                    <div class='product__details'>
                                        <h2><a href='single_product.php?productId={$cat_pro['product_id']}'>{$cat_pro['product_name']}</a></h2>";
                                    if ($cat_pro['product_price'] == $cat_pro['product_discount']) {
                                        echo "<ul class='product__price'>
                                                      <li class='new__price'>&#36;{$cat_pro['product_price']}</li>
                                                 </ul>";
                                    } else {
                                        echo "<ul class='product__price'>
                                                    <li class='old__price'>&#36;{$cat_pro['product_price']}</li>
                                                    <li class='new__price'>&#36;{$cat_pro['product_discount']}</li>
                                                 </ul>";
                                    }
                                    echo "    </div>
                                                  </div>
                                                </div>";
                                }
                            }
                        }
                    } else {
                        $qurry01  = "SELECT * FROM category ";
                        $result01 = mysqli_query($conn, $qurry01);
                        while ($cat      = mysqli_fetch_assoc($result01)) {
                            if ($cat['cat_status'] == "active") {
                                $qurry1  = "SELECT * FROM product WHERE cat_id={$cat['cat_id']} ";
                                $result1 = mysqli_query($conn, $qurry1);
                                while ($cat_pro = mysqli_fetch_assoc($result1)) {
                                    $qurry2     = "SELECT * FROM sub_category WHERE sub_cat_id ={$cat_pro['sub_cat_id']}";
                                    $result2    = mysqli_query($conn, $qurry2);
                                    $subcat_pro = mysqli_fetch_assoc($result2);

                                    $qurryv1    = "SELECT * FROM vendor WHERE vendor_id ={$cat_pro['vendor_id']}";
                                    $resultv1   = mysqli_query($conn, $qurryv1);
                                    $proVinfo   = mysqli_fetch_assoc($resultv1);

                                    if (($cat_pro['product_status'] == "active") && ($subcat_pro['sub_cat_status'] == "active")&& ($proVinfo['vendor_status'] == "active")) {
                                        $qurry3  = "SELECT * FROM pro_images WHERE product_id ={$cat_pro['product_id']}";
                                        $result3 = mysqli_query($conn, $qurry3);
                                        $img_pro = mysqli_fetch_assoc($result3);
                                        echo "<div class='col-md-3 single__pro col-lg-3 cat--1 cat--{$cat_pro['sub_cat_id']} col-sm-4 col-xs-12'>
                            <div class='product foo'>
                                <div class='product__inner'>
                                    <div class='pro__thumb'>
                                        <a href='single_product.php?productId={$cat_pro['product_id']}'>
                                            <img src='admin/images/{$img_pro['img1']}' alt='product images'>
                                        </a>
                                    </div>
                                   
                                </div>
                                <div class='product__details'>
                                    <h2><a href='single_product.php?productId={$cat_pro['product_id']}'>{$cat_pro['product_name']}</a></h2>";
                                        if ($cat_pro['product_price'] == $cat_pro['product_discount']) {
                                            echo "<ul class='product__price'>
                                                  <li class='new__price'>&#36;{$cat_pro['product_price']}</li>
                                             </ul>";
                                        } else {
                                            echo "<ul class='product__price'>
                                                <li class='old__price'>&#36;{$cat_pro['product_price']}</li>
                                                <li class='new__price'>&#36;{$cat_pro['product_discount']}</li>
                                             </ul>";
                                        }
                                        echo "    </div>
                                              </div>
                                            </div>";
                                    }
                                }
                            }
                        }
                    }
                    ?>
                    <!-- End Single Product -->
                </div>
            </div>
            <!-- Start Load More BTn -->
            <div class="row mt--60">
                <div class="col-md-12">
                    <div class="htc__loadmore__btn">
                        <a href="#">load more</a>
                    </div>
                </div>
            </div>
            <!-- End Load More BTn -->
        </div>
    </div>
</section>
<!-- End Our Product Area -->
<!-- Start Footer Area -->
<!-- Body main wrapper end -->
<!-- QUICKVIEW PRODUCT -->

<!-- END QUICKVIEW PRODUCT -->
<!-- Placed js at the end of the document so the pages load faster -->



<?php include_once('includs/customer_footer.php') ?>
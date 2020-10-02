<?php
ob_start(); //incase of multi requests

include_once('includs/customer_header.php');
require('includs/connection.php');

?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;height:200px">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cart</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total2 = 0;
                                if (!isset($_SESSION["theCart"])) {
                                    $total2 = 0;
                                }
                                if (!empty($_SESSION["theCart"])) {
                                    $total2 = 0;
                                    foreach ($_SESSION["theCart"] as $keys => $values2) {
                                        $pro_total    = number_format((int)$values2["pro0_qun"] * (int)$values2["pro0_price"], 2);
                                        echo "
                                <tr>
                                <td class='product-thumbnail'><a href='single_product.php?productId={$values2['pro0_id']}'><img src='admin/images/{$values2['pro0_img']}' alt='product img' /></a></td>
                                <td class='product-name'><a href='single_product.php?productId={$values2['pro0_id']}'>{$values2['pro0_name']}</a></td>
                                <td class='product-price'><span class='amount'>&#36;{$values2['pro0_price']}</span></td>
                                <td class='product-quantity'>{$values2['pro0_qun']}</td>
                                <td class='product-subtotal'> &#36;$pro_total</td>
                                <td class='product-remove'><a href='#'>X</a></td>
                                </tr>";
                                        $total2 = $total2 + ((int)$values2["pro0_qun"] * (int)$values2["pro0_price"]);
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                                <a href="index.php">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Cart Total: &#36;<?php echo $total2 ?></h2>
                                <br>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">&#36;<?php echo $total2 ?></span></td>
                                        </tr>
                                        <tr>
                                            <th>Tax rate :</th>
                                            <td><span class="amount">8%</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">&#36;<?php echo ($total2 * 0.08) + $total2 ?></span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                                <br>
                                <hr>
                                <div class="wc-proceed-to-checkout">
                                    <a href="checkout.php">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->


<?php include_once('includs/customer_footer.php') ?>
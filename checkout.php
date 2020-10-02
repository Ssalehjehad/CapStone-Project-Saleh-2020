<?php
ob_start(); //incase of multi requests

include_once('includs/customer_header.php');
require('includs/connection.php');
if (!isset($_SESSION['theCart']) || empty($_SESSION['theCart'])) {
    echo "<script type='text/javascript'>alert('No Items In The Cart');window.location.href='cart.php';</script>";
}
if (!isset($_SESSION['customer_id'])) {
    header("location:login-register-check.php");
} else {
    $customerIdForCheck = $_SESSION['customer_id'];
    $qury0     = "SELECT * from customer WHERE customer_id      ='$customerIdForCheck' ";
    $result0   = mysqli_query($conn, $qury0);
    $customer0 = mysqli_fetch_assoc($result0);
}
if (isset($_POST['orderDone'])) {
    if (isset($_GET['type'])) {
        $paymentType  = $_GET['type'];

        $nameOnCard   = $_POST['namecard'];
        $codeCard     = $_POST['codecard'];
        $numOnCard    = $_POST['numcard'];
        $expCard      = $_POST['expcard'];
        $nowDate      = date("Y-m-d h:i");
        $qury1        = "SELECT * from payment WHERE      payment_type    ='$paymentType' AND
                                                          payment_name    ='$nameOnCard'  AND
                                                          security_code	  ='$codeCard'    AND
                                                          payment_num     ='$numOnCard'   AND
                                                          payment_exp     ='$expCard' ";
        $result1   = mysqli_query($conn, $qury1);
        $payment = mysqli_fetch_assoc($result1);
        if (!empty($payment['payment_id']) && ($payment['allowed'] == "allowed")) {
            $paymentId   = $payment['payment_id'];
            $customerId1 = $_SESSION['customer_id'];
            $stmt = $conn->prepare("INSERT INTO orders(customer_id, payment_id, order_date)
            VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $customerId1, $paymentId, $nowDate);
            $stmt->execute();
            $stmt->close();
            $lastorder_id = $conn->insert_id;
            foreach ($_SESSION["theCart"] as $keys => $values3) {

                $pId       = $values3['pro0_id'];
                $pPrice    = $values3['pro0_price'];
                $pQun      = $values3['pro0_qun'];
                $pSize     = $values3['pro0_size'];
                $pColor    = $values3['pro0_color'];


                $stmt = $conn->prepare("INSERT INTO order_details( orders_id,product_id, price, quantity, size, color)
                                        VALUES ( ?, ?, ?, ?, ?,?)");
                $stmt->bind_param("iissss", $lastorder_id, $pId, $pPrice, $pQun, $pSize, $pColor);
                $stmt->execute();
                $stmt->close();
            }
            unset($_SESSION['theCart']);
            echo "<script type='text/javascript'>alert('Thank you for shopping with Us');</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Make sure all payment details are correct and your card is active');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Pick A Payment Method');</script>";
    }
}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;height:200px">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="ckeckout-left-sidebar">
                    <div class="our-payment-sestem">
                        <h2 class="section-title-3">We Accept : Select One*</h2>
                        <ul class="payment-menu">
                            <li><a href="checkout.php?type=visa"><img src="images/payment/1.jpg" alt="payment-img"></a></li>
                            <li><a href="checkout.php?type=mastercard"><img src="images/payment/2.jpg" alt="payment-img"></a></li>
                            <li><a href="checkout.php?type=paypal"><img src="images/payment/3.jpg" alt="payment-img"></a></li>
                            <li><a href="checkout.php?type=discover"><img src="images/payment/4.jpg" alt="payment-img"></a></li>
                            <li><a href="checkout.php?type=something"><img src="images/payment/5.jpg" alt="payment-img"></a></li>
                        </ul>
                    </div>
                    <!-- Start Checkbox Area -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">Billing details</h2>
                        <div class="checkout-form-inner">
                            <div class="single-checkout-box">
                                <span>Name : <?php echo $customer0['customer_name']; ?></span>
                            </div>
                            <div class="single-checkout-box">
                                <span>Email : <?php echo $customer0['customer_email']; ?></span>
                                <br>
                                <span>Phone : <?php echo $customer0['customer_phone']; ?></span>
                            </div>
                            <br>
                            <div class="single-checkout-box">
                                If you have another address mention it here :
                                <textarea name="message" placeholder="Message*"></textarea>
                            </div>
                            <div class="single-checkout-box select-option mt--40">
                                <select>
                                    <option>Country*</option>
                                    <option>Jordan</option>
                                    <option>Jordan</option>
                                    <option>Jordan</option>
                                    <option>Darna</option>
                                </select>
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- End Checkbox Area -->
                    <!-- Start Payment Box -->
                    <form action="" method="post">
                        <div class="payment-form">
                            <h2 class="section-title-3">payment details</h2>
                            <p>Don't share these informations with others</p>
                            <div class="payment-form-inner">
                                <div class="single-checkout-box">
                                    <input type="text" placeholder="Name on Card*" name="namecard">
                                    <input type="text" placeholder="Card Number*" name="numcard">
                                </div>
                                <div class="single-checkout-box select-option">
                                    <input type="text" placeholder="Exp Date* ex: 31/12/2012" name="expcard">
                                    <input type="text" placeholder="Security Code*" name="codecard">
                                </div>
                            </div>
                        </div>
                        <!-- End Payment Box -->
                        <!-- Start Payment Way -->
                        <div class="our-payment-sestem">
                            <div class="contact-btn mt--30 ">
                                <button class="fv-btn" name="orderDone">CONFIRM & BUY NOW</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Payment Way -->
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                    <div class="our-important-note">
                        <h2 class="section-title-3">Note :</h2>
                        <p class="note-desc">Hi my name is Saleh, Hi my name is Saleh, Hi my name is Saleh, Hi my name is Saleh, Hi my name is Saleh.</p>
                        <ul class="important-note">
                            <li><i class="zmdi zmdi-caret-right-circle"></i>Saleh Lorem ipsum dolor sit amet, consectetur nipabali</li>
                            <li><i class="zmdi zmdi-caret-right-circle"></i>Saleh Lorem ipsum dolor sit amet</li>
                            <li><i class="zmdi zmdi-caret-right-circle"></i>Saleh Lorem ipsum dolor sit amet, consectetur nipabali</li>
                            <li><i class="zmdi zmdi-caret-right-circle"></i>Saleh Lorem ipsum dolor sit amet, consectetur nipabali</li>
                            <li><i class="zmdi zmdi-caret-right-circle"></i>Saleh Lorem ipsum dolor sit amet</li>
                        </ul>
                    </div>
                    <div class="puick-contact-area mt--60">
                        <h2 class="section-title-3">Quick Contract</h2>
                        <a href="phone:+8801722889963">0799999999</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->

<?php include_once('includs/customer_footer.php') ?>
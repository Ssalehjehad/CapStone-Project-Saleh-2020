<?php
ob_start(); //incase of multi requests
include('config.php');
include_once('includs/customer_header.php');
require('includs/connection.php');
///////////////////////////////////////////////////
if (isset($_POST['register'])) {
    $vName       = trim($_POST['username']);
    $vEmail      = trim($_POST['useemail']);
    $vPass       = trim($_POST['usepassword']);
    $vPhone      = trim($_POST['userphone']);
    $vComapany   = trim($_POST['useaddress']);
    $vStatus     = "disabled";

    $fillingBool    =
        (!("" == $vName)) &&
        (!("" == $vEmail)) &&
        (!("" == $vPass)) &&
        (!("" == $vPhone)) &&
        (!("" == $vComapany));
    if (true == $fillingBool) {
        $stmt = $conn->prepare("INSERT INTO vendor(vendor_name, vendor_email, vendor_pass, vendor_phone, vendor_company, vendor_status )
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $vName, $vEmail, $vPass, $vPhone, $vComapany, $vStatus);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "<script type='text/javascript'>alert('Thank you for registering please contact the admin for activation');</script>";
        header("Location: vendor_register.php");
        
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}


?>
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="register "><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->

                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form class="login" action="" method="post">
                            <input type="text" placeholder="Name*" name="username">
                            <input type="email" placeholder="Email*" name="useemail">
                            <input type="password" placeholder="Password*" name="usepassword">
                            <input type="number" placeholder="Phone*" name="userphone">
                            <input type="text" placeholder="Company*" name="useaddress">
                            <div class="contact-btn mt--30 ">
                                <button name="register" class="fv-btn">Register</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
<!-- End Login Register Area -->



<?php include_once('includs/customer_footer.php') ?>
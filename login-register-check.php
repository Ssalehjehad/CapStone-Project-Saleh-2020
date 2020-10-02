<?php
ob_start(); //incase of multi requests

include_once('includs/customer_header.php');
require('includs/connection.php');
if (isset($_SESSION['customer_id'])) {
    echo "<script type='text/javascript'>alert('Already logged in ');window.location.href='index.php';</script>";
}
if (isset($_POST['register'])) {
    $userName      = trim($_POST['username']);
    $useEmail      = trim($_POST['useemail']);
    $userPass      = trim($_POST['usepassword']);
    $usePhone      = trim($_POST['userphone']);
    $userAddress   = trim($_POST['useaddress']);

    $fillingBool    =
        (!("" == $userName)) &&
        (!("" == $useEmail)) &&
        (!("" == $userPass)) &&
        (!("" == $usePhone)) &&
        (!("" == $userAddress));
    if (true == $fillingBool) {
        $stmt = $conn->prepare("INSERT INTO customer(customer_name, customer_email, customer_password, customer_phone, customer_address )
            VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $userName, $useEmail, $userPass, $usePhone, $userAddress);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "<script type='text/javascript'>alert('Done :)');</script>";
        header("Location: login-register-check.php");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}
if (isset($_POST['login'])) {
    $userlogEmail      = trim($_POST['loginEmail']);
    $uselogPass        = trim($_POST['loginPass']);


    $fillingBool    =
        (!("" == $userlogEmail)) &&
        (!("" == $uselogPass));
    if (true == $fillingBool) {
        $qury     = "SELECT * from customer WHERE customer_email     ='$userlogEmail' AND 
                                                  customer_password	 ='$uselogPass'";
        $result   = mysqli_query($conn, $qury);
        $customer = mysqli_fetch_assoc($result);
        if (!empty($customer['customer_id'])) {
            $_SESSION['customer_id'] = $customer['customer_id'];
            header("location:checkout.php");
            exit();
        } else {
        }
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
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form class="login" action="" method="post">
                            <input type="text" placeholder="User Email*" name="loginEmail">
                            <input type="password" placeholder="Password*" name="loginPass">
                            <div class="contact-btn mt--30 ">
                                <button name="login" class="fv-btn">Login</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form class="login" action="" method="post">
                            <input type="text" placeholder="Name*" name="username">
                            <input type="email" placeholder="Email*" name="useemail">
                            <input type="password" placeholder="Password*" name="usepassword">
                            <input type="number" placeholder="Phone*" name="userphone">
                            <input type="text" placeholder="Address*" name="useaddress">
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
<?php
ob_start(); //incase of multi requests
include('config.php');
include_once('includs/customer_header.php');
require('includs/connection.php');
///////////////////////////////////////////////////


//Include Configuration File
include('config1.php');
if (isset($_SESSION['customer_id'])) {
    echo "<script type='text/javascript'>alert('Already logged in ');window.location.href='index.php';</script>";
}
$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        //Below you can find Get profile data and store into $_SESSION variable
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $login_button = '<li><a  href="' . $google_client->createAuthUrl() . '" class="bg--googleplus"><i class="zmdi zmdi-google-plus"></i></a></li>';
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
        header("Location: login-register.php");
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
            header("location:index.php");
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
                       
                        <div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <?php
                                if ($login_button == '') {
                                    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                                    echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                                    echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                                    echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                                    echo '<h3><a href="logout.php">Logout</h3></div>';
                                } else {
                                    echo '<div align="center">' . $login_button . '</div>';
                                }
                                ?>
                            </ul>
                            <p>Google login is test future</p>
                        </div>
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
                        <br>
                        <a href="vendor_register.php">Register as Vendor&#8594;</a>
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
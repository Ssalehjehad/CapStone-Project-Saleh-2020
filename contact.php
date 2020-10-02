<?php
ob_start(); //incase of multi requests

include_once('includs/customer_header.php');
require('includs/connection.php');
if (isset($_POST['submit'])) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $msg     = $_POST['message'];
    $datee   = date("l jS \of F Y");
    $qurry11 = "INSERT INTO contact(name,email,subject,msg,cDate) VALUES ('$name','$email','$subject','$msg','$datee')";
    $stm11   = $conn->prepare($qurry11);
    $stm11->execute();
   
    $conn->close();
    header('location:contact.php');}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;height:200px;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Contact US</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Contact US</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="htc__contact__container">
                    <div class="htc__contact__address">
                        <h2 class="contact__title">contact info</h2>
                        <div class="contact__address__inner">
                            <!-- Start Single Adress -->
                            <div class="single__contact__address">
                                <div class="contact__icon">
                                    <span class="ti-location-pin"></span>
                                </div>
                                <div class="contact__details">
                                    <p>Location : <br> LOL 1010, Jordan</p>
                                </div>
                            </div>
                            <!-- End Single Adress -->
                        </div>
                        <div class="contact__address__inner">
                            <!-- Start Single Adress -->
                            <div class="single__contact__address">
                                <div class="contact__icon">
                                    <span class="ti-mobile"></span>
                                </div>
                                <div class="contact__details">
                                    <p> Phone : <br><a href="#">+962 7999999 </a></p>
                                </div>
                            </div>
                            <!-- End Single Adress -->
                            <!-- Start Single Adress -->
                            <div class="single__contact__address">
                                <div class="contact__icon">
                                    <span class="ti-email"></span>
                                </div>
                                <div class="contact__details">
                                    <p> Mail :<br><a href="#">Ssalehjehad@gmail.com</a></p>
                                </div>
                            </div>
                            <!-- End Single Adress -->
                        </div>
                    </div>
                    <div class="contact-form-wrap">
                        <div class="contact-title">
                            <h2 class="contact__title">Get In Touch</h2>
                        </div>
                        <form  action="" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="name" placeholder="Your Nme*">
                                    <input type="email" name="email" placeholder="Mail*">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box subject">
                                    <input type="text" name="subject" placeholder="Subject*">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box message">
                                    <textarea name="message" placeholder="Massage*"></textarea>
                                </div>
                            </div>
                            <div class="contact-btn">
                                <button  name="submit" class="fv-btn">SEND</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div>
                    <img src="images/contact-1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->

<?php include_once('includs/customer_footer.php') ?>
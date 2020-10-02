<?php
ob_start(); //incase of multi requests
include_once('../includs/vendor_header.php');
require('../includs/connection.php');
include('../includs/classes.php');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>


<div class="col-12 mt-2">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Admins Table</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Email / Phone</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price / Quntity / total</th>
                                <th scope="col">Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qurry0      = "SELECT * FROM customer";
                            $result0     = mysqli_query($conn, $qurry0);
                            while ($costumerChain  = mysqli_fetch_assoc($result0)) {
                                   $qurry01        = "SELECT * FROM orders WHERE customer_id={$costumerChain['customer_id']} ";
                                   $result01       = mysqli_query($conn, $qurry01);
                                while ($orders    = mysqli_fetch_assoc($result01)) {
                                       $qurry1    = "SELECT * FROM order_details WHERE orders_id={$orders['orders_id']}";
                                       $result1   = mysqli_query($conn, $qurry1);
                                    while ($orders_det   = mysqli_fetch_assoc($result1)) {
                                           $qurry2       = "SELECT * FROM product WHERE product_id={$orders_det['product_id']}";
                                           $result2      = mysqli_query($conn, $qurry2);

                                        while ($products  = mysqli_fetch_assoc($result2)) {
                                            if ($products['vendor_id'] == $_SESSION['v_id']) {
                                                $totalprice = number_format((int)$orders_det["quantity"] * (int)$orders_det["price"], 2);
                                                echo
                                                    " <tr>
                                <td >{$orders['orders_id']}</td>
                                <td> {$costumerChain['customer_name']}</td>
                                <td> {$costumerChain['customer_email']} / {$costumerChain['customer_phone']}</td>
                                <td> {$products['product_name']}</td>
                                <td> &#36;{$orders_det['price']} / {$orders_det['quantity']} / &#36;$totalprice</td>
                                <td> {$orders['order_date']}</td>
                                </tr>";
                                            } 
                                        }
                                    }
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once('../includs/admin_footer.php') ?>
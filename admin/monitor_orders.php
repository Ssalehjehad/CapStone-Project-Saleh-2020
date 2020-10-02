<?php
ob_start(); //incase of multi requests
include_once('../includs/admin_header.php');
require('../includs/connection.php');
include('../includs/classes.php');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>


<?php
$qurry           = "SELECT * FROM customer";
$result0          = mysqli_query($conn, $qurry);
while ($customer   = mysqli_fetch_assoc($result0)) {
    echo "<div class='row col-lg-12 col-md-12 col-sm-12 pt-3 ml-2'>
        <div class='panel-group' id='accordion'>
             <div class='panel panel-default'>
                  <div class='panel-heading pt-1'>
                  
                      <h5 class='panel-title '>Customer Name : 
                      <a data-toggle='collapse' data-parent='#accordion' href='#collapse{$customer['customer_id']}' class='text-danger '> {$customer['customer_name']} <i class='fa fa-sort-desc'></i> </a> / 
                      email : {$customer['customer_email']} / Phone : {$customer['customer_phone']} / Address : {$customer['customer_address']} 
                      </h5>
                  </div>";



    echo "</div>
                  </div>
                  </div>
                  <div id='collapse{$customer['customer_id']}' class='panel-collapse collapse in row col-lg-12 col-md-12 col-sm-12 pt-3 ml-2'>";

    $qurry           = "SELECT * FROM orders WHERE 	customer_id={$customer['customer_id']}";
    $result          = mysqli_query($conn, $qurry);
    while ($orders   = mysqli_fetch_assoc($result)) {
        echo " <div  class=' row col-lg-12 col-md-12 col-sm-12 pt-3 ml-2'>
               <div class='panel-group' id='accordion'>
                    <div class='panel panel-default'>
                         <div class='panel-heading pt-1'>
                             <h5 class='panel-title '>
                             <a data-toggle='collapse' data-parent='#accordion' href='#collapse{$orders['orders_id']}1' class='text-danger '>Order ID :{$orders['orders_id']} / Order date : {$orders['order_date']}</a>
                             </h5>
                         </div>
                    <div id='collapse{$orders['orders_id']}1' class='panel-collapse collapse in'>
                    <div class=' mt-1'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='single-table'>
                                    <div class='table-responsive'>
                                        <table class='table table-hover progress-table text-center'>
                                            <thead class='text-uppercase'>
                                                <tr>
                                                    <th scope='col'>Order ID</th>
                                                    <th scope='col'>Product Name</th>
                                                    <th scope='col'>Product Price</th>
                                                    <th scope='col'>Product quntity</th>
                                                    <th scope='col'>Total</th>
                                                    <th scope='col'>size / color</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
        //from orders in general to each order details
        $qurry      = "SELECT * FROM order_details WHERE orders_id={$orders['orders_id']}";
        $result1    = mysqli_query($conn, $qurry);
        while ($orderDet  = mysqli_fetch_assoc($result1)) {
            //from order details to product
            $qurry     = "SELECT * FROM product WHERE product_id={$orderDet['product_id']}";
            $result3    = mysqli_query($conn, $qurry);
            $pro       = mysqli_fetch_assoc($result3);
            $totalprice = number_format((int)$orderDet["quantity"] * (int)$orderDet["price"], 2);
            echo
                " <tr>
                <td> {$orders['orders_id']}</td>
                <td> {$pro['product_name']}</td>
                <td> {$orderDet['price']}</td>
                <td> {$orderDet['quantity']}</td>
                <td> $totalprice</td>
                <td> {$orderDet['size']} / {$orderDet['color']}</td>
             </tr>";
        }
        echo "                                  </tbody>
                                       </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
              </div>
            </div>
         </div>";
    }
    echo "</div><hr>";
}
?>



<?php include_once('../includs/admin_footer.php') ?>
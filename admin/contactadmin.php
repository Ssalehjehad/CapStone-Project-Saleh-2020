<?php
ob_start(); //incase of multi requests
include_once('../includs/admin_header.php');
require('../includs/connection.php');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Progress Table start -->
<div class="col-12 mt-2">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Contact Table</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">massage</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qurry            = "SELECT * FROM contact";
                            $result           = mysqli_query($conn, $qurry);
                            while ($contact   = mysqli_fetch_assoc($result)) {
                                echo
                                " <tr>
                                <td >{$contact['contact_id']}</td>
                                <td> {$contact['name']}</td>
                                <td> {$contact['email']}</td>
                                <td> {$contact['subject']}</td>
                                <td> {$contact['msg']}</td>
                                <td> {$contact['cDate']}</td>
                                </tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Progress Table end -->

<?php include_once('../includs/admin_footer.php') ?>
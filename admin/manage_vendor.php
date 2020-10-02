<?php
ob_start(); //incase of multi requests
include_once('../includs/admin_header.php');
require('../includs/connection.php');
include('../includs/classes.php');
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.switch', function() {
            var VIdSwitch = $(this).attr("id");

            $.ajax({
                type: "POST",
                url: "vendor_ajax1.php",

                data: {
                    "vcheck_switch": 1,
                    "vswitch": VIdSwitch,
                },
                success: function() {
                    location.reload();
                }

            });
        });

        $(".disabled3").css("background-color", "#db774f");
        $(".active3").css("background-color", "#57f542");

        $(".disabled2").css("color", "red");
        $(".active2").css("color", "green");

        $(".catButton").click(function() {
            var category = $(this).attr("id");
            if (category == "all") {

                $(".catItem").hide();
                setTimeout(function() {
                    $(".catItem").show();
                }, 300);
            } else {
                $(".catItem").hide();
                setTimeout(function() {
                    $("." + category).show();
                }, 300);
            }
        });
    });
</script>
<div class="col-12 mt-5">
    <div class="card">
        <div class="row offset-2">
            <button class="btn btn-primary col-3 mr-3 catButton" id="all">All</button>
            <button class="btn btn-success col-3 mr-3 catButton" id="active1">Active</button>
            <button class="btn btn-danger col-3 catButton" id="disabled1">Disable</button>
        </div>
        <div class="card-body">
            <h4 class="header-title">Admins Table</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name / Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qurry           = "SELECT * FROM vendor";
                            $result          = mysqli_query($conn, $qurry);
                            while ($vendor   = mysqli_fetch_assoc($result)) {
                                echo
                                    " <tr class='{$vendor['vendor_status']}1 catItem'>
                                <td >{$vendor['vendor_id']}</td>
                                <td> {$vendor['vendor_name']} / {$vendor['vendor_company']}</td>
                                <td> {$vendor['vendor_email']}</td>
                                <td> {$vendor['vendor_phone']}</td>
                                <td class='{$vendor['vendor_status']}2 '>{$vendor['vendor_status']}</td>
                                <td>
                                <button class='btn btn-danger switch {$vendor['vendor_status']}3' id='{$vendor['vendor_id']}' data-toggle='tooltip' data-placement='top' title='switch'  '/>
                                Switch <i class=' ti-control-shuffle'></i>
                                </button>
                                  </td>
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

<?php include_once('../includs/admin_footer.php') ?>
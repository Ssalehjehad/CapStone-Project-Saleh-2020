<?php
ob_start(); //incase of multi requests
include_once('../includs/admin_header.php');
require('../includs/connection.php');
include('../includs/classes.php');

if (isset($_POST['submit'])) {
    $categoryName   = trim($_POST['categoryname']);
    $status         = trim($_POST['categorystatus']);
    $img_name       = trim($_FILES['categoryImg']['name']);
    $temp_name      = $_FILES['categoryImg']['tmp_name'];
    $path           = 'images/';
    //move files to img folder 
    move_uploaded_file($temp_name, $path . $img_name);
    $fillingBool    = (!("" == $categoryName)) &&
        (!("" == $status)) &&
        (!("" == $img_name));
    if (true == $fillingBool) {
        $stmt = $conn->prepare("INSERT INTO category(cat_name, cat_img, cat_status )
        VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $categoryName, $img_name, $status);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: manage_category.php");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}
if (isset($_GET['actionDelete'])) {
    if ($_GET['actionDelete'] && $_GET['idForDelete']) {
        if ($_GET['actionDelete'] == 'delete') {
            $categoryId = $_GET['idForDelete'];
            $stmt = $conn->prepare("DELETE FROM category WHERE cat_id=?");
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("location:manage_category.php");
            exit();
        }
    }
}
if (isset($_POST['submitEdit'])) {
    $cat_id_edit    = $_POST['catEdit_id'];
    $categoryName   = $_POST['categorynameEdit'];
    $status         = $_POST['categoryStatusEdit'];
    $img_name       = $_FILES['categoryImgEdit']['name'];
    $temp_name      = $_FILES['categoryImgEdit']['tmp_name'];
    $path           = 'images/';
    //move files to img folder 
    move_uploaded_file($temp_name, $path . $img_name);
    $fillingBool    = (!("" == $categoryName)) &&
        (!("" == $status)) &&
        (!("" == $img_name));
    if (true == $fillingBool) {
        $smt = $conn->prepare("UPDATE category SET cat_name=?, cat_img=?, cat_status=? WHERE cat_id=?");
        $smt->bind_param('sssi', $categoryName, $img_name, $status, $cat_id_edit);
        $smt->execute();
        header("location:manage_category.php");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body" style="background-color: #F3F8FB;">
            <h4 class="header-title">Add New Category</h4>

            <!-- Large modal -->
            <button type="button" class="btn btn-primary  btn-lg px-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Category
            </button>
            <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- basic form start -->
                            <div class="col-12 mt-1">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Category informations</h4>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-5">
                                                <label for="sel1">Select status (category status):</label>
                                                <select class="form-control" id="categorystatus" name="categorystatus">
                                                    <option value="active">Active</option>
                                                    <option value="disabled">Disabled</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">Category name</label>
                                                <input type="text" class="form-control Checkme" id="Categoryname" placeholder="Enter Category name" name="categoryname">
                                                <span id="apperence1" style="color: red;">please Fill the fields</span>
                                                <span id="testingsss1" style="color: red;"></span>
                                                <span id="testingsss" style="color: green;"></span>
                                            </div>
                                            <label for="inputGroupFile01">Upload photo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="form-group custom-file">
                                                    <input type="file" class="custom-file-input form-control checkme2" id="inputGroupFile012" value='upload' name="categoryImg" onchange="newPhoto()">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3" id="imgDivCreate"></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Large modal modal end -->
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg " id="modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- basic form start -->
                <div class="col-12 mt-1">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Category informations</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" value="catEdit_id" name="catEdit_id">
                                </div>
                                <div>
                                    <p>Current status : <span id="statusEdit"></span></p>
                                </div>
                                <div class="form-group col-5">
                                    <label for="sel1">Select status (category status):</label>
                                    <select class="form-control" id="categorystatus" name="categoryStatusEdit">
                                        <option value="active">Active</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Category name</label>
                                    <input type="text" class="form-control" id="Categoryname" placeholder="Enter Category name" name="categorynameEdit">
                                </div>
                                <label for="inputGroupFile01">Upload photo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="form-group custom-file">
                                        <input type="file" class="custom-file-input form-control" id="inputGroupFile011" value='upload' name="categoryImgEdit" onchange="updatePhoto()">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-3" id="imgDivEdit"><span>categorys current photo</span></div>
                                    <div class="col-3" id="imgDivEdit2"></div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submitEdit">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- basic form end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Large modal modal end -->
<!-- Progress Table start -->
<div class="col-lg-12 col-md-6 col-sm-6 mt-2">
    <div class="card">
        <div class="row offset-2">
            <button class="btn btn-primary col-3 mr-3 catButton" id="all">All</button>
            <button class="btn btn-success col-3 mr-3 catButton" id="active1">Active</button>
            <button class="btn btn-danger col-3 catButton" id="disabled1">Disable</button>
        </div>
        <div class="card-body">
            <h4 class="header-title">Category Table</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qurry             = "SELECT * FROM category";
                            $result            = mysqli_query($conn, $qurry);
                            while ($category   = mysqli_fetch_assoc($result)) {
                                echo
                                    " <tr class='{$category['cat_status']}1 catItem'>
                                <td>{$category['cat_id']}</td>
                                <td>{$category['cat_name']}</td>
                                <td><img src='images/{$category['cat_img']}' style='height : 60px;width:60px;'></td>
                                <td class='{$category['cat_status']}2 '>{$category['cat_status']}</td>
                                <td>
                                    
                                    <form method='get' action=''>
                                    <div class='table-data-feature'>
                                    <a data-toggle='modalEdit' 
                                    data-catId         ='{$category['cat_id']}'
                                    data-catName       ='{$category['cat_name']}'
                                    data-catImg        ='{$category['cat_img']}'
                                    data-catStatus     ='{$category['cat_status']}'
                                    class='open-AddBookDialog btn btn-warning ' id='editplz'>Edit</a>
                                    
                                   <button class='btn btn-danger '  data-toggle='tooltip' data-placement='top' title='Delete' name='actionDelete' value='delete' '/>
                                   <i class=' ti-trash'></i>
                                   </button>
                                    
                                   <input type='hidden' name='idForDelete' value= '{$category['cat_id']}' >
                                   </div>
                                   </form>
                                   <button class='btn btn-danger switch {$category['cat_status']}3' id='{$category['cat_id']}' data-toggle='tooltip' data-placement='top' title='switch'  '/>
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

<!-- Progress Table end -->
<script>
    function newPhoto() {
        const selectedFile1 = document.getElementById('inputGroupFile012').files[0]['name'];
        //console.log(selectedFile);
        let imgHtmlNew = `<img class="img-fluid" src="images/${selectedFile1}" /> `;
        $('#imgDivCreate').prepend('<span>categorys added photo</span>');
        $('#imgDivCreate').prepend(imgHtmlNew);
    }

    function updatePhoto() {
        const selectedFile2 = document.getElementById('inputGroupFile011').files[0]['name'];
        //console.log(selectedFile);
        let imgHtml2 = `<img class="img-fluid" src="images/${selectedFile2}" /> `;
        $('#imgDivEdit2').prepend('<span>categorys updated photo</span>');
        $('#imgDivEdit2').prepend(imgHtml2);
    }


    $(document).on("click", ".open-AddBookDialog", function() {
        var catId = this.getAttribute('data-catId');
        var catName = this.getAttribute('data-catName');
        var catImg = this.getAttribute('data-catImg');
        var catStatus = this.getAttribute('data-catStatus');
        let imgHtml = `<img class="img-fluid" src="images/${catImg}" /> `;

        $('input[name=catEdit_id]').val(catId);
        $('input[name=categorynameEdit]').val(catName);
        $('input[categoryImgEdit]').val(catImg);
        $('#imgDivEdit').prepend(imgHtml);
        $('#statusEdit').html(catStatus);

        $('#modalEdit').modal('show');
    });
    $(document).ready(function() {
        $('.Checkme').keyup(function(e) {
            var name = $(".Checkme").val();
            if (name == "") {
                $("#apperence1").show();
            } else {
                $("#apperence1").hide();
            }
            $.ajax({
                type: "POST",
                url: "admin_ajax1.php",

                data: {
                    "check_field": 1,
                    "name_name": name,
                },
                success: function(response) {
                    if (response == "name exist try another one") {
                        $("#testingsss1").html(response).show();
                        $("#testingsss").html(response).hide();
                    } else {
                        if (name == "") {
                            $("#testingsss").html(response).hide();
                            $("#testingsss1").html(response).hide();
                        } else {
                            $("#testingsss").html(response).show();
                            $("#testingsss1").html(response).hide();
                        }
                    }
                }
            });
        });
        $(document).on('click', '.switch', function() {
            var categoryIdSwitch = $(this).attr("id");

            $.ajax({
                type: "POST",
                url: "admin_ajax1.php",

                data: {
                    "check_switch": 1,
                    "switch": categoryIdSwitch,
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

<?php include_once('../includs/admin_footer.php') ?>
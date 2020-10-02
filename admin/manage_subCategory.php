<?php
ob_start(); //incase of multi requests
include_once('../includs/admin_header.php');
require('../includs/connection.php');
include('../includs/classes.php');

if (isset($_POST['submit'])) {
    $sub_categoryName   = trim($_POST['subCatName']);
    $sub_status         = trim($_POST['subCatStatus']);
    $sub_img_name       = $_FILES['subCatImg']['name'];
    $temp_name          = $_FILES['subCatImg']['tmp_name'];
    $path               = 'images/';
    //move files to img folder 
    move_uploaded_file($temp_name, $path . $sub_img_name);
    if (isset($_POST['motherCat'])) {
        $mothercategory     = trim($_POST['motherCat']);
        $fillingBool        = (!("" == $sub_categoryName)) &&
            (!("" == $sub_status)) &&
            (!("" == $sub_img_name)) &&
            (!("" == $mothercategory));
            if (true == $fillingBool) {
                $stmt = $conn->prepare("INSERT INTO sub_category(cat_id,subcat_name, sub_cat_img, sub_cat_status )
                VALUES (?, ?, ?, ?)");
                $stmt->bind_param("isss", $mothercategory, $sub_categoryName, $sub_img_name, $sub_status);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header("Location: manage_subCategory.php");
                exit();
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
   
    } 
}
if (isset($_GET['actionDelete'])) {
    if ($_GET['actionDelete'] && $_GET['idForDelete']) {
        if ($_GET['actionDelete'] == 'delete') {
            $categoryId = $_GET['idForDelete'];
            $stmt = $conn->prepare("DELETE FROM sub_category WHERE sub_cat_id=?");
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("location:manage_subCategory.php");
            exit();
        }
    }
}
if (isset($_POST['submitEdit'])) {
    $sub_cat_id         = $_POST['subCatEdit_id'];
    $sub_categoryName   = trim($_POST['sub_categorynameEdit']);
    $sub_status         = trim($_POST['sub_categoryStatusEdit']);
    $sub_img_name       = trim($_FILES['sub_categoryImgEdit']['name']);
    $mothercategory     = trim($_POST['motherCatEdit']);
    $temp_name          = $_FILES['sub_categoryImgEdit']['tmp_name'];
    $path               = 'images/';
    //move files to img folder 
    move_uploaded_file($temp_name, $path . $sub_img_name);
    $fillingBool    = (!("" == $sub_categoryName)) &&
        (!("" == $sub_status)) &&
        (!("" == $sub_img_name)) &&
        (!("" == $mothercategory));
    if (true == $fillingBool) {
        $smt = $conn->prepare("UPDATE sub_category SET subcat_name=?, sub_cat_img=?, sub_cat_status=?, cat_id=? 
                                                   WHERE sub_cat_id=?");
        $smt->bind_param('sssii', $sub_categoryName, $sub_img_name, $sub_status, $mothercategory, $sub_cat_id);
        $smt->execute();
        header("location:manage_subCategory.php");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        $('input[name=subCatEdit_id]').val(catId);
        $('input[name=categorynameEdit]').val(catName);
        $('input[categoryImgEdit]').val(catImg);
        $('#imgDivEdit').prepend(imgHtml);
        $('#sub_statusEdit').html(catStatus);

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
                    "subcheck_field": 1,
                    "subname_name": name,
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
                    "subcheck_switch": 1,
                    "subswitch": categoryIdSwitch,
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

<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body" style="background-color: #F3F8FB;">
            <h4 class="header-title">Add New sub Category</h4>

            <!-- Large modal -->
            <button type="button" class="btn btn-primary  btn-lg px-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add sub Category
            </button>
            <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ">Add sub Category</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- basic form start -->
                            <div class="col-12 mt-1">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">sub Category informations</h4>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-5">
                                                <label for="selectCat">Select category :</label>
                                                <select class="form-control " id="selectCat" name="motherCat">
                                                    <option selected="selected" disabled>All Categories</option>
                                                    <?php
                                                    $qurry          = "SELECT * FROM category";
                                                    $result         = mysqli_query($conn, $qurry);
                                                    while ($cat   = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-5">
                                                <label for="sel1">Select status (sub category status):</label>
                                                <select class="form-control" id="categorystatus" name="subCatStatus">
                                                    <option value="active">Active</option>
                                                    <option value="disabled">Disabled</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">sub Category name</label>
                                                <input type="text" class="form-control Checkme" id="Categoryname" placeholder="Enter Category name" name="subCatName">
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
                                                    <input type="file" class="custom-file-input form-control checkme2" id="inputGroupFile012" value='upload' name="subCatImg" onchange="newPhoto()">
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
                <h5 class="modal-title ">Edit sub Category</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- basic form start -->
                <div class="col-12 mt-1">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Sub Category informations</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" value="subCatEdit_id" name="subCatEdit_id">
                                </div>
                                <div class="form-group col-5">
                                    <label for="selectCat">Select category :</label>
                                    <select class="form-control " id="selectCat" name="motherCatEdit">
                                        <option selected="selected" disabled>All Categories</option>
                                        <?php
                                        $qurry          = "SELECT * FROM category";
                                        $result         = mysqli_query($conn, $qurry);
                                        while ($cat   = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <p>Current status : <span id="sub_statusEdit"></span></p>
                                </div>
                                <div class="form-group col-5">
                                    <label for="sel1">Edit status (Sub category status):</label>
                                    <select class="form-control" id="categorystatus" name="sub_categoryStatusEdit">
                                        <option value="active">Active</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Sub Category name</label>
                                    <input type="text" class="form-control" id="Categoryname" placeholder="Enter sub Category name" name="sub_categorynameEdit">
                                </div>
                                <label for="inputGroupFile01">Upload photo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="form-group custom-file">
                                        <input type="file" class="custom-file-input form-control" id="inputGroupFile011" value='upload' name="sub_categoryImgEdit" onchange="updatePhoto()">
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
            <h4 class="header-title">Sub Category Table</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">category name/status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qurry                = "SELECT * FROM sub_category";
                            $result               = mysqli_query($conn, $qurry);
                            while ($subcategory   = mysqli_fetch_assoc($result)) {
                                $qurry2        = "SELECT * FROM category WHERE cat_id ={$subcategory['cat_id']} ";
                                $result2       = mysqli_query($conn, $qurry2);
                                $catInsert     = mysqli_fetch_assoc($result2);
                                echo
                                    " <tr class='{$subcategory['sub_cat_status']}1 catItem'>
                                <td>{$subcategory['sub_cat_id']}</td>
                                <td>{$subcategory['subcat_name']}</td>
                                <td>{$catInsert['cat_name']}/<span class='{$catInsert['cat_status']}2'>{$catInsert['cat_status']}</span></td>
                                <td><img src='images/{$subcategory['sub_cat_img']}' style='height : 60px;width:60px;'></td>
                                <td class='{$subcategory['sub_cat_status']}2 '>{$subcategory['sub_cat_status']}</td>
                                <td>
                                    
                                    <form method='get' action=''>
                                    <div class='table-data-feature'>
                                    <a data-toggle='modalEdit' 
                                    data-catId         ='{$subcategory['sub_cat_id']}'
                                    data-catName       ='{$subcategory['subcat_name']}'
                                    data-catImg        ='{$subcategory['sub_cat_img']}'
                                    data-catStatus     ='{$subcategory['sub_cat_status']}'
                                    class='open-AddBookDialog btn btn-warning ' id='editplz'>Edit</a>
                                    
                                   <button class='btn btn-danger '  data-toggle='tooltip' data-placement='top' title='Delete' name='actionDelete' value='delete' '/>
                                   <i class=' ti-trash'></i>
                                   </button>
                                    
                                   <input type='hidden' name='idForDelete' value= '{$subcategory['sub_cat_id']}' >
                                   </div>
                                   </form>
                                   <button class='btn btn-danger switch {$subcategory['sub_cat_status']}3' id='{$subcategory['sub_cat_id']}' data-toggle='tooltip' data-placement='top' title='switch'  '/>
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


<?php include_once('../includs/admin_footer.php') ?>
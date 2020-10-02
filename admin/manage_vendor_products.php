<?php
ob_start(); //incase of multi requests
include_once('../includs/vendor_header.php');
require('../includs/connection.php');
include('../includs/classes.php');

if (isset($_POST['submit'])) {
    $vendorID            = $_SESSION['v_id'];
    $vendorlessId       = 9999;

    $pro_name           = trim($_POST['proName']);
    $pro_desc           = trim($_POST['proDesc']);
    $pro_price          = trim($_POST['proPrice']);
    $pro_discount       = trim($_POST['proDiscount']);
    $pro_qun            = trim($_POST['proQuantity']);
    $pro_status         = trim($_POST['proStatus']);


    //check if the catergory and sub category ids are chosed then save them.
    if (isset($_POST['motherCat'])) {
        $Mothercategory      = trim($_POST['motherCat']);
        if (isset($_POST['subCat'])) {
            $subcategory     = trim($_POST['subCat']);
            if (isset($vendorID)) {
                
                $fillingBool        = (!("" == $subcategory)) &&
                    (!("" == $pro_status)) &&
                    (!("" == $Mothercategory)) &&
                    (!("" == $pro_name)) &&
                    (!("" == $pro_desc)) &&
                    (!("" == $pro_price)) &&
                    (!("" == $pro_discount)) &&
                    (!("" == $pro_qun)) ;
                if (true == $fillingBool) {
                    $stmt = $conn->prepare("INSERT INTO product(cat_id, sub_cat_id, vendor_id, product_name, product_desc, product_price, product_discount, product_quantity, product_status )
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? )");
                    $stmt->bind_param("iiissssss", $Mothercategory, $subcategory, $vendorID, $pro_name, $pro_desc, $pro_price, $pro_discount, $pro_qun, $pro_status);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    header("Location: manage_vendor_products.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
                }
            } else {
                $fillingBool = (!("" == $subcategory)) &&
                    (!("" == $pro_status)) &&
                    (!("" == $Mothercategory)) &&
                    (!("" == $pro_name)) &&
                    (!("" == $pro_desc)) &&
                    (!("" == $pro_price)) &&
                    (!("" == $pro_discount)) &&
                    (!("" == $pro_qun));
                if (true == $fillingBool) {
                    $stmt = $conn->prepare("INSERT INTO product(cat_id, sub_cat_id, product_name, product_desc, product_price, product_discount, product_quantity, product_status )
                    VALUES (?, ?, ?, ?, ?, ?, ?, ? )");
                    $stmt->bind_param("iissssss", $Mothercategory, $subcategory, $pro_name, $pro_desc, $pro_price, $pro_discount, $pro_qun, $pro_status);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    header("Location: manage_vendor_products.php");
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
                }
            }
        } else {
            echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}
if (isset($_GET['actionDelete'])) {
    if ($_GET['actionDelete'] && $_GET['idForDelete']) {
        if ($_GET['actionDelete'] == 'delete') {
            $categoryId = $_GET['idForDelete'];
            $stmt = $conn->prepare("DELETE FROM product WHERE product_id=?");
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header("location:manage_vendor_products.php");
            exit();
        }
    }
}
if (isset($_POST['submitEdit'])) {
   
    $pro_id_edit        =      $_POST['pro_id'];
    $pro_name           = trim($_POST['proNameEdit']);
    $pro_desc           = trim($_POST['proDescEdit']);
    $pro_price          = trim($_POST['proPriceEdit']);
    $pro_discount       = trim($_POST['proDiscountEdit']);
    $pro_qun            = trim($_POST['proQuantityEdit']);
    $pro_status         = trim($_POST['proStatusEdit']);
    if (isset($_POST['motherCatEdit'])) {
        $Mothercategory      = trim($_POST['motherCatEdit']);
        if (isset($_POST['subCatEdit'])) {
            $subcategory     = trim($_POST['subCatEdit']);
            if (isset($vendorID)) {
               
                $fillingBool        = (!("" == $subcategory)) &&
                    (!("" == $pro_status)) &&
                    (!("" == $Mothercategory)) &&
                    (!("" == $pro_name)) &&
                    (!("" == $pro_desc)) &&
                    (!("" == $pro_price)) &&
                    (!("" == $pro_discount)) &&
                    (!("" == $pro_qun));
                if (true == $fillingBool) {
                    $smt = $conn->prepare("UPDATE product SET cat_id=?, sub_cat_id=?, vendor_id=?, product_name=?, product_desc=?, product_price=?, product_discount=?, product_quantity=?, product_status=?   
                                           WHERE 	product_id=?");
                    $smt->bind_param('iiissssssi', $Mothercategory, $subcategory, $vendorID, $pro_name, $pro_desc, $pro_price, $pro_discount, $pro_qun, $pro_status, $pro_id_edit);
                    $smt->execute();
                    header("location:manage_vendor_products.php");
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
                }
            } else {
                $fillingBool = (!("" == $subcategory)) &&
                    (!("" == $pro_status)) &&
                    (!("" == $Mothercategory)) &&
                    (!("" == $pro_name)) &&
                    (!("" == $pro_desc)) &&
                    (!("" == $pro_price)) &&
                    (!("" == $pro_discount)) &&
                    (!("" == $pro_qun));
                if (true == $fillingBool) {
                    $smt = $conn->prepare("UPDATE product SET cat_id=?, sub_cat_id=?, product_name=?, product_desc=?, product_price=?, product_discount=?, product_quantity=?, product_status=?   
                                          WHERE 	product_id=?");
                    $smt->bind_param('iissssssi', $Mothercategory, $subcategory, $pro_name, $pro_desc, $pro_price, $pro_discount, $pro_qun, $pro_status, $pro_id_edit);
                    $smt->execute();
                    header("location:manage_vendor_products.php");
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    exit();
                } else {
                    echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
                }
            }
        } else {
            echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please fill all the fields');</script>";
    }
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function CategoryBranch() {
        var selectedCat1 = $('#selectCat').val();

        if (selectedCat1 == null) {
            var selectedBranch = $('#selectCatEdit').val();
        } else {
            var selectedBranch = selectedCat1;
        }
        console.log(selectedBranch);
        $('.showme').removeAttr("hidden");
        $.ajax({
            type: "POST",
            url: "vendor_ajax1.php",

            data: {
                "cat_branch": 1,
                "cat_branch_id": selectedBranch,
            },
            success: function(response) {
                if (response == "0 results") {
                    console.log(response);
                    $(".remove").remove();
                } else {
                    var x = JSON.parse(response);
                    console.log(x);
                    $(".remove").remove();
                    var i = 0;
                    while (x[i]) {
                        $('#optionsbranch').append(`<option class="remove" value="${x[i]['id']}">${x[i]['name']}</option>`);
                        $('#optionsbranch1').append(`<option class="remove" value="${x[i]['id']}">${x[i]['name']}</option>`);
                        i++;
                    }
                }

            }


        });
    }

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
        var proId = this.getAttribute('data-proId');
        var proName = this.getAttribute('data-proName');
        var proDesc = this.getAttribute('data-proDesc');
        var proPrice = this.getAttribute('data-proPrice');
        var proDiscount = this.getAttribute('data-proDiscount');
        var proQun = this.getAttribute('data-proQun');
        var proStatus = this.getAttribute('data-proStatus');

        $('input[name=pro_id]').val(proId);
        $('input[name=proNameEdit]').val(proName);

        $('input[name=proDescEdit]').val(proDesc);
        $('input[name=proPriceEdit]').val(proPrice);
        $('input[name=proDiscountEdit]').val(proDiscount);
        $('input[name=proQuantityEdit]').val(proQun);


        $('#pro_statusEdit').html(proStatus);

        $('#modalEdit').modal('show');
    });

    $(document).on("click", ".open-modalImg", function() {
        var proIdImg = this.getAttribute('data-proIdImg');
        $('input[name=pro_id_img]').val(proIdImg);
        $('.removereset').remove();
        $.ajax({
                type: "POST",
                url: "vendor_ajax2.php",
                data: {
                    "summon_id_img": proIdImg,
                    
                },
                success: function(data) {
                    
                    $('#images_list').html(data);
                }
            });
        $('#modalImg').modal('show');
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
                url: "vendor_ajax1.php",

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
                url: "vendor_ajax1.php",

                data: {
                    "proCheck_switch": 1,
                    "proswitch": categoryIdSwitch,
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
           var proImgIdsummon = $('#pro_id_img').val();
           
        function load_images() {
             proImgIdsummon = $('#pro_id_img').val();
            $.ajax({
                type: "POST",
                url: "vendor_ajax2.php",
                data: {
                    "summon_id_img": proImgIdsummon,
                    
                },
                success: function(data) {
                    $('.removereset').remove();
                    $('#images_list').html(data);
                }
            });
        }
        $('#upload_multi_imgs').on('submit', function(event) {
            event.preventDefault();
            var image_name = $('#image').val();
            var proImgId = $('#pro_id_img').val();
            console.log(proImgId);
            var formData = new FormData(this);
            formData.append('pro_id_img', proImgId);
            formData.append('pro_id_img_switch', 1);
            if (image_name == '') {
                alert("Please select images");
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "vendor_ajax1.php",
                    data: 
                        formData

                    ,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(date) {
                        $('#image').val('');
                        $('.removereset').remove();
                        load_images();
                    }
                });
            }
        });
    });
</script>

<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body" style="background-color: #F3F8FB;">
            <h4 class="header-title">Add New Product</h4>

            <!-- Large modal -->
            <button type="button" class="btn btn-primary  btn-lg px-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Product
            </button>
            <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ">Add product</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- basic form start -->
                            <div class="col-12 mt-1">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Product informations</h4>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group row col-12">
                                                <div class="form-group col-4">
                                                    <label for="selectCat">Select category :</label>
                                                    <select class="form-control " id="selectCat" name="motherCat" onchange="CategoryBranch()">
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
                                                <div class="form-group col-4 showme" hidden>
                                                    <label for="selectCat">Select Sub category :</label>
                                                    <select class="form-control " id="optionsbranch" name="subCat">
                                                        <option selected="selected" disabled>All Categories</option>

                                                    </select>
                                                </div>
                                               
                                            </div>
                                            <div class="form-group col-5">
                                                <label for="sel1">Select status (product status):</label>
                                                <select class="form-control" id="categorystatus" name="proStatus">
                                                    <option value="active">Active</option>
                                                    <option value="disabled">Disabled</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">Product name</label>
                                                <input type="text" class="form-control Checkme" placeholder="Enter Product name" name="proName">
                                                <span id="apperence1" style="color: red;">please Fill the fields</span>
                                                <span id="testingsss1" style="color: red;"></span>
                                                <span id="testingsss" style="color: green;"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">Product description</label>
                                                <input type="text" class="form-control Checkme" placeholder="Product description" name="proDesc">
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">Product price</label>
                                                <input type="number" class="form-control Checkme" placeholder="Product price" name="proPrice">
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">Product discount</label>
                                                <input type="number" class="form-control Checkme" placeholder="Product discount" name="proDiscount">
                                            </div>
                                            <div class="form-group">
                                                <label for="Categoryname">Product quantity</label>
                                                <input type="number" class="form-control Checkme" placeholder="Product quantity" name="proQuantity">
                                            </div>
                                            <!--<label for="inputGroupFile01">Upload photo</label>-->
                                            <div class="input-group mb-3">
                                                <!--<div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="form-group custom-file">
                                                    <input type="file" class="custom-file-input form-control checkme2" id="inputGroupFile012" value='upload' name="subCatImg" onchange="newPhoto()">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>-->
                                            </div>
                                            <!--<div class="row">
                                                <div class="col-3" id="imgDivCreate"></div>
                                            </div>-->
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
                <h5 class="modal-title ">Edit product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- basic form start -->
                <div class="col-12 mt-1">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Product informations</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" value="pro_id" name="pro_id">
                                </div>
                                <div class="form-group row col-10">
                                    <div class="form-group col-4">
                                        <label for="selectCat">Select category :</label>
                                        <select class="form-control " id="selectCatEdit" name="motherCatEdit" onchange="CategoryBranch()">
                                            <option selected="selected" disabled>All Categories</option>
                                            <?php
                                            $qurry          = "SELECT * FROM category";
                                            $result         = mysqli_query($conn, $qurry);
                                            while ($cat     = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-4 showme" hidden>
                                        <label for="selectCat">Select Sub category :</label>
                                        <select class="form-control " id="optionsbranch1" name="subCatEdit">
                                            <option selected="selected" disabled>All Categories</option>

                                        </select>
                                    </div>
                                 
                                </div>
                                <div>
                                    <p>Current status : <span id="pro_statusEdit"></span></p>
                                </div>
                                <div class="form-group col-5">
                                    <label for="sel1">Select status (product status):</label>
                                    <select class="form-control" id="categorystatus" name="proStatusEdit">
                                        <option value="active">Active</option>
                                        <option value="disabled">Disabled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Product name</label>
                                    <input type="text" class="form-control Checkme" placeholder="Enter Product name" name="proNameEdit">
                                    <span id="apperence1" style="color: red;">please Fill the fields</span>
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Product description</label>
                                    <input type="text" class="form-control Checkme" placeholder="Product description" name="proDescEdit">
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Product price</label>
                                    <input type="number" class="form-control Checkme" placeholder="Product price" name="proPriceEdit">
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Product discount</label>
                                    <input type="number" class="form-control Checkme" placeholder="Product discount" name="proDiscountEdit">
                                </div>
                                <div class="form-group">
                                    <label for="Categoryname">Product quantity</label>
                                    <input type="number" class="form-control Checkme" placeholder="Product quantity" name="proQuantityEdit">
                                </div>
                                <!--<label for="inputGroupFile01">Upload photo</label>-->
                                <div class="input-group mb-3">

                                    <!--<div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                        <div class="form-group custom-file">
                                        <input type="file" class="custom-file-input form-control" id="inputGroupFile011" value='upload' name="sub_categoryImgEdit" onchange="updatePhoto()">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>-->


                                </div>
                                <!--<div class="row">
                                    <div class="col-3" id="imgDivEdit"><span>categorys current photo</span></div>
                                    <div class="col-3" id="imgDivEdit2"></div>
                                </div>-->

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
<!-- Vertically centered modal start -->
< <!-- Modal -->
    <div class="modal fade" id="modalImg">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Images</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="" method="post" id="upload_multi_imgs" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="pro_id_img" value="pro_id_img" name="pro_id_img">
                    </div>
                    <label class="px-5" for="inputGroupFile01">Upload 4 photos at once/ Note:only 4 or less photos will be inserted </label>
                   <p class="px-5">photos inserted will be displayed</p> 
                    <div class="input-group mb-3 px-5">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="form-group custom-file">
                            <input type="file" class="custom-file-input form-control" id="image" value='upload' name="image[]" multiple accept=".jpg, .png, .gif">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="row col-12 " id="images_list"></div>
                    <div class="form-group ml-5">
                        <input type="submit" id="insert" value="insert" name="Insert" class="btn btn-info ">
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vertically centered modal end -->

    <!-- Progress Table start -->
    <div class="col-lg-12 col-md-6 col-sm-6 mt-2">
        <div class="card">
            <div class="row offset-2">
                <button class="btn btn-primary col-3 mr-3 catButton" id="all">All</button>
                <button class="btn btn-success col-3 mr-3 catButton" id="active1">Active</button>
                <button class="btn btn-danger col-3 catButton" id="disabled1">Disable</button>
            </div>
            <div class="card-body">
                <h4 class="header-title">Product Table</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">category name/status</th>
                                    <th scope="col">Sub category name/status</th>
                                    <th scope="col">status</th>
                                    <th scope="col">price /discount / quantity</th>
                                    <th scope="col">description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Status</th>
                                    <th onclick="load_images()" scope="col">action</th >
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qurry    = "SELECT * FROM product";
                                $result   = mysqli_query($conn, $qurry);
                                while ($pro     = mysqli_fetch_assoc($result)) {
                                    $qurry2           = "SELECT * FROM category WHERE cat_id ={$pro['cat_id']} ";
                                    $result2          = mysqli_query($conn, $qurry2);
                                    $catInsert        = mysqli_fetch_assoc($result2);
                                    $qurry3           = "SELECT * FROM sub_category WHERE sub_cat_id  ={$pro['sub_cat_id']} ";
                                    $result3          = mysqli_query($conn, $qurry3);
                                    $subcatInsert     = mysqli_fetch_assoc($result3);
                                    $qurry4           = "SELECT * FROM vendor WHERE vendor_id  ={$pro['vendor_id']} ";
                                    $result4          = mysqli_query($conn, $qurry4);
                                    $vendorinfo       = mysqli_fetch_assoc($result4);
                                    if($pro['vendor_id']==$_SESSION['v_id']){
                                        echo
                                        " <tr class='{$pro['product_status']}1 catItem'>
                                <td>{$pro['product_id']}</td>
                                <td>{$pro['product_name']}</td>
                                <td>{$catInsert['cat_name']}/<span class='{$catInsert['cat_status']}2'>{$catInsert['cat_status']}</span></td>
                                <td>{$subcatInsert['subcat_name']}/<span class='{$subcatInsert['sub_cat_status']}2'>{$subcatInsert['sub_cat_status']}</span></td>
                                <td> <span class='{$vendorinfo['vendor_status']}2'>{$vendorinfo['vendor_status']}</span></td>
                                <td>&#36;{$pro['product_price']} / &#36;{$pro['product_discount']} / {$pro['product_quantity']}</td>
                                <td>{$pro['product_desc']}</td>
                                <td ><a class='open-modalImg btn btn-info text-white' data-toggle='modalImg'
                                data-proIdImg ='{$pro['product_id']}' >Edit</a></td>
                                <td class='{$pro['product_status']}2'>{$pro['product_status']}</td>
                                
                                
                                
                                <td>
                                    
                                    <form method='get' action=''>
                                    <div class='table-data-feature'>
                                    <a data-toggle='modalEdit' 
                                    data-proId           ='{$pro['product_id']}'
                                    data-proName         ='{$pro['product_name']}'
                                    data-proDesc         ='{$pro['product_desc']}'
                                    data-proPrice        ='{$pro['product_price']}'
                                    data-proDiscount     ='{$pro['product_discount']}'
                                    data-proQun          ='{$pro['product_quantity']}'
                                    
                                    data-proStatus       ='{$pro['product_status']}'
                                    class='open-AddBookDialog btn btn-warning ' id='editplz'>Edit</a>
                                    
                                   <button class='btn btn-danger '  data-toggle='tooltip' data-placement='top' title='Delete' name='actionDelete' value='delete' '/>
                                   <i class=' ti-trash'></i>
                                   </button>
                                    
                                   <input type='hidden' name='idForDelete' value= '{$pro['product_id']}' >
                                   </div>
                                   </form>
                                   <button class='btn btn-danger switch {$pro['product_status']}3' id='{$pro['product_id']}' data-toggle='tooltip' data-placement='top' title='switch'  '/>
                                   Switch <i class=' ti-control-shuffle'></i>
                                   </button>
                                  </td>
                                </tr>";
                                    }else{
                                        "<div class='alert alert-danger' role='alert'>
                                         No orders yet! 
                                         </div>";
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

    <!-- Progress Table end -->


    <?php include_once('../includs/vendor_footer.php') ?>
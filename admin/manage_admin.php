<?php
ob_start(); //incase of multi requests
include_once('../includs/admin_header.php');
require('../includs/connection.php');
include('../includs/classes.php');
if (isset($_POST['submit'])) {
    $fullname   = $_POST['fullname'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $phone      = $_POST['phone'];
    $img_name   = $_FILES['adminImg']['name'];
    $temp_name  = $_FILES['adminImg']['tmp_name'];
    $path       = 'images/';
    //move files to img folder 
    move_uploaded_file($temp_name, $path . $img_name);
    //CLEAN
    
    $newAdmin = new AdminManege($fullname, $email, $password, $phone, $img_name, $conn);
    $newAdmin->Create_Admin();
}
if (isset($_GET['actionDelete'])) {
    if ($_GET['actionDelete'] && $_GET['idForDelete']) {
        if ($_GET['actionDelete'] == 'delete') {
            $adminIdd = $_GET['idForDelete'];
            $delete = new Delet_Admin($adminIdd, $conn);
            $delete->Delete();
        }
    }
}
if (isset($_POST['submitEdit'])) {
    $fullname   = $_POST['theName'];
    $email      = $_POST['theEmail'];
    $password   = $_POST['thePass'];
    $phone      = $_POST['thePhone'];
    $img_name   = $_FILES['theImg']['name'];
    $temp_name  = $_FILES['theImg']['tmp_name'];
    $path       = 'images/';
    //move files to img folder 
    move_uploaded_file($temp_name, $path . $img_name);


    $editAdmin =  new AdminManege($fullname, $email, $password, $phone, $img_name, $conn);
    $editAdmin->Edit_Admin($_POST['myAdmin_id']);
}



?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).on("click", ".open-AddBookDialog", function() {
        var myAdminId       = this.getAttribute('data-adminId');
        var myAdminName     = this.getAttribute('data-adminName');
        var myAdminEmail    = this.getAttribute('data-adminEmail');
        var myAdminPass     = this.getAttribute('data-adminPass');
        var myAdminPhone    = this.getAttribute('data-adminPhone');
        var myAdminImg      = this.getAttribute('data-adminImg');
        
        
        
        $('input[name=myAdmin_id]').val(myAdminId);
        $('input[name=theEmail]').val(myAdminEmail);
        $('input[name=theName]').val(myAdminName);
        
        $('input[name=thePass]').val(myAdminPass);
        $('input[name=thePhone]').val(myAdminPhone);
        //$('input[pro-img1]').val(myAdminImg);
       
        
        $('#modalEdit').modal('show');
    });
</script>
<!-- Large modal start -->
<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body" style="background-color: #F3F8FB;">
            <h4 class="header-title">Add New Admin</h4>

            <!-- Large modal -->
            <button type="button" class="btn btn-primary  btn-lg px-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Admin
            </button>
            <div class="modal fade bd-example-modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ">Add Admin</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- basic form start -->
                            <div class="col-12 mt-1">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Admin informations</h4>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Full name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter full name" name="fullname">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone number" name="phone">
                                            </div>
                                            <label for="inputGroupFile01">Upload photo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="form-group custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="inputGroupFile01" value='upload' name="adminImg">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
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
 <div class="modal fade bd-example-modal-lg modalEdit" id="modalEdit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ">Add Admin</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <!-- basic form start -->
                            <div class="col-12 mt-1">
                                <div class="card">
                                    <div class="card-body" >
                                        <h4 class="header-title">Admin informations</h4>
                                        <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="hidden"   value="myAdmin_id" name="myAdmin_id">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="theEmail">
                                            </div>
                                            <div class="form-group">
                                                <label for="name1">Full name</label>
                                                <input type="text" class="form-control" id="name1" placeholder="Enter full name" name="theName">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="thePass">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone number" name="thePhone">
                                            </div>
                                            <label for="inputGroupFile01">Upload photo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="form-group custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="inputGroupFile01" value='upload' name="theImg">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
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
<div class="col-12 mt-2">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Admins Table</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Image</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qurry          = "SELECT * FROM admin";
                            $result         = mysqli_query($conn, $qurry);
                            while ($admin   = mysqli_fetch_assoc($result)) {
                                echo
                                    " <tr>
                                <td >{$admin['admin_id']}</td>
                                <td> {$admin['admin_name']}</td>
                                <td> {$admin['admin_email']}</td>
                                <td> {$admin['admin_phone']}</td>
                                <td><img src='images/{$admin['admin_img']}' style='height : 60px;width:60px;'></td>
                                <td>
                                    <form method='get' action=''>
                                    <div class='table-data-feature'>
                                    <a data-toggle='modalEdit' 
                                    data-adminId         ='{$admin['admin_id']}'
                                    data-adminName       ='{$admin['admin_name']}'
                                    data-adminEmail      ='{$admin['admin_email']}'
                                    data-adminPass       ='{$admin['admin_password']}'
                                    data-adminPhone      ='{$admin['admin_phone']}'
                                    data-adminImg        ='{$admin['admin_img']}'
                                    class='open-AddBookDialog btn btn-warning mr-5 ' id='editplz'>Edit</a>
                      
                                   <button class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Delete' name='actionDelete' value='delete' />
                                   <i class='ti-trash'></i>
                                   </button>
                                   <input type='hidden' name='idForDelete' value= '{$admin['admin_id']}' >
                                </div>
                                      </div>
                                    </form>
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
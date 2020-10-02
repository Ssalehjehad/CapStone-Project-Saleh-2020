<?php
ob_start();
session_start();
require('../includs/connection.php');

if (isset($_POST['check_field'])) {
   $name = $_POST['name_name'];
   $qury1    = "SELECT * from category where cat_name ='$name' ";
   $result1   = mysqli_query($conn, $qury1);
   $existance    = mysqli_num_rows($result1);
   if ($existance > 0) {
      echo "name exist try another one";
   } else {
      echo "name not used";
   }
}
if (isset($_POST['check_switch'])) {
   $idForSwitch = $_POST['switch'];
   $qury1       = "SELECT * from category where cat_id ='$idForSwitch' ";
   $result1     = mysqli_query($conn, $qury1);
   $existance   = mysqli_fetch_assoc($result1);
   $dova        = $existance['cat_status'];
   $disabled    = "disabled";
   $active      = "active";


   if ($existance['cat_status'] == "active") {
      $smt = $conn->prepare("UPDATE category SET cat_status=? WHERE cat_id=?");
      $smt->bind_param('si', $disabled, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   } else {
      $smt = $conn->prepare("UPDATE category SET cat_status=? WHERE cat_id=?");
      $smt->bind_param('si', $active, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   }
}
if (isset($_POST['subcheck_field'])) {
   $name = $_POST['subname_name'];
   $qury1    = "SELECT * from sub_category where subcat_name ='$name' ";
   $result1   = mysqli_query($conn, $qury1);
   $existance    = mysqli_num_rows($result1);
   if ($existance > 0) {
      echo "name exist try another one";
   } else {
      echo "name not used";
   }
}
if (isset($_POST['subcheck_switch'])) {
   $idForSwitch = $_POST['subswitch'];
   $qury1       = "SELECT * from sub_category where sub_cat_id  ='$idForSwitch' ";
   $result1     = mysqli_query($conn, $qury1);
   $existance   = mysqli_fetch_assoc($result1);
   $dova        = $existance['cat_status'];
   $disabled    = "disabled";
   $active      = "active";


   if ($existance['sub_cat_status'] == "active") {
      $smt = $conn->prepare("UPDATE sub_category SET 	sub_cat_status=? WHERE sub_cat_id =?");
      $smt->bind_param('si', $disabled, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   } else {
      $smt = $conn->prepare("UPDATE sub_category SET 	sub_cat_status=? WHERE sub_cat_id =?");
      $smt->bind_param('si', $active, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   }
}
if (isset($_POST['cat_branch'])) {
   $return_arr = array();
   $idForBranch = $_POST['cat_branch_id'];
   $qury1       = "SELECT * from sub_category where cat_id  ='$idForBranch' ";
   $result1     = mysqli_query($conn, $qury1);


   if ($result1->num_rows > 0) {


      // output data of each row
      while ($row = $result1->fetch_assoc()) {
         $id    = $row['sub_cat_id'];
         $name  = $row['subcat_name'];


         $return_arr[] = array(
            "id"   => $id,
            "name" => $name
         );
      }
      echo json_encode($return_arr);
   } else {
      echo "0 results";
   }

   $conn->close();

   exit();
}
if (isset($_POST['proCheck_switch'])) {
   $idForSwitch = $_POST['proswitch'];
   $qury1       = "SELECT * from product where product_id  ='$idForSwitch' ";
   $result1     = mysqli_query($conn, $qury1);
   $existance   = mysqli_fetch_assoc($result1);
   $dova        = $existance['product_status'];
   $disabled    = "disabled";
   $active      = "active";


   if ($existance['product_status'] == "active") {
      $smt = $conn->prepare("UPDATE product SET 	product_status=? WHERE product_id =?");
      $smt->bind_param('si', $disabled, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   } else {
      $smt = $conn->prepare("UPDATE product SET 	product_status=? WHERE product_id =?");
      $smt->bind_param('si', $active, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   }
}
if (isset($_POST['vcheck_switch'])) {
   $idForSwitch = $_POST['vswitch'];
   $qury1       = "SELECT * from vendor where vendor_id  ='$idForSwitch' ";
   $result1     = mysqli_query($conn, $qury1);
   $existance   = mysqli_fetch_assoc($result1);
   $dova        = $existance['vendor_status'];
   $disabled    = "disabled";
   $active      = "active";


   if ($existance['vendor_status'] == "active") {
      $smt = $conn->prepare("UPDATE vendor SET 	vendor_status=? WHERE vendor_id =?");
      $smt->bind_param('si', $disabled, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   } else {
      $smt = $conn->prepare("UPDATE vendor SET 	vendor_status=? WHERE vendor_id =?");
      $smt->bind_param('si', $active, $idForSwitch);
      $smt->execute();
      $stmt->close();
      $conn->close();

      exit();
   }
}



if (isset($_POST['pro_id_img_switch'])) {
   if (count($_FILES['image']['tmp_name']) > 0) {
      $path           = 'images/';
      $imgname_array = array();
      $imgtmp_array = array();
      for ($count = 0; $count < 4; $count++) {
         $imgname_array[] = trim($_FILES['image']['name'][$count]);
         $imgtmp_array[] = trim($_FILES['image']['tmp_name'][$count]);
      }
      for ($count = 0; $count < 4; $count++) {
         move_uploaded_file($imgtmp_array[$count], $path . $imgname_array[$count]);
      }
      $proImg_id  = $_POST['pro_id_img'];
      $qury1d       = "SELECT * from pro_images where product_id  ='$proImg_id' ";
      $result1d     = mysqli_query($conn, $qury1d);
      if ($result1d->num_rows > 0) {
         $stm = $conn->prepare("UPDATE pro_images SET img1= ? ,img2= ? ,img3= ? ,img4= ? WHERE product_id  =?");
         $stm->bind_param('ssssi', $imgname_array[0], $imgname_array[1], $imgname_array[2], $imgname_array[3], $proImg_id);
         $stm->execute();
         $stmt->close();
         $conn->close();
         exit();
      } else {
         $qurry = "INSERT INTO pro_images(product_id,img1,img2,img3,img4) VALUES ('$proImg_id','$imgname_array[0]','$imgname_array[1]','$imgname_array[2]','$imgname_array[3]')";
         $stm   = $conn->prepare($qurry);
         $stm->execute();
         $stmt->close();
         $conn->close();
         exit();
      }
   }
}

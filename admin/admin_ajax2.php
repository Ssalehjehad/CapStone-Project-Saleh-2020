<?php
ob_start();
session_start();
require('../includs/connection.php');
    $newID=$_POST['summon_id_img'];
    

    $query         = "SELECT * FROM pro_images WHERE product_id = '$newID' ";
    $statement     = $conn->prepare($query);
    $result        = mysqli_query($conn, $query);
    $imgname_array = array();
    $existance     = mysqli_fetch_assoc($result);
    $count1        =$result->num_rows;
   if ($result->num_rows > 0) {
    for($count = 1; $count < 5; $count++){
        $imgname_array[]=$existance["img".$count];
    }
    $output = '<div class="row">';
   for($count = 0; $count < 4; $count++){
    $output .= '<div class="col-md-3 removereset" style="margin-bottom:16px;">
    <img src="images/'.$imgname_array[$count].'" class="img-thumbnail" />
   </div>
   ';
   }
   $output .= '</div>';
   echo $output;
   }
   
    
    
      
    
     
       
   
  
    ?>
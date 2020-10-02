<?php
 //opened database connection
     //mysqli_connect("SERVER NAME","USER NAME","PASSWORD","DBNAME");
     $servername="localhost";
     $dbname    ="ecommerceproject";
     $username  ="root";
     $password1  =""; 
     $conn = mysqli_connect($servername,$username,$password1,$dbname);
     if($conn->connect_error){
         die("cannot start connection : ". $conn->connect_error);
     }
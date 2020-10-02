<?php

use function PHPSTORM_META\type;

class AdminManege{
    protected $email;
    protected $password;
    protected $fullname;
    protected $phoneNumber;
    protected $image;
    protected $conn;
    function __construct($fullname,$email,$password,$phoneNumber,$image,$conn)
    {
        $this->email       =$email;
        $this->password    =$password;
        $this->fullname    =$fullname;
        $this->phoneNumber =$phoneNumber;
        $this->image       =$image;
        $this->conn        =$conn;
    }
    function Create_Admin(){
        $stmt = $this->conn->prepare("INSERT INTO admin(admin_name, admin_email, admin_password ,admin_phone,admin_img)
                                      VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->fullname,$this->email,$this->password,$this->phoneNumber,$this->image);
        //Clean
        // $qurry ="INSERT INTO admin(admin_name,admin_email,admin_password,admin_phone,admin_img)
        // values('$this->fullname','$this->email','$this->password','$this->phoneNumber','$this->image')";
        //  mysqli_query($this->conn, $qurry);
        //  header("Location: manage_admin.php");
        //  exit();
      $stmt->execute();
      $stmt->close();
      $this->conn->close();
      header("Location: manage_admin.php");
      exit();
    }
    function Edit_Admin($id){
        $qurry = "UPDATE admin SET admin_name       ='$this->fullname',
                                   admin_email      ='$this->email',
                                   admin_password   ='$this->password',
                                   admin_phone      ='$this->phoneNumber',
                                   admin_img        ='$this->image'
                 WHERE admin_id=$id";
        
             mysqli_query($this->conn, $qurry);
             header("location:manage_admin.php");
    }
    
 }

 class Delet_Admin{
    protected $id;
    protected $conn;

    function __construct($id,$conn)
    {
        $this->id   =$id;
        $this->conn =$conn;
    }  
    function Delete(){

        //$stmt = $this->conn->prepare("DELETE FROM admin WHERE id = ?");
       // $stmt->bind_param('i', $this->id);
      $qurry= "DELETE FROM admin WHERE admin_id =$this->id";
       mysqli_query($this->conn, $qurry);
      // $stmt->execute();
      // $stmt->close();
      // $this->conn->close();
        header("location:manage_admin.php");
        exit();
    }   
}
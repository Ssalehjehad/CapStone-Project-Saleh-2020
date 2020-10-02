<?php
session_start();
//logout.php
session_destroy (  );
session_unset($_SESSION['theCart']);
session_unset($_SESSION['customer_id']);
header('location:index.php');

?>
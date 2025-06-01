<?php

include('../config/constants.php');  ?>

<?php

$id = $_GET['id']; 

$sql = "DELETE FROM tbl_admin WHERE id = $id";

$res = mysqLi_query($conn , $sql);

if($res == TRUE ){
  
    $_SESSION['delete'] = "Admin Deleted successfully" ; 
    header('location:'.SITEURL.'admin/manage-admin.php'); 
}else{
     $_SESSION['delete'] = "Admin not Deleted " ; 
    header('location:'.SITEURL.'admin/manage-admin.php'); 
}





?>
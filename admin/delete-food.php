<?php 
include('../config/constants.php'); 
if(isset($_GET['id']) && isset($_GET['image_name'])){
   $id = $_GET['id'];
    $image_name =  $_GET['image_name']; 

    if($image_name != ""){
        $path = "../images/food/".$image_name ; 

        $remove = unlink($path); 

        if($remove == false  ){
           $_SESSION['upload'] = "failed to remove image file" ; 
           header('location:'.SITEURL.'admin\manage-food.php'); 
           die(); 
        }

       

    }

     $sql = "DELETE FROM tbl_food where id=$id" ; 

        $res = mysqli_query($conn , $sql); 

        if($res == true  ){
            $_SESSION['delete'] = "food deleted " ; 
            header('location:'.SITEURL.'admin\manage-food.php'); 

        }else{
               $_SESSION['delete'] = "food not deleted " ; 
            header('location:'.SITEURL.'admin\manage-food.php'); 

        }

}else{
   
    $_SESSION['unauthorized'] = "image and id not passed";
     header('location:'.SITEURL.'admin\manage-food.php'); 
}

?>
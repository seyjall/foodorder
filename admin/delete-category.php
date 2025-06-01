<?php 
include('../config/constants.php');
  
 if(isset($_GET['id']) && isset($_GET['image_name'])){
  $id = $_GET['id']; 

  $image_name = $_GET['image_name']; 

  if($image_name != ""){
     $path = "../images/category/".$image_name;

     $remove = unlink($path) ; 

     if($remove == false ){
        $_SESSION['remove'] = "image not deleted";
        header('location:'.SITEURL.'admin/manage-category.php');

        die(); 
      }
  }

  $sql = "DELETE FROM tbl_category WHERE id=$id";

  $res = mysqLi_query($conn , $sql); 

  if($res == true ){
     $_SESSION['delete'] = "category deleted" ; 
     header('location:'.SITEURL.'admin/manage-category.php'); 

  }else{
     $_SESSION['delete'] = "category not deleted" ; 
     header('location:'.SITEURL.'admin/manage-category.php'); 
  }

  
 }else{

   header('location:'.SITEURL."admin/manage-category.php"); 
 }




?>
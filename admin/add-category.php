<?php  include('partials/menu.php');?>

<div class= "main-content"> 



<div class="wrapper">
<h1>Add Category</h1>
</br>
</br>

<form action="" method = "POST" enctype ="multipart/form-data">

<table>
    <tr>
        <td>Title:</td>
        <td><input type = "text" name ="title" placeholder= "Category Title" >       </td>

</tr>

  <tr>
        <td>Select Image:</td>
        <td><input type = "file" name ="image"  >       </td>

</tr>

<tr>
        <td>Featured:</td>
        <td><input type = "radio" name ="featured" value="Yes" >Yes  </td>
         <td><input type = "radio" name ="featured" value="No" >No </td>
</tr>

<tr>
        <td>Active:</td>
        <td><input type = "radio" name ="active" value="Yes" >Yes  </td>
         <td><input type = "radio" name ="active" value="No" >No </td>
</tr>

<tr>
    <td colspan = "2"> <input type="submit" name ="submit" value ="Add Category" class="btn-secondary">
         </td>

</td>

</tr>







</table>
</form>

<?php 


if(isset($_POST['submit'])){

     $title = $_POST['title']; 

    if(isset($_POST['featured'])){
       $featured = $_POST['featured'];
    }else{
          $featured = "No" ; 
    }

     if(isset($_POST['active'])){
       $active = $_POST['active'];
    }else{
          $active = "No" ; 
    }

    if(isset($_FILES['image']['name'])){
         $image_name = $_FILES['image']['name']; 

         if($image_name != ""){

         
         $ext = end(explode('.' , $image_name));

         $image_name = "Food_Category_".rand(000 ,999).'.'.$ext;
         
        $source_path = $_FILES['image']['tmp_name']; 
        $destination_path = "../images/category/".$image_name ; 

        $upload = move_uploaded_file($source_path , $destination_path); 

        if($upload == false ){

         $_SESSION['upload'] = "error in uploading image" ; 
         header('location:'.SITEURL."admin/add-category.php"); 
         die(); 

        } 
         
         }


     }else{
        $image_name = ""; 
    }

  

    $sql = "INSERT INTO tbl_category SET 
    title = '$title' , 
    featured = '$featured' , 
    image_name = '$image_name' , 
    active = '$active' "; 
   
 
    $res = mysqli_query($conn , $sql); 
  


    if($res == TRUE) {
       $_SESSION['add'] = "Category added successfully" ; 
       header('location:'.SITEURL.'admin/manage-category.php');  
    }else{
         $_SESSION['add'] = "failed " ; 
       header('location:'.SITEURL.'admin/add-category.php'); 
    }
}



?>

</div>
</div>




<?php  include('partials/footer.php');?>
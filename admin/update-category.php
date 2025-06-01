<?php

include('partials/menu.php');?> 

<div class="main-content">
 <div class="wrapper"> 
 
 <h1>Update Category</h1>
</br>
</br>




<?php 
if(isset($_GET['id'])){
   
    $id = $_GET['id']; 
    $sql = "SELECT *fROM tbl_category WHERE id=$id"; 
    $res = mysqLi_query($conn , $sql); 
    $count = mysqli_num_rows($res); 
    if($count == 1 ){
        $row = mysqli_fetch_assoc($res); 

        $title = $row['title']; 
        $featured = $row['featured']; 
        $active = $row['active']; 
        $current_image = $row['image_name']; 

    }else{
         $_SESSION['no-category'] = "Category not found"; 
         header('location:'.SITEURL."admin/manage-category.php"); 
    }
}else{
    header('location:'.SITEURL."admin/manage-category.php"); 
}


?>
<form action="" method = "POST" enctype ="multipart/form-data">

<table>
    <tr>
        <td>Title:</td>
        <td><input type = "text" name ="title" placeholder= "Category Title" value = "<?php echo $title?>" >       </td>

</tr>

  <tr>
        <td>Current Image:</td>
        <td><?php
         if($current_image != ""){
          ?>
          <img src = "<?php echo SITEURL ?>images/category/<?php echo $current_image ?>"  width = "150px">
          <?php
         }else{
            echo "image not available"; 
         }
        
        ?>     </td>

</tr>
 <tr>
        <td>New Image:</td>
        <td><input type="file" name="image">       </td>

</tr>

<tr>
        <td>Featured:</td>
        <td><input  type = "radio" name ="featured" value="Yes" <?php if($featured == "Yes") {echo "checked" ;}?> >Yes  
         <input type = "radio" name ="featured" value="No" <?php if($featured == "No") {echo "checked" ;}?>>No
         </td>
</tr>

<tr>
        <td>Active:</td>
        <td><input type = "radio" name ="active" value="Yes" <?php if($active == "Yes") {echo "checked" ;}?> >Yes  
        <input type = "radio" name ="active" value="No" <?php if($active == "No") {echo "checked" ;}?> >No </td>
</tr>

<tr>
    <td ><input type="hidden" name ="current_image" value = "<?php echo $current_image?>" > </td>
    <td colspan = "2"> <input type="submit" name ="submit" value ="Update Category" class="btn-secondary">
         </td>

</td>

</tr>



</table>
</form>

<?php 

if(isset($_POST['submit'])){
 
    $title = $_POST['title']; 
    $featured = $_POST['featured']; 
    $active = $_POST['active'] ; 
    $current_image = $_POST['current_image']; 
    $id = $_GET['id']; 

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

        //remove current image 
        if($current_image != ""){
         $remove_path = "../images/category/".$current_image ; 

         $remove = unlink($remove_path); 
         
         if($remove == false ){
            $_SESSION['failed-remove'] = "failed to remove current-image"; 
            header('location:'.SITEURL."admin/manage-category.php"); 
            die(); 
         }
        }
        










         }else{
           $image_name = $current_image ; 
         }
    }else{
        $image_name = $current_image ; 
    }

    $sql2 = "UPDATE tbl_category SET 
    title = '$title' , 
    featured = '$featured' , 
    active = '$active' , 
    image_name = '$image_name' 
    WHERE id = $id 
    ";

    $res2 = mysqLi_query($conn , $sql2); 

    if($res2 == true ){
       $_SESSION['update'] = "category updated"; 
       header('location:'.SITEURL."admin/manage-category.php"); 
    }else{
         $_SESSION['update'] = "category not updated"; 
       header('location:'.SITEURL."admin/manage-category.php"); 

    }
}



?>



















 </div>   

</div>


<?php

include('partials/footer.php');?> 
<?php include('partials/menu.php'); ?>
<?php

if(isset($_GET['id'])){

    $id = $_GET['id']; 

    $sql2 = "SELECT *FROM tbl_food  WHERE id =$id"; 

    $res2 = mysqli_query($conn , $sql2); 

    $row2 = mysqli_fetch_assoc($res2); 

    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price']; 
    $current_image = $row2['image_name']; 
    $current_category = $row2['category_id']; 
    $active = $row2['active']; 


}else{
    header('location:'.SITEURL.'admin/manage-food.php'); 
}






?>

<div class=" main-content">
<div class=" wrapper">

<h1>Update Food  </h1>
</br> 
</br>


<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
   <tr>
  <td>Title: </td> 
  <td><input type="text" name = "title"  value = "<?php echo $title?>">   </td>  
</tr>

<tr>
  <td>Description: </td> 
  <td><textarea name = "description" placeholder="Description of food" cols="30" rows="5"><?php echo $description?></textarea>  </td>  
</tr>

<tr>
  <td>Price: </td> 
  <td><input type= "number" name = "price" value="<?php echo $price ?>">  </td>  
</tr>

<tr>
  <td>Current Image:</td> 
  <td>
    <?php
     if($current_image == ""){
        echo "image not available"; 
     }else{
        ?>
        <img  src="<?php echo SITEURL?>images/food/<?php echo $current_image ?>" width="150px" >

        <?php
     }
     
    
    ?>
    


</td>  
</tr>

  <tr>
                    <td>Select New Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>

<tr>
  <td>Category:</td> 
  <td>
    <select name="category">
     <?php 
     $sql = "SELECT *FROM tbl_category WHERE active='Yes'";

     $res = mysqli_query($conn , $sql); 
     
     $count = mysqli_num_rows($res);

     if($count >0 ){
       
        while($row= mysqli_fetch_assoc($res)){
            $id = $row['id']; 
            $title= $row['title']; 

            ?>
            <option <?php if($current_category == $id){echo "selected";} ?>value="<?php echo $id ?>"><?php echo $title ?> </option>

            <?php
        }
     }else{
        ?>
        <option value="0">No Category Found </option>

        <?php

     }
     
     
     ?>
</select>

 </td>  
</tr>

<tr>
<td>Featured: </td>
<td>
 <input  type="radio" name="featured" value= "Yes" <?php if($featured == "Yes"){echo "checked";}?>>Yes   
 <input type="radio" name="featured" value= "No" <?php if($featured == "No"){echo "checked";} ?>>No
</td>
</tr>

<tr>
<td>Active: </td>
<td>
 <input type="radio" name="active" value= "Yes" <?php if($active == "Yes"){echo "checked";} ?>>Yes   
 <input type="radio" name="active" value= "No" <?php if($active == "No"){echo "checked";} ?>>No
</td>
</tr>

<tr>
<td colspan="2">
    <input type="hidden" name="id" value = "<?php echo $id?>">
    <input type="hidden" name="current_image" value = "<?php echo $current_image?>">
    <input  type="submit" name="submit" value = "Update Food" class="btn-secondary">

</td>


</tr>


</table>



</form>

<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
     $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price']; 
    $current_image = $_POST['image_name']; 
    $category = $_POST['category_id']; 
    $active = $_POST['active'];  

    $featured = $_POST['featured']; 
    $active = $_POST['active'];

    if(isset($_FILES['image']['name'])){
        $image_name = $_FILES['image']['name'] ; 

        if($image_name != ""){
            $ext = end(explode('.' , $image_name)); 

            $image_name = "Food-name".rand(0000 , 9999).'.'.$ext ; 

            $src_path = $_FILES['image']['tmp_name']; 
            $dest_path = "../images/food/".$image_name ; 

            $upload = move_uploaded_file($src_path , $dest_path); 

            if($upload == false ){
                $_SESSION['upload'] = "failed to upload img" ; 
                header('location:'.SITEURL.'admin/manage-food.php'); 
                die(); 
            }


            if($current_image != ""){
                //remove current img 
                $remove_path = "../images/food/".$current_image ; 

                $remove = unlink($remove_path) ; 

                if($remove == false ){
                    $_SESSION['remove-failed'] = "failed to remove curr img" ; 
                    header('location:'.SITEURL.'admin/manage-food.php'); 
                    die(); 
                }
            }

    
        }
    }else{
        $image_name = $current_image ; 
    }


    $sql3 = "UPDATE tbl_food SET 
    title = '$title' , 
    description = '$description' , 
    price = '$price' ,
    image_name = '$image_name' , 
     category_id = '$category' , 
     featured = '$active' , 
     active = '$active' 
     WHERE id = $id ; 

    "; 

    $res3 = mysqli_query($conn , $sql3); 
    if($res3 == true ){
        $_SESSION['update'] = "food updated successfully" ; 
        header('location:'.SITEURL.'admin/manage-food.php'); 

    }else{
         $_SESSION['update'] = "failed to update food " ; 
        header('location:'.SITEURL.'admin/manage-food.php'); 
    }

}


?>


</div>
</div>




<?php include('partials/footer.php'); ?>
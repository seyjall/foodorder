<?php include('partials/menu.php')  ?>


  <div class="main-content">

   <diV class = "wrapper" >
<h1> Manage Category </h1>
   <br/>  <br/>  <br/>
   <?php 

   if(isset($_SESSION['add']) && isset($_SESSION['upload'])){
     echo $_SESSION['add']; 
     unset($_SESSION['add']);
   }
     if(isset($_SESSION['remove'])){
     echo $_SESSION['remove']; 
     unset($_SESSION['remove']);
   }

   if(isset($_SESSION['delete'])){
     echo $_SESSION['delete']; 
     unset($_SESSION['delete']);
   }

   if(isset($_SESSION['no-category'])){
     echo $_SESSION['no-category']; 
     unset($_SESSION['no-category']);
   }

    if(isset($_SESSION['update'])){
     echo $_SESSION['update']; 
     unset($_SESSION['update']);
   }

   
    if(isset($_SESSION['upload'])){
     echo $_SESSION['upload']; 
     unset($_SESSION['upload']);
   }

    
   ?>
   <a href="<?php echo SITEURL;?>admin/add-category.php" class= "btn-primary" >Add Category </a>

      <br/>  <br/>  <br/>
 
   <form action = "<?php echo SITEURL ?>admin/search-category.php" method="POST">

<input type = "search" name = "search" placeholder = "search for active category." required>
<input type = "submit" name = "submit" value = "search" class = "btn-primary">


</form>

   
   <br/>  <br/>  <br/>
   <table class = "tbl-full">
    <tr>
      <th>S.N</th>
      <th>Title</th>
         <th>Image </th>
          <th>Featured </th>
          <th> Active </th>
         <th>Actions </th>
</tr>

<?php 

$sql = "SELECT *FROM tbl_category" ; 

$res = mysqLi_query($conn , $sql); 

 $count = mysqli_num_rows($res); 

 $sno = 1 ; 
if($count > 0 ){
 
  
  while($row = mysqli_fetch_assoc($res)){
   
    $id = $row['id']; 
    $title = $row['title']; 
    $image_name = $row['image_name'];
    $featured = $row['featured'];
    $active = $row['active'] ; 

    ?>

    <tr>
  <td><?php echo $sno++ ?></td>
<td><?php echo $title ?></td>
<td><?php 

if($image_name == ""){
  echo "no image available";
}else{
    ?>
    <img src="<?php echo SITEURL ?>images/category/<?php echo $image_name ?>" width = "100px"  >

    <?php
}

?></td>
<td><?php echo $featured ?></td>
<td><?php echo $active?></td>
<td>
   <a href="<?php echo SITEURL?>admin/update-category.php?id=<?php echo $id?>" class= "btn-secondary" >Update Category</a>
    <a href="<?php echo SITEURL?>admin/delete-category.php?id=<?php echo $id?>&image_name=<?php echo $image_name?>" class= "btn-danger" >Delete Category</a>
</td>
</tr>


    <?php

  }

}else{
   ?>
   <tr>
 <td colspan = "6">No category Added</td>
</tr>

   <?php 
}







?>






</table>

  

    <div class = "clearFix"> </div>
  </div>
 
 </div>


 <?php  include ('partials/footer.php')?>
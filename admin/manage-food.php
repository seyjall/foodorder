<?php include('partials/menu.php')  ?>


  <div class="main-content">

   <diV class = "wrapper" >
   <h1> Manage Food </h1>
   <br/>  <br/>  <br/>
   <a href="<?php echo SITEURL?>admin/add-food.php" class= "btn-primary" >Add Food</a>
   
   <br/>  <br/>  <br/>

   <a href="<?php echo SITEURL?>admin/add-food.php" class= "btn-primary" >Add Food</a>
   </br> </br> </br> 
   <form action = "<?php echo SITEURL ?>admin/search-food.php" method="POST">

<input type = "search" name = "search" placeholder = "search for food item.." required>
<input type = "submit" name = "submit" value = "search" class = "btn-primary">


</form>
  
   
   <br/>  <br/>  <br/>


   <?php 

   if(isset($_SESSION['add'])){
     echo $_SESSION['add'] ; 
     unset($_SESSION['add'] ); 
   }
   
    if(isset($_SESSION['delete'])){
     echo $_SESSION['delete'] ; 
     unset($_SESSION['delete'] ); 
   }

    if(isset($_SESSION['upload'])){
     echo $_SESSION['upload'] ; 
     unset($_SESSION['upload'] ); 
   }

   if(isset($_SESSION['unauthorized'])){
     echo $_SESSION['unauthorized'] ; 
     unset($_SESSION['unauthorized'] ); 
   }

    if(isset($_SESSION['update'])){
     echo $_SESSION['update'] ; 
     unset($_SESSION['update'] ); 
   }
   ?>
   <table class = "tbl-full">
    <tr>
      <th>S.N</th>
       <th>Title:</th>
         <th>Price:</th>
         <th>Image:</th>
         <th> Featured :</th>
         <th>Active:</th>
            <th>Actions:</th>
</tr>

<?php 
$sql = "SELECT *FROM tbl_food"; 

$sno = 1 ; 
$res = mysqli_query($conn , $sql); 

$count = mysqli_num_rows($res); 

if($count > 0 ){
  while($row = mysqli_fetch_assoc($res)){
     $title = $row['title'] ; 
     $id = $row['id']; 
     $price = $row['price']; 
     $image_name = $row['image_name']; 
     $featured = $row['featured']; 
     $active = $row['active']; 

     ?>
     <tr>
  <td><?php echo $sno++ ?></td>
<td><?php echo $title ?></td>
<td><?php echo $price ?></td>
<td><?php 
if($image_name != ""){
  ?>

 <img src="<?php echo SITEURL;?>/images/food/<?php echo $image_name ?>" width ="150px" >
<?php
}else{
  echo "no image ";
}
?></td>
<td><?php echo $featured ?></td>
<td><?php echo $active ?></td>
<td>
   <a href="<?php echo SITEURL?>admin/update-food.php?id=<?php echo $id ?>" class= "btn-secondary" >Update Food</a>
    <a href="<?php echo SITEURL?>admin/delete-food.php?id=<?php echo $id ?>&image_name=<?php echo $image_name?>" class= "btn-danger" >Delete Food </a>
</td>
</tr>

     <?php
  }

}else{
  ?>

 <tr><td colspan = '7'>Food not added yet </td> </tr>
  <?php
}


?>





</table>

  

    <div class = "clearFix"> </div>
  </div>
 
 </div>


 <?php  include ('partials/footer.php')?>
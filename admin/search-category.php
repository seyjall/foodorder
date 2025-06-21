<?php include('partials/menu.php'); ?>


<div class = "main-content"> 

<div class="wrapper">

<h1>Food Items in Searched Category</h1>

</br> </br>

<?php

$search = $_POST['search']; 

$sql = "SELECT *FROM tbl_category WHERE title LIKE '%$search%' AND active = 'Yes'" ; 

$res = mysqli_query($conn , $sql); 

$count = mysqli_num_rows($res); 

if($count > 0 ){
    $row = mysqli_fetch_assoc($res);
    $cat_id = $row['id'] ; 
   $sql1 = "SELECT *FROM tbl_food WHERE  category_id = '$cat_id'"; 
   $res1 = mysqli_query($conn , $sql1); 

   $count = mysqli_num_rows($res1); 
    
   while($row1 = mysqli_fetch_assoc($res1)){
       $id = $row1['id']; 
       $title = $row1['title']; 
       $image_name = $row1['image_name']; 
       $category_name = $search ; 
       $price = $row1['price']; 
       $description = $row1['description']; 

       
       ?>
       <div class = "food-menu-box">

        <div class = "food-menu-img">
        <?php 

        if($image_name == ""){
          echo "no image available";
        }else{
            ?>
          <img src= "<?php echo SITEURL ?>images/food/<?php echo $image_name ?>" alt = "food image" class = "img-responsive img-curve">
          <?php
        }

        ?>
       
        </div>

        <div class = "food-menu-desc">
        <h4>Item name : <?php echo $title?> </h4>
        <p class = "food-price">Price : <?php echo $price?>  </p>
        <p>Category : <?php echo $category_name?> </p>
        <p>Description :  <?php echo $description?> </p>


        </div>


        </div>
       


       <?php
   }
}else{
    echo "Category not found or inactive";
}


?>

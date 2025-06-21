<?php include('partials/menu.php'); ?>


<div class = "main-content"> 

<div class="wrapper">

<h1>Searched Food Item</h1>

</br> </br>

<?php

$search = $_POST['search']; 

$sql = "SELECT *FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'"; 

$res = mysqli_query($conn , $sql); 

$count = mysqli_num_rows($res); 


if($count > 0 ){

    while($row = mysqli_fetch_assoc($res)){

        $id = $row['id'] ; 
        $title = $row['title']; 
        $price = $row['price']; 
        $description = $row['description'];
        $image_name = $row['image_name'];
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
        <p class = "food-detail">Description : <?php echo $description?> </p>
        


        </div>


        </div>

        <?php
    }

}else{
   echo "food not found" ;  
}
 ?>



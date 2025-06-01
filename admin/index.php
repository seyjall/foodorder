<?php include('partials/menu.php')  ?>
 
 


  <div class="main-content">

   <div class = "wrapper" >
   <h1 style = "color : green" > DASHBOARD </h1>
   </br>


   <div class= " col-4 text-center  ">
    <h1 style = "color : darkblue" >Users Information</h1>
    <?php 
    $sql = "SELECT *FROM tbl_admin" ; 

    $res = mysqli_query($conn , $sql) ; 

    $count = mysqli_num_rows($res) ; 

     if($res == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        
        ?>
        </br>
        </br>
        <p>No of available Admin : <?php echo $count ?> </p>

        <?php

        $sql7 = "SELECT *FROM tbl_customer" ; 
        $res7 = mysqli_query($conn , $sql7) ; 

    $count7 = mysqli_num_rows($res7) ; 

     if($res7 == false ){
        echo "query not executed" ; 
        die(); }else{
         ?>
        </br>
        </br>
        <p>No of available Customers: <?php echo $count7 ?> </p>

        <?php

        }

    }
    
    ?>
    
    </div>

    <div class= "col-4 text-center">
    <h1 style = "color : darkblue">Category Information</h1>
     <?php 
    $sql1 = "SELECT *FROM tbl_category" ; 

    $res1 = mysqli_query($conn , $sql1) ; 

    $count1 = mysqli_num_rows($res1) ; 

     if($res1 == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        
        ?>
        </br>
        </br>
        <p>No of available Category : <?php echo $count1 ?> </p>

        <?php

         $sql2 = "SELECT *FROM tbl_category WHERE active ='YES'" ; 

    $res2 = mysqli_query($conn , $sql2) ; 

   

     if($res2 == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        $count2 = mysqli_num_rows($res2) ;  
        ?>
        </br>
        </br>
        <p>No of active Category : <?php echo $count2 ?> </p>

        <?php


    }

    } 
    ?>
    </div>

    <div class= "col-4 text-center">
    <h1 style = "color : darkblue" >Food Information</h1>
    
     <?php 
    $sql3 = "SELECT *FROM tbl_food" ; 

    $res3 = mysqli_query($conn , $sql3) ; 

    $count3 = mysqli_num_rows($res3) ; 

     if($res3 == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        
        ?>
        </br>
        </br>
        <p>No of available Food: <?php echo $count3 ?> </p>

        <?php

         $sql4 = "SELECT *FROM tbl_food WHERE active ='Yes'" ; 

    $res4 = mysqli_query($conn , $sql4) ; 

   

     if($res4 == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        $count4 = mysqli_num_rows($res4) ;  
        ?>
        </br>
        </br>
        <p>No of active Food : <?php echo $count4 ?> </p>

        <?php


    }

    } 
    ?>
     
    </div>

    <div class= "col-4 text-center">
    <h1 style = "color : darkblue">Order Information</h1>
         <?php 
    $sql5 = "SELECT *FROM tbl_order " ; 

    $res5 = mysqli_query($conn , $sql5) ; 

    $count5 = mysqli_num_rows($res5) ; 

     if($res5 == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        
        ?>
        </br>
        </br>
        <p>No of orders Received: <?php echo $count5 ?> </p>

        <?php

         $sql6 = "SELECT *FROM tbl_order WHERE status ='Delivered'" ; 

    $res6 = mysqli_query($conn , $sql6) ; 

   

     if($res6 == false ){
        echo "query not executed" ; 
        die(); 
    }else{
        $count6 = mysqli_num_rows($res6) ;  
        ?>
        </br>
        </br>
        <p>No of orders Delivered : <?php echo $count6 ?> </p>

        <?php


    }

    } 
    ?>
     
    </div>

    <div class = "clearFix"> </div>
  </div>
 
 </div>

 <div class="wrapper">

 <?php
 
 $sql8 = "SELECT SUM(total) AS total_sum  FROM tbl_order WHERE status = 'Delivered' " ; 

 $res8  = mysqli_query($conn , $sql8) ; 

 if($res8  == false){
     echo "query not executed" ; 
     die(); 
 }else{
        $r = mysqli_fetch_assoc($res8);
$sum_total = $r['total_sum'];
  
     ?>
<h2>Total Revenue Generated :  <?php echo $sum_total ?> </h2>
     <?php

 }
 
 
 
 
 
 
 
  ?>

 

 </div>


 <?php  include ('partials/footer.php')?>
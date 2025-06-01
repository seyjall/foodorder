<?php include('partials/menu.php')  ?>


  <div class="main-content">

   <diV class = "wrapper" >
   <h1>Order Details:</h1>
   <br/>
   <table class = "tbl-full">
    <tr>
      <th>S.NO:</th>
       <th>Item name:</th>
         <th>Customer Name: </th>
         <th>Order Date: </th>
          <th>Quantity: </th> 
          <th>Total amount: </th> 
          <th>Delivery Status: </th>
         
</tr>
<?php 

$sql = "SELECT *FROM tbl_order "; 

 $res = mysqli_query($conn , $sql); 

 $count = mysqli_num_rows($res); 
 
 $sno = 1 ; 

 if($count > 0 ){

  while($row = mysqli_fetch_assoc($res)){
    $item_id = $row['id'] ; 

    $sql2 = "SELECT *FROM tbl_food WHERE id=$item_id" ; 
    
    $res2 = mysqli_query($conn , $sql2); 

    if($res2 == false ){
      header('location:'.SITEURL.'admin/manage-order.php'); 
      die(); 
    }

    $row2 = mysqli_fetch_assoc($res2); 

    $item_name = $row2['title'] ; 
    
    $c_id = $row['customer_id'] ; 

     $sql3 = "SELECT *FROM tbl_customer WHERE id=$c_id" ; 
    
    $res3 = mysqli_query($conn , $sql3); 

    if($res3 == false ){
      header('location:'.SITEURL.'admin/manage-order.php'); 
      die(); 
    }

    $row3 = mysqli_fetch_assoc($res3); 

    $customer_name = $row3['name']; 

    $o_date = $row['order_date']; 
    $status= $row['status']; 
    $qty = $row['qty']; 
    $total = $row['total'] ; 
  ?>
  <tr>
    <td><?php  echo $sno++ ?> </td>
    <td><?php  echo $item_name ?> </td>
    <td><?php  echo $customer_name ?> </td>
    <td><?php  echo $o_date ?> </td>
    <td><?php  echo $qty ?> </td>
    <td><?php  echo $total ?> </td>
    <td><?php  echo $status ?> </td>



  </tr>
  <?php






  } }
?>



</table>

  

    <div class = "clearFix"> </div>
  </div>
 
 </div>


 <?php  include ('partials/footer.php')?>
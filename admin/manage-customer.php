<?php include('partials/menu.php') ?>


<div class="main-content">
<div class="wrapper">
<h1>Customer Details :</h1>

<table class="tbl-full">
    <tr>

    <th>SR.NO</th>
    <th>Name:</th>
    <th>Email:</th>
    <th>Adress:</th>
    <th>Contact:</th>

    <?php 
 $sql = "SELECT *FROM tbl_customer"; 

 $res = mysqli_query($conn , $sql); 

 $count = mysqli_num_rows($res); 
 
 $sno = 1 ; 

 if($count > 0 ){

  while($row = mysqli_fetch_assoc($res)){
    $name = $row['name'] ; 
    $email = $row['email']; 
    $address = $row['address']; 
    $contact = $row['contact']; 

    ?>
    <tr>
        <td><?php echo $sno++ ?> </td>
        <td><?php echo  $name?> </td>
        <td><?php echo $email?> </td>
        <td><?php echo  $address?> </td>
        <td><?php echo $contact ?> </td>

  </tr>

    <?php

  }

 }else{
    $_SESSION['customer'] = "Customers not found" ; 
    header('location:'.SITEURL.'admin/index.php') ; 
 }

?>

</tr>

</table>


</div>


</div>








<?php include('partials/footer.php') ?>


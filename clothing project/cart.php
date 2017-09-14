<?php
  require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>My cart</title>
<?php
  include 'header.php';
  include 'navbar.php';
  require 'util/connect.php';
  ?>
  <script src="js/cart.js"></script>
</head>
<link rel="stylesheet" href="css/admin.css" media="screen" title="no title">
<body>

<?php
       $id=$_SESSION ['user'];
       $sql="select item_id from cart where person_id='$id'";
       $result = $con->query ( $sql ) or die ( $con->connect_error );
       $count = $result->num_rows;
         If ($count > 0) {
           while ($row = $result->fetch_array ()) {
             $sql="select price from item where id='$row[item_id]'";
             $result1 = $con->query ( $sql ) or die ( $con->connect_error );
             $row1 = $result1->fetch_array ();
       ?>

   <table border="2" width="350px" style="margin-left:20px;">
     <thead>
       <tr>
         <th class="profile">Item</th>
         <th class="profile">Price</th>
       </tr>
       </thead>
       <tbody>
       
         <tr>
              <td width="50px"><img src="uploads/<?php echo $row['item_id']?>.jpg" class="img-responsive" width="30px" height="30px"></td>
              <td width="120px"><?php echo $row1['price']; ?> <button style="margin-right:10%;" class="btn-rm" type="button" name="button" onclick="remove(<?php echo $row['item_id']?>)">Remove</button></td>
         </tr>
         <!-- <button type="button" name="button">Remove</button> -->
         <?php
 }
 }
  ?>
</tbody>
</table>
<?php
$sql = "SELECT price FROM item where id in (select item_id from cart where person_id='$id') ";
$result2 = $con->query ( $sql ) or die ( $con->connect_error );
$count = $result2->num_rows;
$sum=0;
while ($row2 = $result2->fetch_array ()) {
  $sum=$sum+$row2[price];
}

if($count==0){
  echo "<p style='margin-left:10px;margin-top:20px;font-size:150%;'>"."No items to display"."</p>";   
}
  else{
    echo "<p style='margin-left:10px;margin-top:20px;font-size:150%;'>"."Total amount:".$sum."</p>"; 
    ?>
    <button type="button" name="button" onclick="location.href='purchase.php'"> Proceed to Checkout</button>
    <?php
  } 
?> 


</body>
</html>

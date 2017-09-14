<?php
  require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <script src="js/display.js"></script>
<meta charset="utf-8">
<title>Clothing Closet  </title>
<?php
  include 'header.php';
  ?>
    <link rel="stylesheet" href="css/admin.css" media="screen" title="no title">
  <script src="js/cart.js"></script>
</head>
<body>
  	<!-- Navigation Bar -->
      <?php
      include 'navbar.php'; ?>

      <!-- Displaying Items -->
        <?php
        require 'util/connect.php';
         $sql="select item.id,item.cond,item.category,item.dateOfAcquiring,item.price,item.brand from item where item.id not in (select item_id from cart) and item.status=1 and item.sold=0";    
        if($_GET['action'] == 'male'){
          echo "string";
            $sql="select item.id,item.cond,item.category,item.dateOfAcquiring,item.price,item.brand from item where item.id not in (select item_id from cart) and item.status=1 and item.sold=0 and item.category=male";  
        }
        if($_GET['action'] == 'female'){
             $sql="select item.id,item.cond,item.category,item.dateOfAcquiring,item.price,item.brand from item where item.id not in (select item_id from cart) and item.status=1 and item.sold=0 and item.category=female"; 
        }
         
        $result = $con->query ( $sql ) or die ( $con->connect_error );
        $count = $result->num_rows;
          If ($count > 0) {

        ?>
<div class="sidenav">
  <input type="radio" name="male" onclick="male()"> Male</input><br>
  <input type="radio" name="female" onclick="female()"> Female</input>
</div>
        <div class="container" >
            <!-- Items -->

            <div class="row">
              <?php while ($row = $result->fetch_array ()) {
                 ?>
              <div class="col-xs-3 col-lg-2x productCard">
                            <div class="thumbnail">

                                    <img src="uploads/<?php echo $row['id']?>.jpg" class="img-responsive">
                                <div class="caption">
                                    <h4 class="ditch" style="margin-left:5px;"><?php echo "Brand:"." ".$row['brand']?><h4>
                                    <h4 class="ditch" style="margin-left:5px;"><?php echo "Price:"." "."$".$row['price']?></h4>
                                    <h4 class="ditch" style="margin-left:5px;"><?php echo "Category:"." ".$row['category']?></h4>
                                    <button type="button" class="btn-buy" name="buy" onclick="add(<?php echo $row['id']?>)">Add to cart</button>
                                  </div>
                                </div>
                            </div>
                            <?php
                          }
                          ?>
                <div class="clearfix visible-md visible-lg"></div>
            </div>
        <?php
        $p = "uploads/".$row['id'].".jpg";
        $i=$row['id'];
          }

          ?>

  </body>
</html>

 <?php
  session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }

if ( isset($_POST['btn-signup']) ) {
  require 'util/connect.php';
  //tables for saving user details
  $tbl_1="person";
  $tbl_2="login";
  $tbl_3="customer";

  //user details
  $name=$_POST['name'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $zip=$_POST['zip'];
  $phone=$_POST['phone'];

  // Insert into database
  $sql_1="INSERT INTO $tbl_1(name, email, address, city, state, zip, phone) VALUES ('$name', '$email', '$address', '$city', '$state', '$zip','$phone');";
  $con->query($sql_1) or die();

  $personid=$con->insert_id;

  $sql_2="INSERT INTO $tbl_2(email,password,personid) VALUES ('$email','$password','$personid');";
  $con->query($sql_2) or die();

    $sql_3="INSERT INTO $tbl_3(id) VALUES ('$personid');";
    $con->query($sql_3) or die();
  
  //verifying insertion and redirecting to login page
  if ($con) {
    header("Location: index.php");
  }
}
 ?>

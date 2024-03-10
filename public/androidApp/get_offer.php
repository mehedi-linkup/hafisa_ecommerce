<?php
require_once('db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$catId = P0011065;
mysqli_set_charset($conn,'utf8');
$sql = "SELECT * FROM `products` WHERE code = '$catId'";
    $run = mysqli_query($conn,$sql);
    while($data = mysqli_fetch_assoc($run)){
    	$item[] = $data ;
    	$json = json_encode(array('contents'=>$item));
    }
    echo $json ;

  
?>
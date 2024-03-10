<?php 
  //Importing the database connection 
   require_once('db.php');
   $catId = 12;
   $con = mysqli_connect($servername, $username, $password, $dbname);
   $page = $_GET['page']; 

 $start = 0; 
 $limit = 10; 

 $total = mysqli_num_rows(mysqli_query($con, "SELECT sub_category_id from `products` WHERE sub_category_id = '$catId'"));
//  print_r($total);
//  exit; 
 $page_limit = $total/$limit; 

 if($page<=$page_limit){
 $start = ($page - 1) * $limit; 
 
 $sql = "SELECT * from `products` WHERE sub_category_id = '$catId' limit $start, $limit";
 $result = mysqli_query($con,$sql); 
 $res = array(); 
     while($row = mysqli_fetch_array($result)){
     array_push($res, array(
     "sub_category_id"=>$row['sub_category_id'],
     "name"=>$row['name'],
     "code"=>$row['code'],
     "color_id"=>$row['color_id'],
     "description"=>$row['description'],
     "discount"=>$row['discount'],
     "category_id"=>$row['category_id'],
     "image"=>$row['image'],
     "price"=>$row['price'],
     "size_id"=>$row['size_id'],
     "slug"=>$row['slug'],
     "thum_image"=>$row['thum_image']

     
     
     )
     
     );
 }


 echo json_encode(array('contents'=>$res));
 }else
 {
    echo "over";
 }
<?php 
  //Importing the database connection 
   require_once('db.php');
   $con = mysqli_connect($servername, $username, $password, $dbname);
 //Getting the page number which is to be displayed  
 $page = $_GET['page']; 
 $catId = 41;
 //Initially we show the data from 1st row that means the 0th row 
 $start = 0; 
 
 //Limit is 3 that means we will show 3 items at once
 $limit = 10; 
 

 
 //Counting the total item available in the database 
 $total = mysqli_num_rows(mysqli_query($con, "SELECT id from `products` "));

 
 //We can go atmost to page number total/limit
 $page_limit = $total/$limit; 
//  print_r($page_limit);
//  exit; 
 //If the page number is more than the limit we cannot show anything 
 if($page<=$page_limit){
 
 //Calculating start for every given page number 
 $start = ($page - 1) * $limit; 
 
 //SQL query to fetch data of a range 
 $sql = "SELECT * from `products`  limit $start, $limit";
 
 //Getting result 
 $result = mysqli_query($con,$sql); 
 
 //Adding results to an array 
 $res = array(); 
     while($row = mysqli_fetch_array($result)){
     array_push($res, array(
    //  "name"=>$row['id'],
    //  "publisher"=>$row['id'],
    //  "image"=>$row['id']
     
         "id"=>$row['sub_category_id'],
        "code"=>$row['code'],
        "color_id"=>$row['color_id'],
        "description"=>$row['description'],
        "discount"=>$row['discount'],
        "category_id"=>$row['category_id'],
        "image"=>$row['image'],
        "name"=>$row['name'],
        "price"=>$row['price'],
       "size_id"=>$row['size_id'],
        "short_details"=>$row['short_details'],
        "slug"=>$row['slug'],
        "thum_image"=>$row['thum_image']
     
     )
     
     
     );
 }
 
 //Displaying the array in json format 
 echo json_encode(array('contents'=>$res));
 }else
 {
    echo "over";
 }
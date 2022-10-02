<?php 

            //   "https://rider1-2156191-1312445728.ap-shanghai.run.tcloudbase.com/uploads/img/product"
$SEREVR_URL = "https://rider1-2156191-1312445728.ap-shanghai.run.tcloudbase.com/";
// var_dump ($_POST["value"]);
// var_dump ($_FILES);
$JSON_FROM_READ= json_decode(file_get_contents(dirname(dirname(__FILE__))."../../uploads/json/product/product.json"));

// var_dump($JSON_FROM_READ);

$JASON_DATA = json_decode($_POST["value"]);

echo "   value name " . $JASON_DATA->name;
// echo "   all the json vlaue ".$JASON_DATA;
// Count total files
$countfiles = count($_FILES['image']['name']);

// Upload Location
$upload_location = "../../uploads/img/product/";

// To store uploaded files path
$files_arr = array();

echo $countfiles." files";
var_dump($_FILES['image']['name']);

// Loop all files
for($index = 0;$index < $countfiles;$index++){

   if(isset($_FILES['image']['name'][$index]) && $_FILES['image']['name'][$index] != ''){
      // File name
      $filename = $_FILES['image']['name'][$index];

      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      // Valid image extension
      $valid_ext = array("png","jpeg","jpg");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$filename;

         // Upload file
         if(move_uploaded_file($_FILES['image']['tmp_name'][$index],$path)){
            $files_arr[] = $path;
         }
      }
   }
}

echo json_encode($files_arr);

$src = $SEREVR_URL ."". str_replace("../","",$files_arr[0]);

$PRODUCT_PREVIOUS_ARRAY = $JSON_FROM_READ->data;

$size = count($PRODUCT_PREVIOUS_ARRAY) +1;
$product_id = "xxx".$size;

$json_inside =array (
   "product_id" => $product_id,
   "src"       => $src,
   "title"     => $JASON_DATA->name,
   "desc"      => $JASON_DATA->desc,
   "price"     => $JASON_DATA->price,
   "hot"       => true,

   "brand_name"=> $JASON_DATA->brand,
   "brand_id"  => $JASON_DATA->type
);



array_push($PRODUCT_PREVIOUS_ARRAY, $json_inside);

$PRODUCT_JSON = array(
   "data" => 
   
      $PRODUCT_PREVIOUS_ARRAY
   
);



echo "  .  product json      .  ";
var_dump($PRODUCT_JSON) ;

$myfile = fopen("../../uploads/json/product/product.json", "w");
fwrite($myfile,"{". json_encode($PRODUCT_JSON,JSON_PRETTY_PRINT)."}");
fclose($myfile); 

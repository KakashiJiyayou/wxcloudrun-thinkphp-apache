<?php 
var_dump ($_POST["value"]);
var_dump ($_FILES);


$JASON_DATA = json_decode($_POST["value"]);

echo "  value name " . $JASON_DATA->name;
// Count total files
$countfiles = count($_FILES['image']['name']);

// Upload Location
$upload_location = "../../uploads/tests/";

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

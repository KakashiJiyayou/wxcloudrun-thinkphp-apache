<?php 


$brand_name     =   ""; // brand name
$filename       =   ""; // brand image file name

// Upload Location
$upload_location = "../../uploads/img/logo/brand/";

// $upload_location = "raw_upload/"; // Upload Location
/**
 * get brand name, if its empty exit
 */
if( isset($_POST["brand_name"])  && $_POST["brand_name"] !="")
{
    $brand_name =    $_POST["brand_name"];
}
else {  echo json(["code"=>"erorr"]); }


/**
 * save image file if it exists and save data in db
 */
if( isset($_FILES['brand_logo']['name']) && 
    $_FILES['brand_logo']['name'] != '')
{
    
    $filename   = $_FILES['brand_logo']['name'];         // File name

    $ext        = strtolower(   pathinfo(   $filename, PATHINFO_EXTENSION   ) );// Get extension

    $valid_ext  = array("png","jpeg","jpg"); // Valid image extension

    // Check extension
    if(in_array($ext, $valid_ext))
    {

       $path = $upload_location.$filename;// File path
       // Upload file
       if(move_uploaded_file($_FILES['brand_logo']['tmp_name'],$path)){
          $files_arr[] = $path;
       }
    }

    // create array data
    $data = array(
        "brand_name"=>  $brand_name,
        "img_src"=>     str_replace("../","",$path)
    );

    printf( json_encode($data));
}





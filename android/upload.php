<?php  
$target_dir = "../upload/tugas/";  
$target_file_name = $target_dir .basename($_FILES["file_tugas"]["name"]);  
$response = array();  
  
// Check if image file is an actual image or fake image  
if (isset($_FILES["file_tugas"]))   
{  
   if (move_uploaded_file($_FILES["file_tugas"]["tmp_name"], $target_file_name))   
   {  
     $success = true;  
     $message = "Successfully Uploaded";  
   }  
   else   
   {  
      $success = false;  
      $message = "Error while uploading";  
   }  
}  
else   
{  
      $success = false;  
      $message = "Required Field Missing";  
}  
$response["success"] = $success;  
$response["message"] = $message;  
echo json_encode($response);  
  
?>  
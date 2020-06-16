<?php

require_once 'connect.php';

$target_dir = "../upload/tugas/";
$namafile = $_POST["file_tugas"].'/'.uniqid().'.png';
$image_base64 = base64_decode($namafile);
$target_file_name = $target_dir .base64_decode($_POST["file_tugas"]);  
$response = array();  

// Check if image file is an actual image or fake image  
if (isset($_POST["file_tugas"]))   
{  
   if ($target_file_name)  
   {  
        // $kueri = "SELECT * FROM tb_tugas WHERE id_tugas";
        // $result = mysqli_query($conn,$query);
        // $data = mysqli_fetch_array($result);
        // $id_tugas = $_POST['id_tugas'];
        function acak($panjang){
                $karakter= '123456';
                $string = '';
                    for ($i = 0; $i < $panjang; $i++) {
                $pos = rand(0, strlen($karakter)-1);
                $string .= $karakter{$pos};
                }
            return $string;
        }
        $id_tugas = acak(1);
        $sql= "INSERT INTO tb_filetugas VALUES(NULL, '$id_tugas','$namafile')";
        $query = mysqli_query($conn,$sql);

        if($query){
            $response['success'] = "1";
            $response['message'] = "success";
            echo json_encode($response); 
        }
        else{
            $success = "0";
            $message = "Error while uploading";
        }
   }  
   else   
   {  
      $success = "0";
      $message = "Error while uploading 2";  
   }  
}  
else   
{  
      $success = "0";
      $message = "Required Field Missing";  
}  
 
  
// require_once 'connect.php';

// $upload_path = '../upload/tugas/';
// $server_ip = gethostbyname(gethostname());
// $upload_url = 'http://'.$server_ip.'/'.$upload_path;
// $response = array();

// if($_SERVER['REQUEST_METHOD']=='POST'){

//     if(isset($_POST['nama']) and isset($_FILES['image']['name'])){

//         $nama = $_POST['nama'];
//         $fileinfo = pathinfo($_FILES['image']['name']);
//         $extension = $fileinfo['extension'];
//         $file_url = $upload_url.'IMG_'.$nama.'.'.$extension;
//         $file_path = $upload_path.'IMG_'.$nama.'.'.$extension; 

//             move_uploaded_file($_FILES['image']['tmp_name'],$file_path);
//             $sql = "INSERT INTO tb_filetugas VALUES ('1', '$nama', '$file_url');";

//             if(mysqli_query($conn,$sql)){
//                 $response['error'] = "0";
//                 $response['nama'] = $nama;
//             }
            
//             else{
//                 $response['error'] = "1";
//                 $response['message'] = $e->getMessage();

//             }
//         echo json_encode($response);
//         mysqli_close($conn);
//     }

// }
?>  
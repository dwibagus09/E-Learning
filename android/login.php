<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];
        
        require_once 'connect.php';
    
        $sql = "SELECT * FROM tb_login Join tb_siswa on tb_login.id = tb_siswa.id JOIN tb_kelas on tb_siswa.id_kelas = tb_kelas.id_kelas WHERE username='$username' AND password='$password'";
    
        $response = mysqli_query($conn, $sql);
    
        $result = array();
        $result['login'] = array();
        
        if ( mysqli_num_rows($response) === 1 ) {
            
            $row = mysqli_fetch_array($response);
    
            if ( $row['password']) {
                
                $index['username'] = $row['username'];
                $index['password'] = $row['password'];
                $index['akses'] = $row['akses'];
                $index['id'] = $row['id'];
                $index['nis'] = $row['nis'];
                $index['nama_siswa'] = $row['nama_siswa'];
                $index['kelas'] = $row['kelas'];
                $index['nama_kelas'] = $row['nama_kelas'];
                $index['nama_materi'] = $row['nama_materi'];
                $index['file_materi'] = $row['file_materi'];
    
                array_push($result['login'], $index);
                $result['success'] = "1";
                $result['message'] = "success";
                echo json_encode($result);
    
                mysqli_close($conn);
    
            } else {
    
                $result['success'] = "0";
                $result['message'] = "error";
                echo json_encode($result);
    
                mysqli_close($conn);
    
            }
    
        }
        
    
    }
?>
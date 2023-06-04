<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Mthods:PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Mthods,Authorization,X-Requested-With');
// file_get_contents("php://input") can read any formate of data 
$data = json_decode(file_get_contents("php://input"), true);
$uname = $data['sname'];
$uemail = $data['semail'];
$student_id=$data['sid'];

include 'congig.php';
if ($uname == '' || $uemail == '') {
    echo json_encode(array('message' => 'Please provide information', 'status' => false));
} else {
 $update_sql=mysqli_query($conn,"UPDATE `students` SET `name`='$uname ',`email`='$uemail'WHERE `id`={$student_id}");
 if($update_sql){
    echo json_encode(array('message' => 'Updated Successfully', 'status' => true));
 }else{
    echo json_encode(array('message' => 'Can not Update', 'status' => false));
 }
}
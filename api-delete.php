<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Mthods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Mthods,Authorization,X-Requested-With');
// file_get_contents("php://input") can read any formate of data 
$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

include 'congig.php';
$sql="SELECT * FROM `students` WHERE id={$student_id}";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)<=0){
    echo json_encode(array('message'=>'No record found','status'=>false));
}
else{
    $delete_sql="DELETE FROM `students` WHERE id={$student_id}";
    if(mysqli_query($conn,$delete_sql)){
        echo json_encode(array('message'=>'Data Deleted Successfully','status'=>true));
    }else{
        echo json_encode(array('message'=>'Can not delete','status'=>false));
    }
}

<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
// file_get_contents("php://input") can read any formate of data 
$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

include 'congig.php';
$sql="SELECT * FROM `students` WHERE id={$student_id}";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $stu_array=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($stu_array);
}else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}
?>
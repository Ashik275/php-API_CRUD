<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

include 'congig.php';
$sql="SELECT * FROM `students`";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $stu_array=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($stu_array);
}else{
    echo json_encode(array('message'=>'No record found','status'=>false));
}
?>
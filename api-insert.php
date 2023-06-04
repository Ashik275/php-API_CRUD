<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Mthods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Mthods,Authorization,X-Requested-With');
// file_get_contents("php://input") can read any formate of data 
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['sname'];
$email = $data['semail'];
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
include 'congig.php';
if ($name == '' || $email == '') {
    echo json_encode(array('message' => 'Please provide information', 'status' => false));
} else {
    if (!preg_match ("/^[a-zA-z]*$/", $name)|| !preg_match($pattern, $email)) {
        echo json_encode(array('message' => 'Email or Name is not valid.', 'status' => false));
    } else {
        $exists_sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `students` WHERE name='{$name}' AND email='{$email}'"));
        if ($exists_sql > 0) {
            echo json_encode(array('message' => 'Record Already Exists', 'status' => false));
        } else {
            $sql = "INSERT INTO `students`( `name`, `email`) VALUES ('{$name}','{$email}')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo json_encode(array('message' => 'Record Inserted Successfully', 'status' => true));
            } else {
                echo json_encode(array('message' => 'Record Inserted Fail', 'status' => false));
            }
        }
    }
}

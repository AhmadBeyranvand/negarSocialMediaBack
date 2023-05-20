<?php

$username= $_GET['username'];
$pass = $_GET['password'];

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
$con = new mysqli("localhost", "root", "", "instagram");

$data = [];

$queryString = "SELECT * FROM users WHERE username='".$username."' AND password='".$pass."'; "; 

$query = $con->query($queryString);

if($query->num_rows == 1) {
    $res = $query->fetch_assoc();
    $data['exist'] = true;
    $data['username'] = $res['username'];
    $data['phone'] = $res['phone'];
    $data['email'] = $res['email'];
    $data['fullName'] = $res['fullName'];
} else if($query->num_rows == 0) {
    $data['exist'] = false;
    $data['message'] = "چنین کاربری وجود ندارد" ;
} else {
    $data['exist'] = false;
    $data['message'] = "بروز خطای ناشناخته";
}

echo json_encode($data);
?>
<?php
$id = $_GET['id'];

header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");

$data = 0;

$con = new mysqli("localhost", "root", "", "instagram");

$query = $con->query("SELECT COUNT(*) FROM likes WHERE post_id=" . $id);

if($query->num_rows > 0){
    $res = $query->fetch_array();
    $data = $res[0];
}
echo $data;

// echo json_encode($data);
?>
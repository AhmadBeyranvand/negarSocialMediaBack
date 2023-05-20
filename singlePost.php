<?php
$id = $_GET['id'];
$queryString = "SELECT posts.id, posts.caption, posts.media, users.fullName 
                FROM posts 
                INNER JOIN users 
                ON posts.user_id=users.id 
                WHERE posts.id=".$id;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$con = new mysqli("localhost", "root", "", "instagram");
$query = $con->query($queryString);

$data = [];
if($query->num_rows>0){
    $res = $query->fetch_assoc();
    $data["id"] = $res["id"];
    $data["caption"] = $res["caption"];
    $data["media"] = $res["media"];
    $data["fullName"] = $res["fullName"];
}
echo json_encode($data);
?>
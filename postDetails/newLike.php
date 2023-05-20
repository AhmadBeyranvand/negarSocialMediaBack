<?php
$postID = $_GET['post_id'];

header("Access-Control-Allow-Origin: *");

$con = new mysqli("localhost", "root", "", "instagram");
$query = $con->query("INSERT INTO `likes`( `user_id`, `post_id`) VALUES (2,$postID) ");

if($query){
    echo true;
} else {
    echo false;
}

?>
<?php

// حل مشکل CORS
header("Access-Control-Allow-Origin: *");

// مرحله اول: ساخت تابع header
// برای معرفی کردن خروجی
header( "Content-Type: application/json" );

// مرحله دوم: تهیه داده‌ها
$i = 0;
$data = [];
$con = new mysqli("localhost", "root", "", "instagram");
// $query = $con->query("SELECT * FROM posts");
$query = $con->query("SELECT posts.id, posts.caption, posts.media, users.fullName FROM posts INNER JOIN users ON users.id = posts.user_id;");
if($query->num_rows>0){
    while( $res = $query->fetch_assoc() ){
        $data[$i]['id'] = $res['id']; 
        $data[$i]['media'] = $res['media']; 
        $data[$i]['caption'] = $res['caption'];
        $data[$i]['fullName'] = $res['fullName'];
        $i++;
    }
}

// مرحله سوم: نمایش خروجی
echo json_encode( $data );


?>
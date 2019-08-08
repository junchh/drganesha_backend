<?php 

require_once 'config.php';

if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];

    $stmt = $con->prepare('SELECT * FROM `users` WHERE `username` = ? AND `password` = ?');
    $stmt->execute([$username, $password]);
    if($stmt->rowCount()==1){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($data);
    } else {
        echo 'nodata';
    }

} else {
    echo 'errset';
}
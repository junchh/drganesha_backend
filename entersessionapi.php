<?php 


require_once 'config.php';

if(isset($_GET['pin']) && isset($_GET['session_id']) && isset($_GET['rating'])){
    $pin = $_GET['pin'];
    $sessid = $_GET['session_id'];
    $rating = $_GET['rating'];

    $stmt = $con->prepare('SELECT * FROM `private_sessions` WHERE `id` = ?');
    $stmt->execute([$sessid]);
    if($stmt->rowCount()==1){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['pin']==$pin){

            $stmt2 = $con->prepare('UPDATE `private_sessions` SET `status`=1 WHERE `id`=?');
            $stmt2->execute([$sessid]);

            $stmt3 = $con->prepare('SELECT `rating` FROM `users` WHERE `id`=?');
            $stmt3->execute([$data['tutor']]);

            $dt = $stmt3->fetch(PDO::FETCH_ASSOC);
            $m = ($dt['rating']+$rating)/2.0;

            $stmt4 = $con->prepare('UPDATE `users` SET `rating`=? WHERE `id`=?');
            $stmt4->execute([$m, $data['tutor']]);
            echo 'success';
        } else {
            echo 'wrongpin';
        }
    } else {
        echo 'nodata';
    }

} else {
    echo 'errset';
}
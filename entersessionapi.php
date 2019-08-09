<?php 


require_once 'config.php';

if(isset($_GET['pin']) && isset($_GET['session_id'])){
    $pin = $_GET['pin'];
    $sessid = $_GET['session_id'];

    $stmt = $con->prepare('SELECT * FROM `private_sessions` WHERE `id` = ?');
    $stmt->execute([$sessid]);
    if($stmt->rowCount()==1){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['pin']==$pin){

            $stmt2 = $con->prepare('UPDATE `private_sessions` SET `status`=1 WHERE `id`=?');
            $stmt2->execute([$sessid]);
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
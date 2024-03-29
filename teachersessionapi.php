<?php 

require_once 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $st = 1;
    $stmt = $con->prepare('SELECT * FROM `private_sessions` WHERE `tutor` = ? AND `status` = ?');
    $stmt->execute([$id, $st]);
    if($stmt->rowCount()==0){
        echo 'nodata';
    } else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $student_id = $row['student'];
        $st = $con->prepare('SELECT * FROM `users` WHERE `id` = ?');
        $st->execute([$student_id]);

        $data = $st->fetch(PDO::FETCH_ASSOC);
        $student_name = $data['name'];
        $arr['id'] = $row['id'];
        $arr['student_name'] = $student_name;
        echo json_encode($arr);
    }
} else {
    echo 'errset';
}
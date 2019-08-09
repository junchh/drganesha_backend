<?php 

require_once 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $st = 0;
    $stmt = $con->prepare('SELECT * FROM `private_sessions` WHERE `student` = ? AND `status` = ?');
    $stmt->execute([$id, $st]);
    if($stmt->rowCount()==0){
        echo 'nodata';
    } else {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tutor_id = $row['tutor'];
            $st = $con->prepare('SELECT * FROM `users` WHERE `id` = ?');
            $st->execute([$tutor_id]);

            $data = $st->fetch(PDO::FETCH_ASSOC);
            $tutor_name = $data['name'];
            $arr['id'] = $row['id'];
            $arr['tutor_name'] = $tutor_name;
            $arr['title'] = $row['title'];
            $arr['time'] = $row['time'];
            $dd[] = $arr;
        }
        echo json_encode($dd);
    }
} else {
    echo 'errset';
}
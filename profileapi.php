<?php 

require_once 'config.php';
    $st = 0;
    $stmt = $con->prepare('SELECT * FROM `users` WHERE `status` = ?');
    $stmt->execute([$st]);
    if($stmt->rowCount()==0){
        echo 'nodata';
    } else {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr['name'] = $row['name'];
            $arr['rating'] = $row['rating'];
            $arr['description'] = $row['description'];
            $dd[] = $arr;
        }
        echo json_encode($dd);
    }
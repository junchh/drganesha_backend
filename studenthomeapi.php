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
            $arr[] = $row;
        }
        echo json_encode($arr);
    }
} else {
    echo 'errset';
}
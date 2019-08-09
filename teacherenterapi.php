<?php 

require_once 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $con->prepare('UPDATE `private_sessions` SET `status`=2 WHERE `id`=?');
    $stmt->execute([$id]);
    echo 'success';
} else {
    echo 'errset';
}
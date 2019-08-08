<?php 

require_once 'config.php';

if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];

    
} else {
    echo 'errset';
}
<?php 
/**
 * information
 */

$host = 'localhost';
$dbname = 'drganesha';
$user = 'root';
$pass = '123123';
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $con = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass, $options);
} catch (PDOException $e){
    echo 'errcon';
}
<?php 

if(isset($_GET['id'])){
    $data[1]['username'] = 'Junho';
    $data[1]['password'] = '234';
    $data[2]['username'] = 'Willi';
    $data[2]['password'] = '235';
    $data[3]['username'] = 'abbel';
    $data[3]['password'] = '236';

    echo json_encode($data[$_GET['id']]);
} else {
    exit('no parameter');
}
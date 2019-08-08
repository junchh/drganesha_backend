<?php 

if(isset($_GET['username']) && isset($_GET['password'])){
    $data[1]['username'] = 'Junho';
    $data[1]['password'] = '234';
    $data[1]['place'] = 'bandung';
    $data[2]['username'] = 'Willi';
    $data[2]['password'] = '235';
    $data[2]['place'] = 'jakarta';
    $data[3]['username'] = 'abbel';
    $data[3]['password'] = '236';
    $data[3]['place'] = 'semarang';

    $usr = $_GET['username'];
    $pwd = $_GET['password'];
    $found = false;
    foreach($data as $datas){
        if($datas['username']==$usr && $datas['password']==$pwd){
            $found=true;
            $dd=$datas;
        }
    }
    if($found){
         echo json_encode($dd);
    } else {
        echo 'nouser';
    }
} else {
    exit('error');
}
<?php
$host = "localhost";
$user = "root";
$pw = "root";
    $dataBaseConnect = "phpSQL";
    
    $dabaseConnect = new mysqli($host, $user, $pw,$dataBaseConnect); // mysql 접속하기
    $dabaseConnect->set_charset("utf8");

if(mysqli_connect_errno()){
    echo "DB접속 실패";
    echo mysqli_connect_error();
}else{
    echo "접속성공";
}

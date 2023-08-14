<?php
// 설문조사 관련 임의 데이터 100개
    require_once __DIR__ . '/../common/session.php';
    require_once __DIR__ ."/../connectDB.php";
    require_once  __DIR__ .'/../common/checkSignSession.php';

    
    $kindList = array();
    $kindList = ['offlineStore','onlineStore','website','friends','academy','noMemory','etc'];
    
//    echo $kindList[0]; // 'offlineStore'

$memberID = 3;
for($i=0;$i<=100;$i++){
    $memberID++;
    $kind = $kindList[rand(0,6)];
    $time = time();
    
    
    $sql = "INSERT INTO SURVEY (MEMBER_ID,KIND,REG_TIME) VALUES ('$memberID','$kind','$time')";
    $res = $dabaseConnect->query($sql);
    
   
}
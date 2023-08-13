<?php
require_once __DIR__ . "/../connectDB.php";

$sql = "CREATE TABLE SURVEY(
    SURVEY_ID INT(10) unsigned not null auto_increment,
    MEMBER_ID INT(10) unsigned default null,
    KIND ENUM('offlineStore','onlineStore','website','friends','academy','noMemory','etc'),
    REG_TIME INT(10) unsigned default null,
    PRIMARY KEY (SURVEY_ID)
)CHARSET=utf8";

$res = $dabaseConnect->query($sql);

if($res){
    echo '테이블 생성 완료';
}else{
    echo '테이블 생성 실패';
}
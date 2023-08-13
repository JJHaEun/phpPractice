<?php
require_once __DIR__ ."/connectDB.php";


$sql="CREATE TABLE MEMBER(
    MEMBER_ID INT(10) unsigned not null auto_increment,
    EMAIL VARCHAR(40) UNIQUE not null,
    NICK_NAME VARCHAR(10) not null,
    PW VARCHAR(50) DEFAULT null,
    BIRTH_DAY VARCHAR(10) not null,
    REG_TIME INT(11) not null,
    PRIMARY KEY (MEMBER_ID)
) CHARSET=utf8";

$res = $dabaseConnect->query($sql);

if($res){
    echo '테이블 셍성완료';
}else{
    echo '테이블 생성 싷패';
}
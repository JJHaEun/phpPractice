<?php
    require_once __DIR__ . "/../connectDB.php";
require_once __DIR__ . "/../common/session.php";

?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
</head>
<body>
<h1>설문조사 프로그램</h1>
<h2>어떤 경로로 알게되셨나요?</h2>
<form name="survey" method="POST" action="./surveySave.php">
    <input type="radio" value="offlineStore" name="surveyKind"/>오프라인 서점<br>
    <input type="radio" value="onlineStore" name="surveyKind"/>온라인 서점<br>
    <input type="radio" value="website" name="surveyKind"/>웹사이트 서점<br>
    <input type="radio" value="friends" name="surveyKind"/>지인을 통해서<br>
    <input type="radio" value="academy" name="surveyKind"/>교육기관<br>
    <input type="radio" value="noMemory" name="surveyKind"/>기억이 안남<br>
    <input type="radio" value="etc" name="surveyKind"/>기타<br>
    <button>제출</button>
</form>
</body>
</html>

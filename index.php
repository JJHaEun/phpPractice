<?php
require_once __DIR__ . '/common/session.php';
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
<?php
    if(!isset($_SESSION['memberID'])){ // isset일 경우 값이 null이면 false 리턴.
        // 이 경우 if조건이 true일때 회원가입이나 로그인 부분이 보이는것이니, !가 붙기 전에는 false였다는 의미
        // 따라서 $_SESSON['memberID'] 이게 null일때 적용됨.
?>
<a href="signUp/signUpForm.php">회원가입</a>
<a href="signIn/signInForm.php">로그인</a>
<?php
    }else{
?>
<a href="board/list.php">게시판</a>
<a href="survey/surveyForm.php">설문조사 프로그램</a>
<br/>
<a href="gChart/surveyResultBarChart.php">두표결과 바차트로 보기</a>
<br/>
<a href="gChart/surveyResultPieChart.php">투표결과 파이차트로 보기</a>
<br>
<a href="webEditor/editorForm.php">간단한 코딩 에디터</a>
<br>
<a href="parsing/selectForm.php">실시간 검색어 1위 키워드 보기</a>
<br>
<a href="signIn/signOut.php">로그아웃</a>
<?php
    }
?>
</body>
</html>

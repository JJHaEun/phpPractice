<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>로그인</h1>
<form name="signIn" method="post" action="./signInProcessing.php">
    이메일
    <input type="email" name="userEmail" required/>
    패스워드
    <input type="password" name="userPW" required/>
    <button>로그인</button>
</form>
</body>
</html>
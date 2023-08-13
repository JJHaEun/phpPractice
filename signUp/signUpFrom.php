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
<h1>회원가입</h1>
<form name="signUp" method="post" action="../signUpSave.php">
    아이디<br>
    <input type="text" name="user_id" required/>
    <br>
    <br>
    이메일<br>
    <input type="email" name="userEmail" required/>
    <br>
    <br>
    닉네임<br>
    <input type="text" name="userNickName" required/>
    <br>
    <br>
    비밀번호<br>
    <input type="password" name="userPW" required/>
    전화번호<br>
    <input type="text" name="userPhone" required/>
    <br>
    <br>
    생일<br>
    <select name="birthYear" required>
    <?php
$thisYear = date('Y',time());

for($i=$thisYear;$i>=1930;$i--) {
    echo "<option value='$i'>$i</option>";
}?>
    </select>년
    <select name="birthMonth" required>
        <?php
            $thisMonth =12;

            for($i = 1; $i<=$thisMonth;$i++){
                echo "<option value='$i'>$i</option>";// 큰따옴표로 묶고 변수에는 작은 따옴표 사용.
            }
        ?>
    </select>월
    <select name="birthDay" required>
        <?php
            $thisDates = 31;

            for($i=1;$i<=$thisDates;$i++){
                echo "<option value='$i'>$i</option>";
            }
        ?>
    </select>일
    <br>
    <br>
    <button>가입하기</button>
</form>
</body>
</html>









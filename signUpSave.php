<?php
    require_once __DIR__ . '/common/session.php';
    require_once __DIR__ ."/connectDB.php";
    
    $userEmail = $_POST['userEmail'];
    $user_id = $_POST['user_id'];
    $userNickName = $_POST['userNickName'];
    $userPW = $_POST['userPW'];
    
    $birthYear = (int)$_POST['birthYear'];
    $birthMonth = (int)$_POST['birthMonth'];
    $birthDay = (int)$_POST['birthDay'];
    
    
    function moveSignUpPage($alert){
        echo $alert."<br>";
        echo "<a href='/signUp/signUpForm.php'>회원가입 폼으로 이동</a>";
    }
    
    //유효성 검사
// 이메일 검사
    // filter_var('검사할 값', FILTER_VALIDATE_EMAIL);
if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
    // 이메일 유효성 검사에 통과하지 않는다면
    moveSignUpPage('올바른 이메일이 아닙니다');
    exit; // 해당 함수가 포함된 페이지 자체를 끝냄.
}

// 한글로 구성되어있는지 정규식검사

$nickPattern = '/^[ㄱ-ㅎ가-힣a-zA-Z0-9]+$/';
if(!preg_match($nickPattern,$userNickName,$matches)){
    moveSignUpPage('닉네임은 한글만 사용해주세요');
    exit;
}

//아이디검사
    
    if($user_id ===null || $user_id ===''){
        moveSignUpPage('아이디를 입럭해주세요');
        exit;
    }
//비밀번호 검사
if($userPW ==null ||$userPW==''){
    moveSignUpPage('비밀번호를 입력해주세요');
    exit;
}

$userPW = sha1($userPW); // 비밀번호 암호화

// 이메일 중복검사
$isEmailCheck = false;

// 맴버 테이블에서 특정 이메일 가져오기
$sql = "SELECT EMAIL FROM MEMBER WHERE EMAIL ='$userEmail'";
$res = $dabaseConnect->query($sql);

if($res){
    $count = $res->num_rows;// 해당하는 행 개수를 count에 담기
    if($count===0){
        $isEmailCheck = true;
    }else{
        echo '이미 존재하는 이메일입니다';
        moveSignUpPage();
        exit;
    }
}else{
    echo '에러발생: 관리자 문의 요망';
    exit;
}




// 닉네임 중복검사
$isNickName = false;

$sql = "SELECT NICK_NAME FROM member WHERE NICK_NAME = '$userNickName'";
$res = $dabaseConnect->query($sql);


if($res){
    $count = $res->num_rows;
    if($count===0){
        $isNickName = true;
    }else{
        moveSignUpPage('이미 존재하는 닉네임 입니다');
        exit;
    }
}else{
    echo '에러발생: 관리자 문의 요망';
    exit;
}

// 생일 검사
    if($birthYear===0){
        moveSignUpPage('생년을 정확하게 입력해주세요');
        exit;
    }
    
    if($birthMonth===0){
        moveSignUpPage('생년을 정확하게 입력해주세요');
        exit;
    }
    
    if($birthDay===0){
        moveSignUpPage('생년을 정확하게 입력해주세요');
        exit;
    }
    
    $birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;

if($isEmailCheck ===true&&$isNickName===true){
    $regTime = time();
    // 테이블에 데이터 넣기
    $sql = "INSERT INTO MEMBER(EMAIL,NICK_NAME,PW,BIRTH_DAY,REG_TIME) VALUES ('$userEmail','$userNickName','$userPW','$birth','$regTime')";
    
    $res = $dabaseConnect->query($sql);
    
    if($res){
        $_SESSION['memberID'] = $dabaseConnect->insert_id; // 자동 id를 생성
        $_SESSION['nickName'] = $userNickName;
        Header('Location:../index.php');
    }else{
        echo '회원가입 실패 - 관리자에게 문의';
        exit;
    }
}else{
    moveSignUpPage('이메일 혹은 닉네임이 중복입니다');
    exit;
}


<?php
    require_once __DIR__ . '/../common/session.php';
    require_once __DIR__ ."/../connectDB.php";
    
    // SQL Injection 방어를 위해 사용자 입력 값 바인딩
    $userEmail = $dabaseConnect->real_escape_string($_POST['userEmail']);
    $userPW = $dabaseConnect->real_escape_string($_POST['userPW']);
    
    
    function moveSignInPage($alert){
        echo $alert."<br>";
        echo "<a href='./signInForm.php'>로그인 폼으로 이동</a>";
        return;
    };
    
    //  유효성 검사
// 이메일 검사

if(!filter_Var($userEmail,FILTER_VALIDATE_EMAIL)){
    moveSignInPage('올바른 이메일이 아닙니다');
    exit;
}

// 비밀번호 검사
if($userPW===null||$userPW===''){
    moveSignInPage('비밀번호를 입력해주세요');
    exit;
}

$userPW = sha1($userPW);// 비밀번호 암호화
    
   $sql = "SELECT EMAIL,NICK_NAME,MEMBER_ID FROM MEMBER WHERE EMAIL ='$userEmail' AND PW ='$userPW'";
   echo $sql;
   $res = $dabaseConnect->query($sql);
    if ($res) {
        // 로그인 성공
        echo $res->num_rows;// 불러온 데이터수
               if($res->num_rows ===0){
            moveSignInPage('로그인 정보가 일치하지 않습니다');
            exit;
        }else{
            $memberInfo = $res->fetch_array();
            $_SESSION['memberID'] = $memberInfo['MEMBER_ID'];
            $_SESSION['nickName'] = $memberInfo['NICK_NAME'];
            Header('Location:../index.php');
        }
    }else {
        // 로그인 실패
        $response = array("status" => "error", "message" => "Login failed");
    }
    
    

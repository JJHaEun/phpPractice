<?php
    require_once __DIR__ . "/../connectDB.php";
    require_once __DIR__ . "/../common/session.php";
    require_once  __DIR__ .'/../common/checkSignSession.php';
    
    
    $surveyKind = $_POST['surveyKind'];
    
    
    // 값 유효성 검사
    switch ($surveyKind){
        case 'offlineStore':
        case 'onlineStore':
        case 'website':
        case 'friends':
        case 'academy':
        case 'noMemory':
        case 'etc':
            break;
        default:
            echo '잘못된 값이 입력됨';
            break;
    }
    
    $memberID = $_SESSION['memberID'];
   // 이미 설문조사를 했는지 확인
   
$sql = "SELECT SURVEY_ID FROM SURVEY WHERE MEMBER_ID = '$memberID'";
$res = $dabaseConnect->query($sql);


if($res){
    $dataCount = $res->num_rows;
    if($dataCount===0){
        //설문조사 가능
        $regTime = time();
        $sql = "INSERT INTO SURVEY (MEMBER_ID,KIND,REG_TIME) VALUES ('$memberID','$surveyKind','$regTime')";
        $res = $dabaseConnect->query($sql);
        if($res){
            echo '조사참여완료<br>';
            echo "<a href='./surveyView.php'>설문조사 결과로 이동</a>";
            exit;
        }else{
            //설문조사 불가
            echo '이미 참여완료';
            echo "<a href='./surveyView.php'>설문조사 결과로 이동</a>";
            exit;
        }
    }else{
        echo '저장실패-관리자에 문의';
        exit;
    }
}
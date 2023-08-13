<?php
    require_once __DIR__ . "/../connectDB.php";
    require_once __DIR__ . "/../common/session.php";
    
    $sql = "SELECT KIND FROM SURVEY";
    $res = $dabaseConnect->query($sql);
    
    if($res){
        $surveyDataCount = $res->num_rows;
        
        $offlineStore = 0;
        $onlineStore = 0;
        $website = 0;
        $friends = 0;
        $academy = 0;
        $noMemory =0;
        $etc = 0;
        
        if($surveyDataCount >0){
            for($i=0;$i<$surveyDataCount;$i++){
                $surveyData = $res->fetch_assoc();
                
                switch ($surveyData['KIND']){
                    case 'offlineStore':
                        $offlineStore++;
                        break;
                    case 'onlineStore':
                        $onlineStore++;
                        break;
                    case 'website':
                        $website++;
                        break;
                    case 'friends':
                        $friends++;
                        break;
                    case 'academy':
                        $academy++;
                        break;
                    case 'noMemory':
                        $noMemory++;
                        break;
                    case 'etc':
                        $etc++;
                        break;
                }
            }
        }else{
            echo '데이터가 업습니다';
            exit;
        }
    }else{
        echo '에러발생-관리자 문의';
        exit;
    }
    ?>
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
<h1>설문조사 프로그램 -결과</h1>
총 참여인원:<?=$surveyDataCount?>
오프라인 - <?=$offlineStore?> 명
온라인 - <?=$onlineStore?> 명
웹사이트 - <?=$website?> 명
지인소개 - <?=$friends?> 명
교육기간 - <?=$academy?> 명
기억안남 - <?=$noMemory?> 명
기타 - <?=$etc?> 명
</body>
</html>

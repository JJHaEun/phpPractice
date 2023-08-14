<?php
// 테이블에 저장된 데이터 꺼내와서 json형식으로 변경
    
    require_once __DIR__ . '/../common/session.php';
    require_once __DIR__ ."/../connectDB.php";
    require_once  __DIR__ .'/../common/checkSignSession.php';

// 데이터베이스 연결
    if (!$dabaseConnect) {
        die("Database connection failed: " . mysqli_connect_error());
    }

// KIND 별 개수를 가져오는 쿼리
    $sql = 'SELECT KIND, COUNT(*) as COUNT FROM SURVEY GROUP BY KIND';
    $result = mysqli_query($dabaseConnect, $sql);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($dabaseConnect));
    }
    
    $kindCounts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $kindCounts[$row['KIND']] = $row['COUNT']; // KIND 값을 키로, COUNT 값을 값으로 배열에 저장
    }

// JSON으로 변환하여 출력
    $jsonData = json_encode($kindCounts);
    if ($jsonData === false) {
        die("JSON encoding failed");
    }
    
    echo $jsonData;
    
    mysqli_close($dabaseConnect);
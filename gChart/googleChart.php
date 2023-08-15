<?php
    require_once __DIR__ . '/../common/session.php';
    require_once __DIR__ ."/../connectDB.php";
    require_once  __DIR__ .'/../common/checkSignSession.php';
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            const xhr = new XMLHttpRequest();
            const method = "POST";
            const url = './surveyResultJson.php'
            xhr.open(method,url);
            xhr.responseType='text';
           

            xhr.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    let result = JSON.parse(xhr.responseText);
                    console.log('result is '+ JSON.stringify(result));


                    const data = new google.visualization.arrayToDataTable([
                        ['종류','수'],
                        ['오프라인 서점',result.offlineStore],
                        ['온라인 서점',result.onlineStore],
                        ['웹사이트',result.website],
                        ['지인을 통해서',result.friends],
                        ['교육기관',result.academy],
                        ['기억이 안남',result.moMemory],
                        ['기타',result.etc]
                    ]);
                    
                    const options ={
                        title:"당신은 어떤 경로로 본서를 알게되셨나요?",
                        is3D: true,
                        colors:['red','#004411','blue','purple','orange','pink','skyblue']
                    }
                    // Instantiate and draw our chart, passing in some options.
                    const chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);

                    const line_chartOptions = {
                        title: 'Company Performance',
                        curveType: 'function',
                        legend: { position: 'bottom' }
                    };

                    const lineChart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    lineChart.draw(data, line_chartOptions);
                }
               
               
            }
            // Create the data table.
            xhr.send();
        }
    </script>
</head>
<body>
<div id="piechart" style="height: 500px"></div>

<div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>
</html>



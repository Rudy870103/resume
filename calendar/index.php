<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>線上月曆</title>
</head>

<body>
    <div class="container">
        <div class="blank-space"></div>
        <div class="right">
            <div class="top">
                <button id="prevBackground">←</button>
                <div class="calendartop"></div>
                <button id="nextBackground">→</button>
            </div>

            <div class="calendar">
                <?php

                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = date('m');
                    $year = date("Y");
                }

                if (isset($_GET['today'])) {
                    $month = date('m');
                    $year = date("Y");
                }

                $nextYear = $year;
                $prevYear = $year;
                if (($month + 1) > 12) {
                    $next = 1;
                    $nextYear = $year + 1;
                } else {
                    $next = $month + 1;
                }

                if (($month - 1) < 1) {
                    $prev = 12;
                    $prevYear = $year - 1;
                } else {
                    $prev = $month - 1;
                }

                ?>


                <div class="month">
                    <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>" class="premonthbutton"></a>
                    <div>
                        <?php
                        echo "<h3>";
                        echo date("{$year}/{$month}");
                        echo "</h3>";
                        ?>
                    </div>
                    <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>" class="nextmonthbutton"></a>
                </div>
                <form method="get">
                    <input type="submit" name="today" value="Today" id="today">
                </form>
                <?php
                $thisFirstDay = date("{$year}-{$month}-1");
                $thisFirstDate = date('w', strtotime($thisFirstDay));
                $thisMonthDays = date("t");
                $thisLastDay = date("{$year}-{$month}-$thisMonthDays");
                $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7);
                $firstCell = date("Y-m-d", strtotime("-$thisFirstDate days", strtotime($thisFirstDay)));
                ?>

                <table style='margin:auto'>
                    <tr>
                        <td>SUN</td>
                        <td>MON</td>
                        <td>TUS</td>
                        <td>WED</td>
                        <td>THU</td>
                        <td>FRI</td>
                        <td>SAT</td>
                    </tr>
                    <?php
                    for ($i = 0; $i < $weeks; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < 7; $j++) {
                            $addDays = 7 * $i + $j;
                            $thisCellDate = strtotime("+$addDays days", strtotime($firstCell));
                            $today = date('Y-m-d', strtotime('now'));

                            if ($thisCellDate == strtotime("$today")) {
                                echo "<td style='background:lightgreen'>";
                            } else if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) {
                                echo "<td style='background:rgb(166,100,227)'>";
                            } else {
                                echo "<td>";
                            }


                            if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                                echo date("j", $thisCellDate);
                            }

                            if (date("m", $thisCellDate) == 1 && date("d", $thisCellDate) == 1) {
                                echo "<br>";
                                echo "<p style='color:red; font-size: 10px; font-weight:bold'>元旦</p>";
                            } else if (date("m", $thisCellDate) == 2 && date("d", $thisCellDate) == 28) {
                                echo "<br>";
                                echo "<p style='color:red; font-size: 10px; font-weight:bold'>和平紀念日</p>";
                            } else if (date("m", $thisCellDate) == 4 && date("d", $thisCellDate) == 5) {
                                echo "<br>";
                                echo "<p style='color:red; font-size: 10px; font-weight:bold'>清明節</p>";
                            } else if (date("m", $thisCellDate) == 10 && date("d", $thisCellDate) == 10) {
                                echo "<br>";
                                echo "<p style='color:red; font-size: 10px; font-weight:bold'>國慶日</p>";
                            }

                            echo "</td>";
                        }
                        echo "</tr>";
                    }


                    echo "</table>";
                    ?>
                    <div class="search">
                        <form method="get">
                            <label for="searchYear">年份：</label>
                            <input type="number" id="searchYear" name="year">
                            <label for="searchMonth">月份：</label>
                            <input type="number" id="searchMonth" name="month" min="1" max="12">
                            <input type="submit" value="GO!" class="go">
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <p class="footer">©Rudy_Chen 2023/11(pictures by @nihei92729)</p>


    <script>
        // 定義不同的背景圖片URL
        var backgrounds = [
            'bg1.jpg',
            'bg2.jpg',
            'bg3.jpg',
            'bg4.jpg',
            'bg5.jpg',
            'bg6.jpg',
            'bg7.jpg',
            'bg8.jpg',
            'bg9.jpg',
        ];

        var currentBackground = 0; // 目前的背景索引

        // 獲取箭頭按鈕元素
        var prevBackgroundButton = document.getElementById('prevBackground');
        var nextBackgroundButton = document.getElementById('nextBackground');

        // 設置初始背景
        document.body.style.backgroundImage = 'url(' + backgrounds[currentBackground] + ')';

        // 添加箭頭按鈕點擊事件處理程序
        prevBackgroundButton.addEventListener('click', function() {
            currentBackground = (currentBackground - 1 + backgrounds.length) % backgrounds.length;
            document.body.style.backgroundImage = 'url(' + backgrounds[currentBackground] + ')';
        });

        nextBackgroundButton.addEventListener('click', function() {
            currentBackground = (currentBackground + 1) % backgrounds.length;
            document.body.style.backgroundImage = 'url(' + backgrounds[currentBackground] + ')';
        });
    </script>


</body>

</html>
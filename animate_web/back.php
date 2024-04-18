<?php include_once "./api/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-1.9.1min.js"></script>
    <script src="./js/js.js"></script>
    <link rel="stylesheet" href="./css/style.css">
        <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&family=Noto+Serif+TC:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <!-- google font -->
    <title>AniMate</title>
</head>

<body>
<style>
    #myBtn {
        display: none;
        position: fixed;
        bottom: 40%;
        right: 5%;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: rgb(105, 105, 105, 0.8);
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
    }

    #myBtn:hover {
        background-color: #555;
    }
</style>
    <!-- go to top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- go to top button end -->
    <div class="container-fluid" style="font-family: 'Noto Serif TC', serif;">
        <!-- header -->
        <header style="font-family: 'Noto Serif TC', serif;">
            <div class="header-motto" style="border-bottom: 2px solid black; padding-bottom: 8px;font-size: 16px;">
                <span><?php $motto = $Motto->find(['sh' => 1]);
                        echo $motto['text']; ?></span>
            </div>
            <div class="header-main" style="height:20vh;display: flex;justify-content: space-between; border-top: 1px solid black;border-bottom: 1px solid black;  margin-top: 8px;padding: 20px 0;overflow:hidden">
                <div class="d-flex justify-content-center">
                    <div>
                        <a href="./index.php"><img src="./icon/logo.png" alt="AniMate" height="100%"></a>
                    </div>
                    <div>
                        <a href="./index.php" style="text-decoration: none;color:#1f1f1f">
                            <h1 style="font-size:90px;font-weight:700;margin-left:10px;padding-top:10px">AniMate</h1>
                        </a>
                    </div>
                </div>


                <div class="header-info d-flex" style="border-left:1px solid #1f1f1f;padding-left:20px;">
                    <div class="header-info-issue">
                        <a href="?do=animate" class="text-decoration-none text-start" style="color:#1f1f1f;">快來看看這個網站最大賣點 >></a>
                    </div>

                    <div class="header-info-date d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column align-items-end" style="margin-right:15px">
                            <span style="font-size: 20px;font-family:serif;font-weight:700;padding-top:15px;"><?= date('Y', strtotime('today')); ?></span>
                            <span style="font-size: 50px;font-family:serif;font-weight:700;"><?= date('M', strtotime('today')); ?></span>
                        </div>
                        <span style="font-size: 135px;font-family:serif;font-weight:700;"><?= date('d', strtotime('today')); ?></span>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid black;padding: 1px 0;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: 'Noto Serif TC', serif;font-weight:700">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="?do=admin">會員管理</a>
                            </li>
                            <li class=" nav-item">
                                <a class="nav-link" href="?do=motto">座右銘管理</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="?do=news">文章管理</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="?do=news">日常撮影管理</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?do=vote">主題票選管理</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?do=message">留言板</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="login">
                    <?php
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <a href="?do=login" class="d-flex justify-content-end text-decoration-none" style="width:250px"><img src="./icon/login.png" alt="login" width="20px" height="100%">
                            <span>&nbsp Login</span></a>
                    <?php
                    } else {
                    ?>
                        <div class="d-flex justify-content-end" style="width:250px; font-family: 'Noto Serif TC', serif;font-weight:700">
                            歡迎,<?= $_SESSION['user']; ?>&nbsp
                            <button class="login-btn" onclick="location.href='./api/logout.php'" style="margin-left: 10px;border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">登出</button>
                            <?php
                            if ($_SESSION['user'] == 'admin') {
                            ?>
                                <button class="login-btn" onclick="location.href='back.php'" style="margin-left: 10px;border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">管理</button>
                            <?php
                            }
                            ?>
                        </div>

                    <?php
                    }
                    ?>
                </div>

        </header>
        <!-- header end -->


        <!-- main -->
        <div>
            <?php
            $do = $_GET['do'] ?? 'main';
            $file = "./back/{$do}.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./back/main.php";
            }

            ?>
        </div>
        <!-- main end -->



        <!-- footer -->
        <footer style="height: 100px;background-color: black;margin-top:150px">
            <div class="footer-info text-center" style="font-size: 12px;color: #f8f8f8;padding-top: 60px;">
                <span>103 台北市築夢區彩虹路一段 | 0917893235 | favoriteinfinite@gmail.com.tw | © Animate All rights reserved.</span>
            </div>
        </footer>
        <!-- footer end -->
    </div>


    <script></script>
</body>

</html>
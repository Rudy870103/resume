<main style="padding-top: 60px;width:80%;margin:auto">
    <!-- carousel -->
    <section style="padding-bottom:60px;margin-bottom:60px;border-bottom:1px solid #1f1f1f">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/DSC_6044.JPG" class="d-block w-100" alt="...">
                </div>
                <?php
                $total = $News->count(" where `sh`=1");
                $div = 4;
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                $news = $News->all(" where `sh`=1 order by rank desc limit $start,$div");
                foreach ($news as $new) {
                ?>
                    <div class="carousel-item">
                        <img src="./img/<?= $new['img']; ?>" class="d-block w-100" alt="...">
                    </div>
                <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- carousel end -->
    <section style="padding-bottom:60px;margin-bottom:60px;border-bottom:1px solid #1f1f1f">
        <h1 style="text-align: center;font-weight:700;margin-bottom:30px;font-family: 'Noto Serif TC', serif;">有趣的動畫作品</h1>
        <div style="margin:auto">
            <?php include "./animate_works/whale.php"; ?>
        </div>
    </section>
    <section style="padding-bottom:60px;margin-bottom:60px;border-bottom:1px solid #1f1f1f">
        <h1 style="text-align: center;font-weight:700;margin-bottom:30px;font-family: 'Noto Serif TC', serif;">動人的日常撮影</h1>
        <div class="news-list d-flex flex-wrap" style="column-gap:5%">
            <?php
            $news = $News->all(" where `sh`=1 order by rank desc limit 3");
            foreach ($news as $new) {
            ?>
                <article style="width: 30%;margin-bottom:20px">
                    <a onclick="location.href='?do=news_content&id=<?= $new['id']; ?>'" style="cursor: pointer;">
                        <div style="width:100%;height:35vh;overflow:hidden"><img src="./img/<?= $new['img']; ?>" alt="" width="100%" style="box-shadow: 1px 0 2px #1f1f1f;"></div>
                    </a>
                    <a onclick="location.href='?do=news_content&id=<?= $new['id']; ?>'" style="cursor: pointer;">
                        <div>
                            <h3 class="mt-3" style="font-weight: 700;padding-bottom:10px;border-bottom:1px solid #1f1f1f"><?= $new['title']; ?></h3>
                        </div>
                    </a>
                    <a onclick="location.href='?do=news_content&id=<?= $new['id']; ?>'" style="cursor: pointer;">
                        <div>
                            <p class="mt-3"><?= $new['news']; ?></p>
                        </div>
                    </a>
                </article>
            <?php
            }
            ?>
        </div>
    </section>
    <section style="padding-bottom:60px;margin-bottom:60px;border-bottom:1px solid #1f1f1f">
        <h1 style="text-align: center;font-weight:700;margin-bottom:30px;">令人期待的主題票選</h1>
        <table style="width:80%;margin: auto;border:1px solid #1f1f1f;text-align:center;font-size:20px">
            <tr style="height: 50px;">
                <th width="10%">編號</th>
                <th width="60%">問卷題目</th>
                <th width="10%">投票總數</th>
                <th width="10%">結果</th>
                <th width="10%">狀態</th>
            </tr>
            <?php
            $vote = $Vote->all(['title_id' => 0]);
            foreach ($vote as  $key => $vot) {
            ?>
                <style>
                    .voteBtn {
                        text-decoration: none;
                        color: #1f1f1f;
                    }

                    .voteBtn:hover {
                        text-decoration: underline;
                    }
                </style>
                <tr style="height: 50px;border:1px solid #1f1f1f">
                    <td><?= $key + 1; ?></td>
                    <td><?= $vot['text']; ?></td>
                    <td><?= $vot['vote']; ?></td>
                    <td>
                        <a class='voteBtn' href='?do=result&id=<?= $vot['id']; ?>'>查看結果</a>
                    </td>
                    <td>
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo "<a class='voteBtn' href='?do=voting&id={$vot['id']}'>參與投票</a>";
                        } else {
                            echo "<a class='voteBtn' href='?do=login'>請先登入</a>";
                        }

                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>


</main>
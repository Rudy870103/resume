<header style="padding: 80px 0;">
    <h1 style="text-align: center;font-weight:700">主題票選<span style="display: block;font-size:16px;margin-top:10px">Voting</span></h1>
</header>
<?php
$vote = $Vote->find($_GET['id']);
?>

<div style="width:50%;margin: auto;border:1px solid #1f1f1f;text-align:center;font-size:20px">
    <h3 class="my-5"><?= $vote['text']; ?></h3>

    <form action="./api/voting.php" method="post">
        <div class='d-flex justify-content-around'>
            <?php
            $vote = $Vote->all(['title_id' => $_GET['id']]);
            foreach ($vote as $vot) {
                if (!empty($vot['text'])) {
                    echo "<div>";
                    echo "<input type='radio' name='opt' value='{$vot['id']}'>";
                    echo $vot['text'];
                    echo "</div>";
                }
            }
            ?>
        </div>

        <div class='mt-5 d-flex justify-content-around'>
            <?php
            $imgs = $Vote->all(['text' => '', 'title_id' => $_GET['id']]);
            foreach ($imgs as $img) {
                echo "<img src='./img/{$img['voteImg']}' style='width:300px;height:100%'>";
            }
            ?>
        </div>
        <div class="my-5">
            <input class="login-btn" type="submit" value="我要投票">
        </div>
    </form>
</div>
<header style="padding: 80px 0;">
    <h1 style="text-align: center;font-weight:700">主題票選<span style="display: block;font-size:16px;margin-top:10px">Voting</span></h1>
</header>

<?php
$vote = $Vote->find($_GET['id']);
?>


<div class="py-5" style="width:50%;margin: auto;border:1px solid #1f1f1f;text-align:center;font-size:20px">
    <h3><?= $vote['text']; ?></h3>
    <?php
    $opts = $Vote->all(['title_id' => $_GET['id']]);
    foreach ($opts as $opt) {
        if (!empty($opt['text'])) {
            $total = ($vote['vote'] != 0) ? $vote['vote'] : 1;
            $rate = round($opt['vote'] / $total, 2);

            echo "<div style='width:95%;display:flex;align-items:center;margin:10px 0'>";
            echo    "<div style='width:50%'>{$opt['text']}</div>";
            echo    "<div style='width:" . (40 * $rate) . "%;height:20px;background-color:#ccc'></div>";
            echo    "<div style='width:10%'>{$opt['vote']}票(" . ($rate * 100) . "%)</div>";
            echo "</div>";
        }
    }
    ?>
    <div class="text-center mt-5">
        <button class="login-btn" onclick="location.href='?do=vote'">返回</button>
    </div>
</div>
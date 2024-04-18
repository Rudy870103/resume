<h1 class="text-center mt-5" style="font-weight: 700;">主題票選管理</h1>

<!-- 列出所有表單 -->
<form action="./api/edit_vote.php" method="post">
    <table class="mt-5 text-center" style="width:50%;margin:auto;border:1px solid #1f1f1f;">
        <tr style="border: 1px solid #1f1f1f;height:40px">
            <td>編號</td>
            <td style="width: 70%;">問卷題目</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $vote = $Vote->all(['title_id' => 0]);
        foreach ($vote as  $key => $vot) {
        ?>
            <tr style="height:40px">
                <td style="border: 1px solid #1f1f1f;"><?= $key + 1; ?></td>
                <td style="border: 1px solid #1f1f1f;"><?= $vot['text']; ?></td>
                <td style="border: 1px solid #1f1f1f;"><input type="checkbox" name="sh[]" value="<?= $vot['id']; ?>" <?= ($vot['sh'] == 1) ? 'checked' : ''; ?>></td>
                <td style="border: 1px solid #1f1f1f;">
                    <input type="checkbox" name="del[]" value="<?= $vot['id']; ?>">
                    <input type="hidden" name="id[]" value="<?= $vot['id']; ?>">
                </td>
            </tr>
        <?php
        }
        ?>
        <tr class="text-center mt-5">
            <td colspan="4">
                <br>
                <input class="login-btn" type="submit" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" value="更改">
                <input class="login-btn" type="reset" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" value="重置">
                <br><br>
            </td>
        </tr>
    </table>
</form>



<!-- 列出所有表單end -->


<div class="mt-5 mx-auto" style="border: 1px solid #1f1f1f;width:50%;">
    <h2 class="text-center mt-5">新增問題</h2>
    <form action="./api/add_vote.php" method="post" enctype="multipart/form-data" style="width:50%;margin: auto;padding: 50px 0;">
        <table style="margin: auto;padding: 80px 0;">
            <tr style="border-bottom: 1px solid #1f1f1f;height:50px">
                <td>問卷標題 : &nbsp</td>
                <td><input type="text" name="voteTitle" style="width: 100%;"></td>
            </tr>
            <tr id="opt" style="height:50px">
                <td>新增選項 : &nbsp</td>
                <td><input type="text" name="option[]" style="width: 100%;"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="voteImg[]"></td>
            </tr>
            <tr style="height:50px">
                <td></td>
                <td><input class="moreBtn" type="button" value="+" onclick="more()"></td>
            </tr>
        </table>
        <style>
            .moreBtn {
                width: 100%;
                border: 1px solid #1f1f1f;
                border-radius: 5px
            }

            .moreBtn:hover {
                background-color: #1f1f1f;
                color: #f8f8f8
            }
        </style>
        <div class="mt-5 text-center">
            <input class="login-btn" type="submit" value="送出"> | <input class="login-btn" type="reset" value="清空">
        </div>
    </form>
</div>


<script>
    function more() {
        let opt = `<tr id="opt" style="height:50px">
                <td>新增選項 : &nbsp</td>
                <td><input type="text" name="option[]" style="width: 100%;"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="voteImg[]"></td>
            </tr>`
        $("#opt").before(opt);
    }
</script>
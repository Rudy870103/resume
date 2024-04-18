<h1 class="text-center mt-5" style="font-weight: 700;">帳號管理</h1>
<form action="./api/edit_user.php" method="post">
    <table class="mt-5 text-center" style="width:50%;margin:auto;border:1px solid #1f1f1f;">
        <tr style="border: 1px solid #1f1f1f;height:40px">
            <td style="width: 33%;">帳號</td>
            <td style="width: 33%;">密碼</td>
            <td style="width: 33%;">刪除</td>
        </tr>
        <?php
        $rows = $User->all();
        foreach ($rows as $row) {
            if ($row['acc'] != 'admin') {
        ?>
                <tr style="height:40px">
                    <td style="border: 1px solid #1f1f1f;"><?= $row['acc']; ?></td>
                    <td style="border: 1px solid #1f1f1f;"><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>
                    <td style="border: 1px solid #1f1f1f;">
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        <tr class="text-center mt-5">
            <td></td>
            <td>
                <br>
                <input class="login-btn" type="submit" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" value="確定刪除">
                <input class="login-btn" type="reset" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" value="清空選取">
                <br><br>
            </td>
            <td></td>
        </tr>
    </table>


</form>

<div class="mt-5 mx-auto" style="border: 1px solid #1f1f1f;width:50%;height:300px">
    <h2 class="text-center mt-5">新增會員</h2>
    <table style="margin: auto;padding: 80px 0;">
        <tr>
            <td style="text-align:end;width:65%"><input type="text" name="acc" id="acc" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
            <td class="clo">帳號</td>
        </tr>
        <tr>
            <td style="text-align:end;width:65%"><input type="password" name="pw" id="pw" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
            <td class="clo">密碼</td>
        </tr>
        <tr>
            <td style="text-align:end;width:65%"><input type="password" name="pw2" id="pw2" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
            <td class="clo">確認密碼</td>
        </tr>
        <tr>
            <td style="text-align:end;width:65%"><input type="text" name="email" id="email" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
            <td class="clo">信箱(忘記密碼時使用)</td>
        </tr>
        <tr>
            <td class="text-end">
                <br>
                <input class="login-btn" type="button" value="註冊" onclick="reg()" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">
                <input class="login-btn" type="reset" value="清除" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">
            </td>
            <td></td>
        </tr>
    </table>
</div>


<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if (user.pw == user.pw2) {
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    //console.log(res)
                    if (parseInt(res) == 1) {
                        alert("帳號重覆")
                    } else {
                        $.post('./api/reg.php', user, (res) => {
                            location.reload()
                        })
                    }
                })
            } else {
                alert("密碼錯誤")
            }
        } else {
            alert("不可空白")
        }
    }
</script>
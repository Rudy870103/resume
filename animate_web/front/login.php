<header style="padding: 80px 0;">
<h1 style="text-align: center;font-weight:700">會員登入<span style="display: block;font-size:16px;margin-top:10px">Login</span></h1>
</header>
<div>
    <table style="margin: auto;">
        <tr>
            <td class="text-end" style="width: 15%;">帳號 : &nbsp</td>
            <td><input type="text" name="acc" id="acc" style="background-color:#f8f8f8 !important;border:1px solid #1f1f1f"></td>
        </tr>
        <tr>
            <td class="text-end" style="width: 15%;">密碼 : &nbsp</td>
            <td><input type="password" name="pw" id="pw" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <br>
                <input class="login-btn" type="button" value="登入" onclick="login()">
                <input class="login-btn" type="reset" value="清除" onclick="clean()">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <br>
                <a href="?do=forget" class="forget">忘記密碼</a> | <a href="?do=reg" class="forget">尚未註冊</a>
            </td>
        </tr>
    </table>
</div>


<script>
    function login() {
        let acc = $("#acc").val()
        let pw = $("#pw").val()
        $.post('./api/chk_acc.php', {
            acc
        }, (res) => {
            if (parseInt(res) == 0) {
                alert("查無帳號")
            } else {
                $.post('./api/chk_pw.php', {
                    acc,
                    pw
                }, (res) => {
                    if (parseInt(res) == 1) {
                        if ($("#acc").val() == 'admin') {
                            location.href = 'index.php'
                            alert('管理者登入成功');
                        } else {
                            location.href = 'index.php';
                            alert('登入成功');

                        }
                    } else {
                        alert("密碼錯誤")
                    }
                })
            }
        })
    }
</script>
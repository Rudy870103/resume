<header style="padding: 80px 0;">
<h1 style="text-align: center;font-weight:700">會員註冊<span style="display: block;font-size:16px;margin-top:10px">Join us</span></h1>
</header>
<div>
<table style="width:50%;margin: auto;padding: 80px 0;">
        <tr>
            <td style="text-align:end;width:65%;"><input style="background-color:#f8f8f8;border:1px solid #1f1f1f;padding:2px" type="text" name="acc" id="acc"></td>
            <td class="clo">帳號</td>
        </tr>
        <tr>
            <td style="text-align:end;width:65%;"><input style="background-color:#f8f8f8;border:1px solid #1f1f1f;padding:2px" type="password" name="pw" id="pw"></td>
            <td class="clo">密碼</td>
        </tr>
        <tr>
            <td style="text-align:end;width:65%;"><input style="background-color:#f8f8f8;border:1px solid #1f1f1f;padding:2px" type="password" name="pw2" id="pw2"></td>
            <td class="clo">確認密碼</td>
        </tr>
        <tr>
            <td style="text-align:end;width:65%;"><input style="background-color:#f8f8f8;border:1px solid #1f1f1f;padding:2px" type="text" name="email" id="email"></td>
            <td class="clo">信箱(忘記密碼時使用)</td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <br>
                <input class="login-btn" type="button" value="註冊" onclick="reg()" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">
                <input class="login-btn" type="reset" value="清除" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">
            </td>
        </tr>
    </table>
</div>


<script>
    function reg() {
        // 取得使用者輸入的帳號、密碼、確認密碼和電子郵件
        let user = {
            acc: $("#acc").val(), 
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }

        // 檢查使用者輸入是否完整
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {

            if (user.pw == user.pw2) {
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    if (parseInt(res) == 1) {
                        alert("帳號重覆")
                    } else {
                        $.post('./api/reg.php', user, (res) => {
                            alert('註冊完成，請重新登入')
                            location.href='?do=login'
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
<h1>忘記密碼<span style="display: block;font-size:16px;margin-top:10px">Forget</span></h1>
<div class="p-5 col-4 box mx-auto text-center">
    請輸入註冊信箱
    <input type="text" name="email" id="email"><br><br>

    <div class="result" style="color:red"></div><br><br>
    <div>
        <button class="login-btn" onclick="forget()">確定</button>
        <button class="login-btn" onclick="clean()">重置</button>
    </div>
</div>

<script>
    function forget(){
        $.post("./api/forget.php",{email:$("#email").val()},(res)=>{
            $(".result").text(res);
        })
    }
</script>
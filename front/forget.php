<header style="padding: 80px 0;">
<h1 style="text-align: center;font-weight:700">忘記密碼<span style="display: block;font-size:16px;margin-top:10px">Forget</span></h1>
</header>
<table class="mb-1" style="margin: auto;padding: 80px 0;">
    <h5 class="text-center mb-5">請出入帳號及信箱以查詢密碼</h5>
    <tr>
        <td>帳號 :</td>
        <td><input type="text" name="acc" id="acc" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
    </tr>
    <tr>
        <td>信箱 :</td>
        <td><input type="text" name="email" id="email" style="background-color:#f8f8f8;border:1px solid #1f1f1f"></td>
    </tr>
</table>
<div class="text-center text-success" id="result"></div>
<div class="text-center mt-5"><input class="login-btn" style="margin-left: 10px;border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" type="button" value="尋找" onclick="forget()"></div>


<script>
function forget(){
    $.get("./api/forget.php",{acc:$("#acc").val(),email:$("#email").val()},(res)=>{
        $("#result").text(res)
    })
}
</script>
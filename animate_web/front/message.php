<header style="padding: 80px 0;">
<h1 style="text-align: center;font-weight:700">留言區<span style="display: block;font-size:16px;margin-top:10px">Message</span></h1>
</header>

<main style="width: 30%;margin:auto">
    <form action="./api/save_message.php" method="post" style="text-align:start;margin: auto;">
        <div class="text-center mb-5">
            <span style="font-size:20px">暱稱 </span>
            <input type="text" name="nickname" id="" style="text-align:center;width:100%;height:50px;background-color:#f8f8f8 !important;border:1px solid #1f1f1f">
        </div>
        <div class="text-center">
            <span style="font-size:20px">留言</span>
            <textarea name="text" id="" style="padding:20px;width:100%;height:300px;background-color:#f8f8f8 !important;border:1px solid #1f1f1f"></textarea>
        </div>
        <div class="text-center mt-4">
            <button type="reset" class="login-btn mx-2">清除</button>
            <button type="submit" class="login-btn mx-2" onclick="message()">送出</button>
        </div>
    </form>
</main>

<script>
    function message(){
        alert('留言已送出!')
    }
</script>
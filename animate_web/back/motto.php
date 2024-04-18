<h1 class="text-center mt-5" style="font-weight: 700;">座右銘管理</h1>
<form action="./api/edit_motto.php" method="post">
    <table class="mt-5 text-center" style="width:50%;margin:auto;border:1px solid #1f1f1f;">
        <tr style="border: 1px solid #1f1f1f;height:40px">
            <td style="width: 80%;">座右銘</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows = $Motto->all();
        foreach ($rows as $row) {   
        ?>
                <tr style="height:40px">
                    <td style="border: 1px solid #1f1f1f;"><?= $row['text']; ?></td>
                    <td style="border: 1px solid #1f1f1f;"><input type="radio" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                    <td style="border: 1px solid #1f1f1f;">
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </td>
                </tr>
        <?php
        }
        ?>
        <tr class="text-center mt-5">
            <td colspan="3">
                <br>
                <input class="login-btn" type="submit" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" value="更改">
                <input class="login-btn" type="reset" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f" value="重置">
                <br><br>
            </td>
        </tr>
    </table>


</form>

<div class="mt-5 mx-auto" style="border: 1px solid #1f1f1f;width:50%;height:300px">
    <h2 class="text-center mt-5 mb-3">新增座右銘</h2>
    <table style="margin: auto;padding: 80px 0;">
        <tr>
            <td class="text-center"><input type="text" name="text" id="text" style="background-color:#f8f8f8;border:1px solid #1f1f1f;width:300px;height:30px"></td>
        </tr>
        <tr>
            <td class="text-center">
                <br>
                <input class="login-btn" type="button" value="新增" onclick="reg()" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">
                <input class="login-btn" type="reset" value="清除" style="border-radius:10%;background-color:#f8f8f8;border:1px solid #1f1f1f">
            </td>
            <td></td>
        </tr>
    </table>
</div>


<script>
    function reg() {
        let motto = {
            text: $("#text").val()
        }
        if(motto.text != ''){
            $.post("./api/add_motto.php",motto,(res)=>{
                location.reload();
            })
        }else{
            alert("沒有內容");
        }
    }
</script>
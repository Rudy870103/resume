<h1 class="text-center mt-5" style="font-weight: 700;">留言板</h1>




<table class="mt-5 text-center" style="width:50%;margin:auto;border:1px solid #1f1f1f;">
    <tr style="border-bottom:1px solid #1f1f1f;">
        <td style="width: 20%;border-right:1px solid #1f1f1f">時間</td>
        <td style="width: 30%;border-right:1px solid #1f1f1f">暱稱</td>
        <td>留言</td>
    </tr>
    <?php
    $message=$Message->all(" order by id desc");
    foreach($message as $mes){
    ?>
    <tr style="border-bottom:1px solid #1f1f1f;height:50px">
        <td style="border-right:1px solid #1f1f1f"><?=$mes['date'];?></td></td>
        <td style="border-right:1px solid #1f1f1f"><?=$mes['nickname'];?></td>
        <td><?=$mes['text'];?></td>
    </tr>
    <?php
    }
    ?>
</table>


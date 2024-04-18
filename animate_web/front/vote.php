<header style="padding: 80px 0;">
    <h1 style="text-align: center;font-weight:700">主題票選<span style="display: block;font-size:16px;margin-top:10px">Voting</span></h1>
</header>



<table style="width:50%;margin: auto;border:1px solid #1f1f1f;text-align:center;font-size:20px">
    <tr style="height: 50px;">
        <th width="10%">編號</th>
        <th width="60%">問卷題目</th>
        <th width="10%">投票總數</th>
        <th width="10%">結果</th>
        <th width="10%">狀態</th>
    </tr>
    <?php
    $vote=$Vote->all(['title_id'=>0,'sh'=>1]);
    foreach($vote as  $key => $vot){
    ?>
    <style>
        .voteBtn{
            text-decoration: none;
            color:#1f1f1f;
        }
        .voteBtn:hover{
            text-decoration: underline;
        }
    </style>
    <tr style="height: 50px;border:1px solid #1f1f1f">
        <td><?=$key+1;?></td>
        <td><?=$vot['text'];?></td>
        <td><?=$vot['vote'];?></td>
        <td>
            <a class='voteBtn' href='?do=result&id=<?=$vot['id'];?>'>查看結果</a>
        </td>
        <td>
        <?php
        if(isset($_SESSION['user'])){
            echo "<a class='voteBtn' href='?do=voting&id={$vot['id']}'>參與投票</a>";
        }else{
            echo "<a class='voteBtn' href='?do=login'>請先登入</a>";
        }

        ?>
        </td>
    </tr>
    <?php
        }
    ?>    
</table>


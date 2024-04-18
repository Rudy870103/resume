<header style="padding: 80px 0;">
<h1 style="text-align: center;font-weight:700; ">日常撮影<span style="display: block;font-size:16px;margin-top:10px;">Photography</span></h1>
</header>

<main style="width: 80%;margin:auto">
    <div class="news-list d-flex flex-wrap" style="column-gap:5%">
    <?php
        $total=$News->count(" where `sh`=1");
        $div=9;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $news=$News->all(" where `sh`=1 order by rank desc limit $start,$div");
        foreach($news as $new){
    ?>
        <article style="width: 30%;margin-bottom:20px">
        <a onclick="location.href='?do=news_content&id=<?=$new['id'];?>'" style="cursor: pointer;">
            <div style="width:100%;height:35vh;overflow:hidden"><img src="./img/<?=$new['img'];?>" alt="" width="100%" style="box-shadow: 1px 0 2px #1f1f1f;"></div>
        </a>
        <a onclick="location.href='?do=news_content&id=<?=$new['id'];?>'" style="cursor: pointer;">
            <div><h3 class="mt-3" style="font-weight: 700;padding-bottom:10px;border-bottom:1px solid #1f1f1f" ><?=$new['title'];?></h3></div>
        </a>
        <a onclick="location.href='?do=news_content&id=<?=$new['id'];?>'" style="cursor: pointer;">
            <div><p class="mt-3"><?=mb_substr($new['news'],0,25);?></p></div>
        </a>
        </article>
        <?php
        }
    ?>
    </div>
    
    <div class="text-center">
        
        <?php
        
        if(($now-1)>0){
            $prev=$now-1;
            echo "<a href='?do=news&p=$prev'style='text-decoration:none;color:#1f1f1f'> < </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $fontsize=($now==$i)?"font-size:20px":"font-size:16px";
            echo "<a href='?do=news&p=$i' style='$fontsize;text-decoration:none;margin:0 5px;color:#1f1f1f'> $i </a>";
        }
        if(($now+1)<=$pages){
            $next=$now+1;
            echo "<a href='?do=news&p=$next'style='text-decoration:none;color:#1f1f1f'> > </a>";
        }
        ?>

    </div>
</main>
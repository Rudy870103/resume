<?php $news=$News->find($_GET['id']);?>
<header style="padding: 80px 0;">
    <img src="./img/<?=$news['img'];?>" alt="<?=$news['title'];?>" width="100%">
<h1 style="margin-top:50px;text-align: center;font-weight:700"><?=$news['title'];?></h1>
</header>

<main style="width:70%;margin:auto">
  <article class="mt-5">
    <p><?=$news['news'];?></p>
  </article>
</main>
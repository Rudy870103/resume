<h1 class="text-center mt-5">編輯照片</h1>

<?php $news = $News->find($_GET['id']); ?>
<form action="./api/save_news.php" method="post" enctype="multipart/form-data">


    <table style="margin: auto;">
        <tr>
            <td class="text-end">照片 &nbsp&nbsp</td>
            <td><input type="file" name="img" value="<?= $news['img']; ?>"></td>
        </tr>
        <tr>
            <td class="text-end">標題 &nbsp&nbsp</td>
            <td><input type="text" name="title" value="<?= $news['title']; ?>"></td>
        </tr>
        <tr>
            <td>說明 &nbsp&nbsp</td>
            <td><textarea name="news" style="width:99%;height:100px;"><?= $news['news']; ?></textarea></td>
        </tr>
    </table>

    <div class="text-center">
        <input type="hidden" name="id" value="<?= $news['id']; ?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>
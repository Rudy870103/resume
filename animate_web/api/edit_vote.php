<?php include_once 'db.php';


if (isset($_POST['id'])) {

    foreach ($_POST['id'] as $id) {

        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Vote->del($id);
        } else {
            $vote = $Vote->find($id);
            $vote['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
            $Vote->save($vote);
        }
    }
}

// 導回後台管理頁面
to("../back.php?do=vote");

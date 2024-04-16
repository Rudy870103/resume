<?php include_once 'db.php';


if (isset($_POST['id'])) {

    foreach ($_POST['id'] as $id) {

        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Motto->del($id);
        } else {
            $motto = $Motto->find($id);
            $motto['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
            $Motto->save($motto);
        }
    }
}

// 導回後台管理頁面
to("../back.php?do=motto");

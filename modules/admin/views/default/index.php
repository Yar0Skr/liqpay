<?php
    use app\models\User;
    use app\models\Item;

?>

<div class="admin-default-index">
    <h1>This is admin cabinet, here you can see all purchases</h1>
    <p>
        <?php foreach ($checkout as $log):?>
            <div style="float:left">
                <p>Id покупки: <?= $log->id ?></p>
                <p>Пользователь: <?= (User::find()->where(['id' => $log->user_id])->one())->username;?></p>
                <p>Что купил: <?= $log->item_id ?></p>
                <p>Цена: <?= $log->total_price ?></p>
                <p>----------</p>
            </div>
        <?php endforeach;?>
    </>
</div>

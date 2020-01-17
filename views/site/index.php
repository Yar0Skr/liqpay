<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <?php if(Yii::$app->user->identity->role == "admin"):?>
            <a href= "<?=\yii\helpers\Url::to(['/admin'])?>" >Admin cabinet</a>
        <?php endif; ?>


        <h1>Welcome to liqpay testing!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($items as $item):?>
            <div class="col-lg-4">
                <h2><?=$item->id?></h2>
                <p><?=$item->description?></p>
                <p><a class="btn btn-default" href="<?=\yii\helpers\Url::to(['/user?id='.$item->id])?>"><?=$item->price?> UAH</a></p>
            </div>
            <?php endforeach;?>

        </div>

    </div>
</div>

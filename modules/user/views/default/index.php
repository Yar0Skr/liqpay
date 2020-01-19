<div class="admin-default-index">
    <h1>This is admin cabinet, here you can see all purchases</h1>
    <p>
    <p>Id покупки: <?= $item->id ?></p>
    <p>Цена: <?= $item->price ?></p>
    <p>----------</p>

    <?php
    $liqpay = new LiqPay('publick_key', 'private_key');
    $html = $liqpay->cnb_form(array(
        'action'         => 'pay',
        'amount'         => $item->price,
        'currency'       => 'UAH',
        'description'    => 'Test payment',
        'order_id'       => $item->id,
        'version'        => '3'
    ));

    ?>
        <?php
        echo $html;
        ?>


</div>

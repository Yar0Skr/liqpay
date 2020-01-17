<div class="admin-default-index">
    <h1>This is admin cabinet, here you can see all purchases</h1>
    <p>
    <p>Id покупки: <?= $item->id ?></p>
    <p>Цена: <?= $item->price ?></p>
    <p>----------</p>

    <?php
    $liqpay = new LiqPay('sandbox_i62814999345', 'sandbox_1jLzUiOmPrM60AiZF0lWO5XuDYW5oNkQnkqf3gWo');
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

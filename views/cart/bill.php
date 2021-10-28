<?php
use yii\helpers\Url;
?>
<h1>Заказ офрмлен</h1>

<a class="btn btn-primary" href="<?= Url::to(['cart/get-bill']) ?>" role="button">взять счет </a>
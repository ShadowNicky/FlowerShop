<?php

/* @var $this yii\web\View */
/* @var $model app\models\Order */

?>
<div class="order-update">

    <?= $this->render('_form', [
        'model' => $model,
        'cancelUrl' => $cancelUrl,
    ]) ?>

</div>

<?php

/* @var $this yii\web\View */
/* @var $model app\models\Client */

?>
<div class="client-update">

    <?= $this->render('_form', [
        'model' => $model,
        'cancelUrl' => $cancelUrl,
    ]) ?>

</div>

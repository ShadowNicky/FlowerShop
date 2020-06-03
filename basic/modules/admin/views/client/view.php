<?php

use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

YiiAsset::register($this);
?>
<div class="client-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code_client',
            'full_name',
            'address',
            'number',
            'e_mail',
        ],
    ]) ?>

</div>

<?php

use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */

YiiAsset::register($this);
?>
<div class="assortment-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code_product',
            'name',
            'photo',
            'price',
            'quantity',
            'code_type',
        ],
    ]) ?>

</div>

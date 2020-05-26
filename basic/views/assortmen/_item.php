<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="col-lg-3 col-md-4 col-6 flower-item">

    <? echo Html::a(Html::img($model->photoSrc, ['alt' => pathinfo($model->photo)['filename'], 'class' => 'img-rounded', 'width' => 250]), $model->photoSrc, ['rel' => 'fancybox']); ?>
    <h4><?= $model->name ?></h4>
    <p><em><?= $model->codeType->category ?></em></p>
    <p><?= $model->codeType->description ?></p>
    <p>
        <? echo Html::a('Добавить  в заказ', ['basket/add', 'id' => $model->getPrimaryKey()], ['class' => 'btn btn-success']) ?>
    </p>
</div>

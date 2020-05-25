<?php

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="col-md-3 flower-item">
    <img src="..." alt="..." class="img-rounded">
    <h4><?= $model->name ?></h4>
    <p><em><?= $model->codeType->category ?></em></p>
    <p><?= $model->codeType->description ?></p>
</div>

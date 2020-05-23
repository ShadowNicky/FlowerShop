<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */

$this->title = 'Update Assortment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assortments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code_product]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assortment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

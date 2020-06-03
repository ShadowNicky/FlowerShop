<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssortmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assortment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'code_product') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'code_type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

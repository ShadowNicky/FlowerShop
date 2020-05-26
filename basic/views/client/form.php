<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form ActiveForm */
?>
<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name') ?>
    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'number') ?>
    <?= $form->field($model, 'e_mail') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- client-form -->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form ActiveForm */
?>
<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code_client') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- order-form -->

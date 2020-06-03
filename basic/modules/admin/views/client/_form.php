<?php

use dmitrybtn\yimp\widgets\Controls;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'e_mail')->textInput(['maxlength' => true]) ?>


    <?php echo Controls::widget([
        'form' => $form,
        'cancelUrl' => $cancelUrl,
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>

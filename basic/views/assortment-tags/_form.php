<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssortmenTags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assortmen-tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_assortmen')->textInput() ?>

    <?= $form->field($model, 'tag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

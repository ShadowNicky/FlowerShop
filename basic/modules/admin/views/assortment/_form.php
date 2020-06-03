<?php

use dmitrybtn\yimp\widgets\Controls;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assortment-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>
    <?= Html::img($model->getThumbUploadUrl('photo'), ['class' => 'img-thumbnail']) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code_type')->textInput() ?>


    <?php echo Controls::widget([
        'form' => $form,
        'cancelUrl' => $cancelUrl,
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>

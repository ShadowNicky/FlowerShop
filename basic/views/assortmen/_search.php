<?php

use app\models\Tag;
use app\models\Typeflower;
use yii\helpers\ArrayHelper;
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

    <?= $form->field($model, 'code_type')->dropDownList(ArrayHelper::map(Typeflower::find()->all(), 'code_type', 'category')) ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'quantity') ?>
    <?= $form->field($model, 'tagsselected')->checkboxList(ArrayHelper::map(Tag::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

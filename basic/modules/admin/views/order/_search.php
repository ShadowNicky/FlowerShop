<?php

use app\models\Client;
use app\models\OrdStatus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'code_order') ?>

    <?= $form->field($model, 'code_client')->dropDownList(
        ArrayHelper::map(Client::find()->asArray()->all(), 'code_client', function ($i) {
            return implode(' / ', $i);
        })
    ); ?>

    <?= $form->field($model, 'status')->dropDownList(array_merge(['' => ''], ArrayHelper::map(OrdStatus::find()->asArray()->all(), 'id_status', 'name'))) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

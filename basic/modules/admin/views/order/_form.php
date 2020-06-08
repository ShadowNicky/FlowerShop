<?php

use app\models\Client;
use app\models\OrdStatus;
use dmitrybtn\yimp\widgets\Controls;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'code_client')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Client::find()->indexBy('id_status')->asArray()->all(), 'code_client', function ($i) {
            return implode(' / ', $i);
        }),
        'options' => ['placeholder' => 'Выберите клиента'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(array_merge(['' => ''], ArrayHelper::map(OrdStatus::find()->asArray()->all(), 'id_status', 'name'))); ?>


    <?php echo Controls::widget([
        'form' => $form,
        'cancelUrl' => $cancelUrl,
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>

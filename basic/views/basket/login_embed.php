<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "<div class=\"login-input-box\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<div class="login-input-box">
    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Имя пользователя'])->label(false); ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false); ?>
</div>


<div class="button-box">
    <div class="login-toggle-btn">
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"\">{error}</div>",
        ])->label('Запомнить компьютер') ?>
    </div>

    <div class="button-box">
        <?= Html::submitButton('<span>Login</span>', ['class' => 'login-btn btn', 'name' => '']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
<!--
<form action="#">
    <p class="coupon-input form-row-first">
        <label>Номер телефона<span class="required">*</span></label>
        <input type="text" name="email">
    </p>
    <p class="coupon-input form-row-last">
        <label>Пароль<span class="required">*</span></label>
        <input type="password" name="password">
    </p>
    <div class="clear"></div>
    <p>
        <button type="submit" class="button-login btn" name="login" value="Login">Вход
        </button>
        <label class="remember"><input type="checkbox" value="1"><span>Запомнить компьютер</span></label>
    </p>
</form>-->

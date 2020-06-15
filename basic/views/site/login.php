<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-content-wrap section-ptb lagin-and-register-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">

                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#">
                            <h4><?= Html::encode($this->title) ?></h4>
                        </a>
                    </div>

                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

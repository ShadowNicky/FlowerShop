<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <main class="page-content section-ptb">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-sm-12">
                    <div class="contact-form">
                        <div class="contact-form-info">
                            <div class="contact-title">
                                <h3>Связь с проектом</h3>
                            </div>

                            <div class="contact-page-form">
                                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                                <div class="contact-input">
                                    <div class="contact-inner">
                                        <!--<input name="con_name" type="text" placeholder="Name *">-->
                                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name', 'value' => ''])->label(false) ?>
                                    </div>
                                    <div class="contact-inner">
                                        <!--<input name="con_email" type="email" placeholder="Email *">-->
                                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail', 'value' => ''])->label(false) ?>
                                    </div>
                                    <div class="contact-inner">
                                        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone', 'value' => ''])->label(false) ?>
                                    </div>
                                    <div class="contact-inner">
                                        <!--<input name="con_subject" type="text" placeholder="Subject *">-->
                                        <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject', 'value' => ''])->label(false) ?>
                                    </div>
                                    <div class="contact-inner contact-message">
                                        <!--<textarea name="con_message" placeholder="Message *"></textarea>-->
                                        <?= $form->field($model, 'body')->textarea(['rows' => 6])->label(false) ?>
                                    </div>
                                </div>

                                <div class="contact-submit-btn">
                                    <?= $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
                                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                    ]) ?>

                                    <?= Html::submitButton('Отправить сообщение', ['class' => 'submit-btn', 'name' => '']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-sm-12">
                    <div class="contact-infor">
                        <div class="contact-title">
                            <h3>Информация о нас</h3>
                        </div>
                        <div class="contact-dec">
                            <p>Flower - это магазин с большим выбором цветов и букетов в Самаре. Наши флористы имеют
                                большой опыт
                                работы и с душой подходят к выполнению любого заказа.</p>
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li><i class="zmdi zmdi-home"></i> Адрес: ул. Пушкина д268А г.Самара, Россия</li>
                                <li><i class="zmdi zmdi-email"></i> prktick.po.mdk.v.03.04@mail.ru</li>
                                <li><i class="zmdi zmdi-phone"></i> 8(800)555-35-35</li>
                            </ul>
                        </div>
                        <div class="work-hours">
                            <h5>Рабочие часы</h5>
                            <p><strong>Пн - Сб</strong>: &nbsp;9:00 &ndash; 20:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>
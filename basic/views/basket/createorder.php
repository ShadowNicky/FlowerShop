<?php

use app\models\Client;
use app\models\LoginForm;
use app\models\Order;

/* @var $this yii\web\View */

/* @var $order Order */
/* @var $client Client */
/* @var $loginForm LoginForm */

$this->title = 'Оформить заказ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-content-wrap section-ptb checkout-page">
    <!--<h1><? /*= Html::encode($this->title) */ ?></h1>-->
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="coupon-area">
                    <!-- coupon-accordion start -->
                    <div class="coupon-accordion">
                        <h3>Уже зарегистрированы? <span class="coupon"
                                                        id="showlogin">Нажать здесь для авторизации</span></h3>
                        <div class="coupon-content" id="checkout-login">
                            <div class="coupon-info">
                                <?= $this->render('login_embed', ['model' => $loginForm]) ?>
                            </div>
                        </div>
                    </div>
                    <!-- coupon-accordion end -->
                </div>
            </div>
        </div>


        <!-- checkout-details-wrapper start -->
        <div class="checkout-details-wrapper">
            <div class="row">
                <?= $this->render('/client/form', ['model' => $client]) ?>
            </div>
        </div>
        <!-- checkout-details-wrapper end -->

    </div>
</div>

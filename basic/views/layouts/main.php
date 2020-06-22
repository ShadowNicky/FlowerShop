<?php

/* @var $this View */
/* @var $content string */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--подключение bootstrap 4  через  тег  напрямую    по  идее  не нужно    оно  дублируеццо по  этому  удалил-->

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="main-wrapper">
    <div class="wrap">

        <header class="fl-header">

            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header-top-inner">
                                <div class="row">
                                    <div class="col-lg-4 col-md-3">
                                        <div class="social-top">
                                            <ul>
                                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                <li><a href="#"><i class="ion-social-tumblr"></i></a></li>
                                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-9">
                                        <div class="top-info-wrap text-right">
                                            <ul class="top-info">
                                                <li>Пн-Сб : 9:00-20:00</li>
                                                <li><a href="#">8(800)555-35-35</a></li>
                                                <li><a href="#">prktick.po.mdk.v.03.04@mail.ru</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-2 col-md-4 col-5">
                            <div class="logo-area">
                                <?= Html::a('<img src="/basic/web/img/logo.png" alt="logo">', '../web/index.php'); ?>
                            </div>
                        </div>

                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="main-menu-area text-center">
                                <nav class="main-navigation">
                                    <?
                                    $advanced = [];
                                    if (!Yii::$app->user->isGuest)
                                        $advanced [] = ['label' => 'ЛК', 'url' => ['/site/login']];
                                    $menu = [['label' => 'Главная', 'url' => ['/site/index']],
                                        ['label' => 'Каталог', 'url' => ['assortmen/index']],
                                        ['label' => 'О нас', 'url' => ['/site/about']],
                                        ['label' => 'Контакты', 'url' => ['/site/contact']]
                                    ];
                                    foreach ($menu as $index => $elem) {
                                        $ul [] = Html::a($elem['label'], $elem['url'], ($elem['options'] ?? []));

                                    }
                                    echo Html::ul($ul, ['encode' => false]);
                                    ?>
                                </nav>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-8 col-7">
                            <div class="right-blok-box d-flex">

                                <!--<div class="user-wrap">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i></a>
                                </div>-->
                                <div class="account-wrap">
                                    <a href="#">
                                        <i class="ion-ios-person-outline"></i>
                                        <ul class="account-hidden">
                                            <li><?
                                                if (!Yii::$app->user->isGuest) {
                                                    echo Html::tag('li', '<strong><code>' . Yii::$app->user->identity->username . '</code></strong>');
                                                    echo Html::tag('li', Html::a('Личный кабинет', ['/site/lk']));
                                                    echo '<li>'
                                                        . Html::beginForm(['/site/logout'], 'post')
                                                        . Html::submitButton(
                                                            'выйти',
                                                            ['class' => 'btn btn-link logout']
                                                        )
                                                        . Html::endForm()
                                                        . '</li>';
                                                } else {
                                                    echo Html::tag('li', Html::a('войти', ['/site/login']));
                                                }
                                                ?></li>
                                        </ul>
                                    </a>
                                </div>

                                <?= '<div class="shopping-cart-wrap"><a href="#"><i class="ion-ios-cart-outline"></i> <span id="cart-total">'
                                    . count(Yii::$app->getSession()->get('basket') ?? []) . '</span></a>'
                                    . $this->render('/basket/cart_mini')
                                . ' </div>' ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->

        </header>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="breadcrumb-title"><?= Html::encode($this->title) ?></h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>


    </div>

    <footer class="footer">
        <!--<div class="container">
            <p class="pull-left">&copy; My Company <? /*= date('Y') */ ?></p>

            <p class="pull-right"><? /*= Yii::powered() */ ?></p>
        </div>-->
        <div class="footer-top section-pb section-pt-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-footer mt-20">
                            <div class="footer-logo">
                                <?=
                                Html::a('<img src="/basic/web/img/logo.png" alt="logo">', '../web/index.php');
                                ?>
                            </div>
                            <p> Flower - это магазин с большим выбором цветов и букетов в Самаре. Наши флористы имеют
                                большой опыт
                                работы и с душой подходят к выполнению любого заказа.</p>
                            <div class="newsletter-footer">
                                <?php /*$form = ActiveForm::begin(['id' => 'contact-form']); */ ?><!--
                                    <? /*= $form->field($model, 'email')->textInput(['placeholder' => 'Ваш Email'])*/ ?>

                                <div class="subscribe-button">
                                    <? /*= Html::submitButton('Подтвердить', ['class' => 'subscribe-button', 'name' => 'contact-button']) */ ?>
                                </div>
                                --><?php /*ActiveForm::end(); */ ?>
                                <input type="text" placeholder="Ваш Email">
                                <div class="subscribe-button">
                                    <button class="subscribe-btn">Подтвердить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget-footer mt-30">
                            <h6 class="title-widget">Ссылки</h6>
                            <ul class="footer-list">
                                <li><a href="#">Главная</a></li>
                                <li><a href="#">О нас</a></li>
                                <li><a href="#">Контакты</a></li>
                                <li><a href="#">Каталог</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-footer mt-30">
                            <h6 class="title-widget">Контакты</h6>
                            <ul class="footer-contact">

                                <li>
                                    <label>Телефон</label>
                                    <a href="#">8(800)555-35-35</a>
                                </li>
                                <li>
                                    <label>Email</label>
                                    <a href="#">prktick.po.mdk.v.03.04@mail.ru</a>
                                </li>
                                <li>
                                    <label>Адрес</label>
                                    ул. Пушкина д268А <br> г.Самара, Россия
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-footer mt-30">
                            <h6 class="title-widget">Соцсети</h6>
                            <ul>
                                <li><a href="#"><i class="ion-social-facebook"></i> Facebook</a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="ion-social-tumblr"></i> Tumblr</a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i> Google +</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copy-right-text text-center">
                            <p> Алешков Н.А.&copy; <a href="basic/web/index.php">FlowerShop</a> 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

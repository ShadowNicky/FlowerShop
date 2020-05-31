<?php

/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

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
                                            <li>Mon - Fri : 9am to 5pm </li>
                                            <li><a href="#">+88012345678</a></li>
                                            <li><a href="#">fultalashop@gmail.com</a></li>
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

                            <?=
                            Html::a('<img src="/basic/web/img/logo.png" alt="logo">', '../web/index.php');
                            //                            Navbar::widget(['brandLabel' => Yii::$app->name,'brandUrl' => Yii::$app->homeUrl,'options' => ['class' => 'navbar']]);
                            ?>

                        </div>

                        <?php //Html::beginTag('div',['class' => 'logo-area',]); ?>
                    </div>

                    <div class="col-lg-8 d-none d-lg-block">
                        <div class="main-menu-area text-center">
                            <nav class="main-navigation">
                                <?
                                $advanced = [];
                                if (!Yii::$app->user->isGuest)
                                    $advanced [] = ['label' => 'ЛК', 'url' => ['/site/login']];
                                $menu = [['label' => 'Home', 'url' => ['/site/index']],
                                        ['label' => 'Shop', 'url' => ['/site/contact']],
                                        ['label' => 'About', 'url' => ['/site/about']],
                                    ['label' => 'Contact', 'url' => ['/site/contact']]
                                ];
                                foreach ($menu as $index => $elem) {
                                    $ul [] = Html::a($elem['label'], $elem['url'], ($elem['options'] ?? []));

                                }
                                echo Html::ul($ul, ['encode' => false]);
                                //                                echo Nav::widget([
                                //                                    'options' => ['class' => ''],
                                //                                    'items' => [
                                //                                        ['label' => 'Home', 'url' => ['/site/index']],
                                //                                        ['label' => 'Shop', 'url' => ['/site/contact']],
                                //                                        ['label' => 'About', 'url' => ['/site/about']],
                                //                                        ['label' => 'Contact', 'url' => ['/site/contact']],
                                //                                    ],
                                //                                ]); ?>
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-8 col-7">
                        <div class="right-blok-box d-flex">
                            <!--                            --><? //= Nav::widget([
                            //                                'options' => ['class' => ''],
                            //                                'items' => [
                            ////                                    Yii::$app->user->isGuest ? (
                            //                                    ['label' => '<i class="ion-ios-person-outline"></i>', 'url' => ['/site/login'], 'encode' => false]
                            ////                                    ) :
                            //////                                        ['label' => Yii::$app->user->identity->username, 'items' => [['label' => 'ЛК', 'url' => ['/site/lk']], (
                            ////                                        ['label' => '<i class="ion-ios-person-outline"></i>',
                            ////                                            'items' => [['label' => Yii::$app->user->identity->username, 'url' => ['/site/lk']], (
                            ////                                            '<li>'
                            ////                                            . Html::beginForm(['/site/logout'], 'post')
                            ////                                            . Html::submitButton(
                            ////                                                'выйти (' . Yii::$app->user->identity->username . ')',
                            ////                                                ['class' => 'btn btn-link logout']
                            ////                                            )
                            ////                                            . Html::endForm()
                            ////                                            . '</li>'
                            ////                                        )
                            ////                                        ]],
                            //
                            //
                            //
                            //                                    //['label' => '<i class="ion-ios-cart-outline"></i> <span id="cart-total">' . count(Yii::$app->getSession()->get('basket')) . '</span>', 'url' => ['/basket/'], 'encode' => false],
                            ////                                    ['label' => '<i class="ion-ios-cart-outline"></i> <span id="cart-total">' . count(Yii::$app->getSession()->get('basket')) . '</span>', 'encode' => false,
                            ////                                /*        'items' => [[
                            ////                                                'label' => ''  , 'url' => ['/site/lk']], (
                            ////                                                '<li>'
                            ////                                                . '<div class="cart-image">'
                            ////
                            ////                                                    .Html::beginForm(['/site/logout'], 'post')
                            ////                                                    . Html::submitButton(
                            ////                                                        'выйти (' . Yii::$app->user->identity->username . ')',
                            ////                                                        ['class' => 'btn btn-link logout']
                            ////                                                    )
                            ////                                                    . Html::endForm()
                            ////                                                . '</li>'
                            ////
                            ////                                                . '</div>' //close "shopping-cart-wrap"
                            ////                                        )
                            ////                                    ]*/],
                            //,
                            //
                            //                                ]
                            //                            ]);
                            //
                            //                            Html::endTag('div');
                            //                            ?>
                            <? echo '<div class="shopping-cart-wrap">
                                    <a href="#"><i class="ion-ios-cart-outline"></i> <span id="cart-total">' . count(Yii::$app->getSession()->get('basket')) . '</span></a>
                                    
                                    ' . $this->render('/basket/cart_mini') . '
                                    

                                </div>' ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>

        <section class="page-title-area bg-image ptb--80" data-bg-image="/basic/web/img/page_title_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Shop Left Sidebar</h1>
                        <ul class="breadcrumb">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    </div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

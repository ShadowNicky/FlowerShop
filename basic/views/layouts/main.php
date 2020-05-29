<?php

/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class="main-wrapper">

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


            <div class="col-lg-8 d-none d-lg-block">
                <div class="main-menu-area text-center">
                    <?php
                    NavBar::begin([
                        'brandLabel' => Yii::$app->name,
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar',
                        ],
                    ]);
                    echo Nav::widget([
                        'options' => ['class' => 'main-navigation'],
                        'items' => [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            ['label' => 'About', 'url' => ['/site/about']],
                            ['label' => 'Contact', 'url' => ['/site/contact']],
                            ['label' => 'корзина <span  class="badge">' . count(Yii::$app->getSession()->get('basket')) . '</span>', 'url' => ['/basket/'], 'encode' => false],
                            Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                                '<li>'
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>'
                            )
                        ],
                    ]);
                    NavBar::end();
                    ?>
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

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
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

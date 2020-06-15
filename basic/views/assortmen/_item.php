<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="">
    <div class="single-product-wrap">

        <div class="product-image">
            <? echo Html::a(Html::img($model->photoSrc, ['alt' => pathinfo($model->photo)['filename'], 'class' => 'img-rounded center-block', 'height' => 340, 'width' => 270]), ['view', 'id' => $model->code_product], []); ?>

            <div class="product-action">
                <!--<a href="#" class="add-to-cart"><i class="ion-bag"></i></a>-->
                <? echo Html::a('<i class="ion-bag"></i>', ['basket/add', 'id' => $model->getPrimaryKey()], ['class' => 'add-to-cart']) ?>

                <!--<a href="#" class="wishlist"><i class="ion-android-favorite-outline"></i></a>-->
                <? /* echo Html::a('<i class="ion-android-favorite-outline"></i>', ['#'], ['class' => 'wishlist']) */ ?>

                <!--<a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i class="ion-ios-search"></i></a>-->
                <? echo Html::a('<i class="ion-ios-search"></i>', $model->photoSrc, ['class' => 'quick-view', 'data-toggle' => 'modal', 'data-target' => '#exampleModalCenter', 'rel' => 'fancybox']); ?>
            </div>
        </div>

        <div class="product-content">
            <h3><a href="#"><?= $model->name ?></a></h3>
            <div class="price-box">
                <span class="new-price"><?= $model->price . '₽' ?></span>
            </div>
        </div>

        <!--<p><em><? /*= $model->codeType->category */ ?></em></p>
        <p><? /*= $model->codeType->description */ ?></p>-->

    </div>
</div>

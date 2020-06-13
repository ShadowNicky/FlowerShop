<?php
/* @var $this yii\web\View */
/* @var $model app\models\Assortment */
?>
<div class="col-lg-3">
    <!-- single-product-wrap start -->
    <div class="single-product-wrap">
        <div class="product-image">
            <a href="product-details.html"><img src="<?= $model->getPhotoSrc() ?>" alt="Produce Images"></a>
            <span class="label">30% Off</span>
            <div class="product-action">
                <a href="#" class="add-to-cart"><i class="ion-bag"></i></a>
                <a href="#" class="wishlist"><i class="ion-android-favorite-outline"></i></a>
                <a href="#" class="quick-view" data-toggle="modal" data-target="#exampleModalCenter"><i
                            class="ion-ios-search"></i></a>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="product-details.html"><?= $model->name ?></a></h3>
            <div class="price-box">
                <span class="old-price">$25</span>
                <span class="new-price">$20</span>
            </div>
        </div>
    </div>
    <!-- single-product-wrap end -->
</div>

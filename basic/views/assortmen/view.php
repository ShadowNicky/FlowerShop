<?php

use yii\helpers\Html;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assortments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]);

?>

<div class="assortment-view">
    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb product-details-page">
        <div class="container">
            <div class="row">

                <div class="col-xl-6 col-lg-7 col-md-6">
                    <div class="product-details-images">
                        <div class="product_details_container">
                            <!-- product_big_images start -->
                            <div class="product_big_images-right">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane active product-image-position" id="img-tab-5">
                                        <!--<a class="img-poppu">-->
                                        <?= Html::a(Html::img($model->photoSrc, ['alt' => pathinfo($model->photo)['filename'], 'class' => 'img-rounded center-block', 'height' => 340, 'width' => 270]), $model->photoSrc, ['rel' => 'fancybox']); ?>
                                        <!--</a>-->
                                    </div>
                                </div>
                            </div>
                            <!-- product_big_images end -->
                        </div>
                    </div>
                </div>
                <!--<h1><? /*= Html::encode($this->title) */ ?></h1>-->


                <div class="col-xl-6 col-lg-5 col-md-6">
                    <!-- product_details_info start -->
                    <div class="product_details_info">
                        <p><?= $model->name ?></p>
                        <p><?= $model->price ?></p>
                        <?
                        echo '<p>' . $model->codeType->description . '</p>';

                        //                        echo DetailView::widget([
                        //                            'model' => $model,
                        //                            'attributes' => [
                        //                                'name',
                        //                                'codeType.category',
                        //                                'codeType.description',
                        //                                'price',
                        //                                'quantity',
                        //                            ],
                        //                        ]);

                        $list = [];
                        $all_tags = $model->tags;
                        foreach ($all_tags as $index => $tag) {
                            $list[] = Html::a($tag->name, ['assortmen/by-tag', 'tagname' => $tag->name]);
                        }
                        echo implode(' ', $list);
                        ?>
                    </div>
                    <!-- product_details_info end -->

                    <!-- pro_dtl_btn start -->
                    <div class="pro_dtl_btn">
                        <?= Html::a('добавить  в заказ', ['/basket/add', 'id' => $model->getPrimaryKey(), 'class' => 'btn buy_now_btn']) ?>
                    </div>
                    <!-- pro_dtl_btn end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
</div>

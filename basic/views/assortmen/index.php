<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssortmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
echo newerton\fancybox\FancyBox::widget([
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
$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-content-wrap shop-page section-ptb">
    <div class="container">
        <div class="row">

            <!--<h1><? /*= Html::encode($this->title) */ ?></h1>-->

            <!--<p>
                            <? /*= Html::a('Создать Ассортимент', ['Создать'], ['class' => 'btn btn-success']) */ ?>
                        </p>-->
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- shop-sidebar-wrap start -->
                <div class="shop-sidebar-wrap">
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <!-- shop-sidebar-wrap end -->
            </div>

            <div class="col-lg-9 order-lg-2 order-1">
                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="row">
                        <div class="col">
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar">
                                <!-- product-view-mode start -->

                                <div class="product-mode">
                                    <!--shop-item-filter-list-->
                                    <ul class="nav shop-item-filter-list" role="tablist">
                                        <li class="active"><a class="active" data-toggle="tab" href="#grid"><i
                                                        class="ion-ios-keypad-outline"></i></a></li>
                                        <!--<li><a data-toggle="tab" href="#list"><i class="ion-ios-list-outline"></i></a></li>-->
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <!-- product-view-mode end -->
                                <!-- product-short start -->
                                <div class="product-short">
                                    <select class="nice-select" name="sortby">
                                        <option value="trending">Relevance</option>
                                        <option value="sales">Name(A - Z)</option>
                                        <option value="sales">Name(Z - A)</option>
                                        <option value="rating">Price(Low > High)</option>
                                        <option value="date">Rating(Lowest)</option>
                                    </select>
                                </div>
                                <!-- product-short end -->
                            </div>
                            <!-- shop-top-bar end -->
                        </div>
                    </div>

                    <!-- shop-products-wrap start -->
                    <div class="shop-products-wrap">
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid">
                                <div class="shop-product-wrap">
                                    <div class="row">
                                        <?= ListView::widget([
                                            'dataProvider' => $dataProvider,
                                            'itemOptions' => ['class' => 'col-lg-4 col-md-4 col-sm-6'],
                                            'itemView' => '_item.php',
                                            'options' => ['class' => 'row'],
                                            'summary' => false,
                                        ]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrap end -->
                </div>
                <!-- shop-sidebar-wrap end -->
            </div>


        </div>
    </div>
</div>









































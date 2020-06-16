<?php

use app\models\Tag;
use app\models\Typeflower;
use kartik\range\RangeInput;
use kartik\slider\Slider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssortmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="assortment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <? /*= $form->field($model, 'code_product') */ ?>

    <!-- shop-sidebar start -->
    <div class="shop-sidebar mb-30">
        <h4 class="title">По цене:</h4>
        <!-- filter-price-content start -->
        <div class="filter-price-content">
            <div id="price-slider" class="price-slider">
                <div class="filter-price-wapper">
                    <div class="filter-price-cont">
                        <div id="price-slider" class="price-slider">
                            <?= /*  '<label class="control-label" for="w1">цена</label>' .*/
                            /*'<b class="badge" id="m0" title="min">0</b> ' .*/
                            Slider::widget([
                                'name' => 'pricerange',
                                'value' => '250,650',
                                'sliderColor' => Slider::TYPE_GREY,
                                'pluginOptions' => [
                                    'min' => 10,
                                    'max' => 1000,
                                    'step' => 5,
                                    'range' => true
                                ],
                                'pluginEvents' => [
                                    "slideStart" => "function() { log(\"slideStart\"); }",
                                    "slide" => "function(e,  newValue) {a =  arguments; vals =  $(this).val().split(',');updatevalue(vals, '" . Url::to(['/assortmen/by-range']) . "'); log(\"slide1\"); }",
                                    "slideStop" => "function() { log(\"slideStop\"); }",
                                    "slideEnabled" => "function() { log(\"slideEnabled\"); }",
                                    "slideDisabled" => "function() { log(\"slideDisabled\"); }",
                                ]
                            ]) /*. ' <b class="badge" id="m1" title="max">1000</b>' . ' <b class="badge" id="m2" title="найдено">?</b>'*/
                            ;
                            //                        echo $sep;


                            $this->registerJsFile("@web/js/search.js", [
                                'depends' => [
                                    JqueryAsset::className()
                                ]
                            ]);
                            //$this->registerJs($str, null,   ['depends'=>'\yii\web\JqueryAsset']);
                            //                        $sep = '<span style="margin-right:50px">&nbsp;</span>';

                            $form->field($model, 'pricerange')->widget(RangeInput::class, [
                                'options' => ['placeholder' => 'Rate (0 - 5)...'],
                                'html5Container' => ['style' => 'width:350px'],
                                'html5Options' => ['min' => 0, 'max' => 500],
                                'addon' => ['append' => ['content' => '<i class="fas fa-star"></i>']]
                            ]);
                            ?>
                        </div>

                        <div class="filter-price-wapper">
                            <div class="filter-price-cont">
                                <span>Price:</span>

                                <div class="input-type">
                                    <input type="text" id="min-price" readonly=""/>
                                </div>

                                <span>—</span>

                                <div class="input-type">
                                    <input type="text" id="max-price" readonly=""/>
                                </div>

                                <?= Html::a('<span>Применить</span>', '#', ['class' => 'add-to-cart-button']) ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- filter-price-content end -->
    </div>
    <!-- shop-sidebar end -->

    <!-- shop-sidebar start -->
    <div class="shop-sidebar mb-30">
        <h4 class="title">Категории</h4>
        <?= $form->field($model, 'code_type')->dropDownList(ArrayHelper::map(Typeflower::find()->all(), 'code_type', 'category')) ?>
    </div>
    <!-- shop-sidebar end -->

    <? /*= $form->field($model, 'name') */ ?><!--
        <? /*= $form->field($model, 'price') */ ?>

        --><? /*= $form->field($model, 'quantity') */ ?>

    <!-- shop-sidebar start -->
    <div class="shop-sidebar">
        <h4 class="title">Теги</h4>
        <div class="sidebar-tag">
            <?= $form->field($model, 'tagsselected')->checkboxList(ArrayHelper::map(Tag::find()->all(), 'id', 'name')) ?>
        </div>
    </div>
    <!-- shop-sidebar end -->


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
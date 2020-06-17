<?php

use app\models\Tag;
use app\models\Typeflower;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssortmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<? /*= $form->field($model, 'code_product') */ ?>

    <!-- shop-sidebar start -->
    <div class="shop-sidebar mb-30">
        <h4 class="title">По цене:</h4>

        <!-- filter-price-content start -->
        <div class="filter-price-content">
            <form action="#" method="post">

                <div id="price-slider" class="price-slider"></div>

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
            </form>
        </div>
        <!-- filter-price-content end -->
    </div>
    <!-- shop-sidebar end -->

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

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
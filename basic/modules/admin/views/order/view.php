<?php


use app\models\OrderItems;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

YiiAsset::register($this);
?>
<div class="order-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'created:datetime',
            'updated:datetime',
            'code_order',
            'ordStatus.name',
            'codeClient.full_name',
            'codeClient.address',
            'codeClient.number',
            'codeClient.e_mail',

        ],
    ]) ?>
    <h2>позиции в заказе</h2>
    <?= GridView::widget(['dataProvider' => new ActiveDataProvider(['query' => $model->getOrderItems()]), 'columns' => [
        ['attribute' => 'name', 'value' => /**
         * @param $model OrderItems
         * @return mixed
         */ function ($model) {
            return $model->assortment->name;
        }],
        ['attribute' => 'code_type', 'value' => /**
         * @param $model OrderItems
         * @return mixed
         */ function ($model) {
            return $model->assortment->codeType->category;
        }],
        ['attribute' => 'code_product', 'value' => /**
         * @param $model OrderItems
         * @return mixed
         */ function ($model) {
            return $model->assortment->code_product;
        }],
        ['value' => function ($model) {
            return Html::a(Html::img($model->assortment->photoSrc, ['alt' => pathinfo($model->assortment->photo)['filename'], 'class' => 'img-rounded', 'width' => 50]), $model->assortment->photoSrc, ['rel' => 'fancybox']);
        }, 'format' => 'raw', 'label' => 'фото'],
        ['label' => 'стоимость', 'value' => /**
         * @param $model OrderItems
         * @return mixed
         */ function ($model) {
            return $model->assortment->price;
        }],
        ['attribute' => 'quantity', 'label' => 'Количество'],]]) ?>
</div>

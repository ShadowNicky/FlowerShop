<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
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
?>
<div class="assortment-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['attribute' => 'id', 'label' => 'ID'],
            ['attribute' => 'photo', 'value' => function ($model) {
                return Html::a(Html::img($model['photo'], ['alt' => pathinfo($model['photo'])['filename'], 'class' => 'img-rounded', 'width' => 50]), $model->photoSrc, ['rel' => 'fancybox']);
            }, 'format' => 'raw', 'label' => 'фото'],
            ['attribute' => 'name', 'label' => 'название'],
            ['attribute' => 'price', 'label' => 'стоимость'],
            ['attribute' => 'count', 'label' => 'Количество'],
            ['value' => function ($model) {
                return Html::a('<span  class="glyphicon-plus">', ['basket/add', 'id' => $model['id']], ['class' => 'btn btn-success']) .
                    Html::a('<span  class="glyphicon-minus">', ['basket/add', 'id' => $model['id'], 'count' => -1], ['class' => 'btn btn-danger']);
            }, 'format' => 'raw', 'label' => 'изменить'],


        ],
    ]);

    Html::a('Оформить заказ!', ['basket/createorder', 'id' => $model->getPrimaryKey()], ['class' => 'btn btn-danger']);

    ?>


</div>

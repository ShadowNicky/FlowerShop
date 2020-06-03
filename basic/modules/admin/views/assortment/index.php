<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssortmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="assortment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'd-none d-sm-block'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code_product',
            'name',
            'photo',
            'price',
            'quantity',
            //'code_type',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->code_product], ['title' => 'View', 'class' => 'text-secondary']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->code_product, 'returnUrl' => Url::current()], ['title' => 'Update', 'class' => 'text-secondary']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->code_product], ['title' => 'Delete', 'class' => 'text-secondary', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'POST']]);
                    },
                ]
            ],
        ],
    ]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'd-sm-none'],
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->name), ['view', 'id' => $model->code_product]);
        },
    ]) ?>


</div>

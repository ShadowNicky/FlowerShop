<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="client-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'd-none d-sm-block'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code_client',
            'full_name',
            'address',
            'number',
            'e_mail',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->code_client], ['title' => 'View', 'class' => 'text-secondary']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->code_client, 'returnUrl' => Url::current()], ['title' => 'Update', 'class' => 'text-secondary']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->code_client], ['title' => 'Delete', 'class' => 'text-secondary', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'POST']]);
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
            return Html::a(Html::encode($model->code_client), ['view', 'id' => $model->code_client]);
        },
    ]) ?>


</div>

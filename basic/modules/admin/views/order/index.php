<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="order-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'd-none d-sm-block'],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'created:datetime',
            'updated:datetime',
            'code_order',
            'code_client',
            'ordStatus.name',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->code_order], ['title' => 'View', 'class' => 'text-secondary']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->code_order, 'returnUrl' => Url::current()], ['title' => 'Update', 'class' => 'text-secondary']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->code_order], ['title' => 'Delete', 'class' => 'text-secondary', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'POST']]);
                    },
                ]
            ],
        ],
    ]); ?>


</div>

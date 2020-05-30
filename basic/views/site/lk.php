<?php

use app\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssortmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lk-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <h3>Мои заказы</h3>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => new  Order,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code_order',
            'created:datetime',
            'status.name',
            ['label' => 'стоимость', 'value' => function ($model, $key) {
                return count($model->items);
            }],

            //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

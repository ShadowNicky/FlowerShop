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
        //   'filterModel' => new  Order,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //     'code_order',
            'created:datetime',
            ['label' => 'статус', 'value' => /**
             * @param $model Order
             * @param $key
             * @return mixed
             */ function ($model, $key) {
                return $model->ordStatus->name;

            }],
            ['label' => 'стоимость', 'format' => 'raw', 'value' => /**
             * @param $model Order
             * @param $key
             * @return string
             */ function ($model, $key) {
                $all = $model->orderItems;
                foreach ($all as $index => $item) {
                    $list [] = $item->assortment->name . ' ' . $item->quantity . '&times;' . $item->assortment->price . '=' . intval($item->quantity) * intval($item->assortment->price);
                }
                $html = Html::ul($list, ['encode' => false]);
                return $html;
            }],
            ['label' => 'итого', 'format' => 'raw', 'value' => /**
             * @param $model Order
             * @param $key
             * @return string
             */ function ($model, $key) {
                return $model->itogo();
            }],

            //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

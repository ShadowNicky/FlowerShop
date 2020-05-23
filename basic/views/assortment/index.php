<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssortmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assortments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assortment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assortment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code_product',
            'name',
            'code_type',
            'price',
            'picture',
            //'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

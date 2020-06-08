<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="admin-default-index">

    <!--    --><? //= GridView::widget([
    //        'dataProvider' => $dataProvider,
    //        'options' => ['class' => 'd-none d-sm-block'],
    //        'filterModel' => $searchModel,
    //    ]); ?>
    <!---->
    <!--    --><? //= ListView::widget([
    //        'dataProvider' => $dataProvider,
    //        'options' => ['class' => 'd-sm-none'],
    //        'itemOptions' => ['class' => 'item'],
    //        'itemView' => function ($model, $key, $index, $widget) {
    //            return Html::a(Html::encode($model->code_client), ['view', 'id' => $model->code_client]);
    //        },
    //    ]) ?>


</div>

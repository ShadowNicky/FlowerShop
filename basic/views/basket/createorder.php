<?php

use app\models\Client;
use app\models\Order;
use yii\helpers\Html;

/* @var $this yii\web\View */

/* @var $order Order */
/* @var $client Client */

$this->title = 'Оформить заказ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('/client/form', ['model' => $client]) ?>


</div>

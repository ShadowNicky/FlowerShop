<?php

use app\helpers\MyHelper;
use app\models\Assortment;
use app\models\Client;
use app\models\Order;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Ассортимент</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $count_ass = Assortment::find()->count(); ?> <small
                        class="text-muted"> <?= MyHelper::numberof($count_ass, 'товар', array('', 'а', 'ов')) ?></small>
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>добавить асортимент</li>
                <li> изменить асортимент</li>
                <li>удалить асортимент</li>
                <li>проверить асортимент</li>
            </ul>
            <a type="button" class="btn btn-lg btn-block btn-outline-primary"
               href="<?= Url::to(['/admin/assortment']) ?>">перейти</a>
        </div>
    </div>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Заказы</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $count_order = Order::find()->count(); ?>
                <small class="text-muted"><?= MyHelper::numberof($count_order, 'заказ', array('', 'а', 'ов')) . ' <span  class="badge badge-secondary badge-danger" title="новые  в статусе &laquo;создан&raquo;">+' . Order::find()->where(['status' => 1])->count() . ' новых</span>' ?> </small>
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li> изменить заказы</li>
                <li>удалить заказы</li>
                <li>проверить заказы</li>
                <li>изменить статусы заказов</li>
            </ul>
            <a href="<?= Url::to(['/admin/order']); ?>" class="btn btn-lg btn-block btn-primary">перейти</a>
        </div>
    </div>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Клиенты</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title"><?= $count_client = Client::find()->count(); ?> <small
                        class="text-muted"><?= MyHelper::numberof($count_client, 'клиент', array('', 'а', 'ов')) ?> </small>
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>добавить клиентов</li>
                <li> изменить клиентов</li>
                <li>удалить клиентов</li>
                <li>проверить клиентов</li>
            </ul>
            <a href="<?= Url::to(['/admin/client']); ?>" class="btn btn-lg btn-block btn-primary">перейти
            </a>
        </div>
    </div>
</div>

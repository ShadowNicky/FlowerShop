<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */

$this->title = 'Create Assortment';
$this->params['breadcrumbs'][] = ['label' => 'Assortments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assortment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

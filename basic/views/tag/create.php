<?php

use app\models\Assortment;

/* @var $this yii\web\View */
/* @var $assortmtnt Assortment */
/* @var $model app\models\Tag */
/* @var $tags  array  of app\models\Tag */

$this->title = 'добавить  тег' . ($assortmtnt->name ? ('  для <code>' . $assortmtnt->name) . '</code>' : '');
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-create">

    <h1><?= ($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tags' => $tags
    ]) ?>

</div>

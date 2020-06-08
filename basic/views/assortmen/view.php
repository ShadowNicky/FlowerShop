<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Assortment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Assortments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 68, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]);
echo Html::a(Html::img($model->photoSrc, ['alt' => pathinfo($model->photo)['filename'], 'class' => 'img-rounded center-block', 'height' => 340, 'width' => 270]), $model->photoSrc, ['rel' => 'fancybox']);
?>
<div class="assortment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('добавить  в заказ', ['/basket/add', 'id' => $model->getPrimaryKey()]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //    'code_product',
            'name',
            'codeType.category',
            'codeType.description',
            'price',
            'quantity',
        ],
    ]) ?>
    <?
    $list = [];
    $all_tags = $model->tags;
    foreach ($all_tags as $index => $tag) {
        $list[] = Html::a($tag->name, ['assortmen/by-tag', 'tagname' => $tag->name]);

    }
    echo implode('/', $list);
    ?>
    <!--    <script> $(document) .on('click', '.add-to-cart', function(){ return false;})<script>-->
</div>

<?php

use app\models\Tag;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */
/* @var $form yii\widgets\ActiveForm */
/* @var $tags  array  of app\models\Tag */
?>

<div class="tag-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textarea([]) ?>

    <div class="form-group">
        <?= Html::submitButton('сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <h2>другие теги</h2>
    <ul>
        <?
        /** @var Tag $tag */
        foreach ($tags as $index => $tag) {
            echo '<li><label  for  ="tag_' . $tag->id . '"><input type="radio" name="tag_id" id="tag_' . $tag->id . '"  value="' . $tag->id . '"> ' . $tag->name . ' </label></li>';

        }
        ?>
    </ul>
    <?php ActiveForm::end(); ?>

</div>

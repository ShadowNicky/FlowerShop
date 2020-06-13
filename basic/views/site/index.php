<?php

/* @var $this yii\web\View */

use app\models\Assortment;

/* @var $goods array   of  app\models\Assortment */

$this->title = 'Главная';

?>
<div class="row product-active-lg-4">
    <?php

    /** @var Assortment $model */
    foreach ($goods as $index => $model) {
        echo $this->render('_item_on_main.php', ['model' => $model]);
    }
    ?>
</div>
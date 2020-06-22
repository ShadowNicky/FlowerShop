<?php

/* @var $this yii\web\View */

use app\models\Assortment;

/* @var $goods array   of  app\models\Assortment */

$this->title = 'Главная';

?>
<div class="row">
    <div class="col-lg-4">
        <h5>МЫ ПРОСТО ЛЮБИМ СВОЮ РАБОТУ</h5>

        <p>Цветы — изумительные природное творение. Одного взгляда на них порою бывает достаточно, чтобы
            поднять себе
            настроение. Цветами украшают помещения, декорируют столы во время значимого события, преподносят
            в знак уважения
            и любви.</p>
    </div>
    <div class="col-lg-4">
        <h5>НАШ ЗАЛОГ УСПЕХА</h5>

        <p>Наши флористы - гордость магазина"Flower". Мы команда, состоящая из опытных, талантливых, а
            главное, любящие свое
            дело, специалистов. Любые букеты и композиции от магазина "Flower" подобранны со вкусом и
            составлены из свежих,
            высококачественных, тщательно отобранных цветов. Коллекция, предложенная на сайте, постоянно
            пополняется модными
            новинками.</p>
    </div>
    <div class="col-lg-4">
        <h5>БЕЗ ОПОЗДАНИЙ</h5>

        <p>Обеспечить быструю и надежную доставку цветов нам помогает наша служба доставки. В ее работе
            задействован и
            собственный автотранспорт, и курьеры, снабженные средствами мобильной связи. Сотрудники службы
            доставки работают
            четко и слаженно: мы привозим ваши заказы точно в срок.</p>
    </div>
</div>

<!-- Start Product Area -->
<div class="porduct-area section-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="section-title text-center">
                    <h2><span>Вам</span> могут понравиться</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        lebmid alteration in some ledmid form</p>
                </div>
            </div>
        </div>

        <div class="row product-active-lg-4">
            <?php

            /** @var Assortment $model */
            foreach ($goods as $index => $model) {
                echo $this->render('_item_on_main.php', ['model' => $model]);
            }
            ?>
        </div>
    </div>
</div>
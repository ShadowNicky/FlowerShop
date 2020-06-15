<?
/* @var $this yii\web\View */

use app\models\Assortment;
use yii\helpers\Html;
use yii\helpers\Url;

$_SESSION['basket'] = $_SESSION['basket'] ?? [];
$All = Assortment::find()->where(['code_product' => Array_keys($_SESSION['basket'])])->indexBy('code_product')->all();
foreach ($_SESSION['basket'] as $index => $item) {
    $table [] = [
        'id' => $id = $All[$index]->code_product,
        'name' => $name = $All[$index]->name,
        'price' => $price = $All[$index]->price,
        'count' => $count = $item,
        'photo' => $photo = $All[$index]->getPhotoSrc(),


    ];
    $itogo += intval($price) * intval($count);
    $list[] = Html::tag('div', Html::a(Html::img($photo), ['/basket']), ['class' => 'cart-image']) .
        Html::tag('div', Html::a(Html::tag('h4', $name), ['/basket']), ['class' => 'cart-title']) .
        Html::tag('span', $count . ' &times', ['class' => 'quantity']) .
        Html::tag('div', Html::tag('span', $price, ['class' => 'new-price']), ['class' => 'price-box']) .
        Html::a('<i class="icon-trash icons"></i>', ['#'], ['class' => 'remove_from_cart']);
}

$str = '<li class="subtotal-titles">
    <div class="subtotal-titles">
        <h3>Итого :</h3><span>' . $itogo . '</span>
    </div>
</li>
<li class="mini-cart-btns">
    <div class="cart-btns">
        <a href="' . Url::to(['/basket/index']) . '">Корзина</a>
        <a href="' . Url::to(['/basket/createorder']) . '">Заказать</a>
    </div>
</li>';

if (!$list)
    $list = [];
echo Html::ul(array_merge($list, [$str]), ['encode' => false, 'class' => 'mini-cart', 'itemOptions' => ['class' => 'cart-item']])
?>

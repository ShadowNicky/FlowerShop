<? namespace app\modules\admin\controllers;

use dmitrybtn\yimp\Navigator;
use yii\web\Controller;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class BaseController extends Controller
{
    public $nav;

    public function init()
    {
        parent::init();

        $this->nav = new Navigator();
        $this->nav->menuLeft = [
            ['label' => 'разделы'],
            ['label' => 'Ассортимент', 'url' => ['/admin/assortment']],
            ['label' => 'Заказы', 'url' => ['/admin/order']],
            ['label' => 'Клиенты', 'url' => ['/admin/client']],
        ];
    }
}

?>
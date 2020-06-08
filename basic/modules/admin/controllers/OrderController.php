<?php

namespace app\modules\admin\controllers;

use app\models\Order;
use app\models\OrderSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends BaseController
{
    public $nav;

    public function init()
    {
        parent::init();

        // Create Navigator object, used in your app
        // $this->nav = new ...
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->nav->title = static::titleIndex();

        $this->nav->menuRight = [
            ['label' => 'Опции'],
            ['label' => static::titleCreate(), 'url' => ['create', 'returnUrl' => Url::current()]],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Title for Index action
     */
    public static function titleIndex()
    {
        return 'Заказы';
    }

    /**
     * Title for Create action
     */
    public static function titleCreate()
    {
        return 'создать';
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $this->nav->title = static::titleView($model);
        $this->nav->crumbs = static::crumbsToIndex();

        $this->nav->menuRight = [
            ['label' => 'Опции'],
            ['label' => static::titleUpdate(), 'url' => ['update', 'id' => $model->code_order, 'returnUrl' => Url::current()]],
            ['label' => static::titleDelete(), 'url' => ['delete', 'id' => $model->code_order], 'linkOptions' => ['data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'POST']]],
        ];

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Title for View action
     */
    public static function titleView(Order $model)
    {
        return $model->code_order;
    }

    /**
     * Breadcrumbs to Index action
     */
    public static function crumbsToIndex()
    {
        return [
            ['label' => static::titleIndex(), 'url' => ['index']]
        ];
    }

    /**
     * Title for Update action
     */
    public static function titleUpdate()
    {
        return 'Обновить';
    }

    /**
     * Title for Delete action
     */
    public static function titleDelete()
    {
        return 'удалить';
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($returnUrl, $successUrl = null)
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($successUrl ?: ['view', 'id' => $model->code_order]);
        }

        $this->nav->title = static::titleCreate();
        $this->nav->crumbs = static::crumbsToIndex();

        return $this->render('create', [
            'model' => $model,
            'cancelUrl' => $returnUrl,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $returnUrl)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect($returnUrl);
        }

        $this->nav->title = static::titleUpdate();
        $this->nav->crumbs = static::crumbsToView($model);


        return $this->render('update', [
            'model' => $model,
            'cancelUrl' => $returnUrl,
        ]);
    }

    /**
     * Breadcrumbs to View action
     */
    public static function crumbsToView(Order $model)
    {
        return array_merge(static::crumbsToIndex(), [
            ['label' => static::titleView($model), 'url' => ['view', 'id' => $model->code_order]],
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $returnUrl = ['index'])
    {
        $this->findModel($id)->delete();

        return $this->redirect($returnUrl);
    }
}

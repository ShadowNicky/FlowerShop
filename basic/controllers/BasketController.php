<?php

namespace app\controllers;

use app\models\Assortment;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class BasketController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdd($id, $count = 1)
    {
        $_SESSION['basket'][$id] += $count;
        $this->goBack(Url::previous());


    }

    public function actionClear()
    {
        $_SESSION['basket'] = [];


    }

    public function actionIndex()
    {
        Url::remember();
        $_SESSION['basket'] = $_SESSION['basket'] ?? [];
        $All = Assortment::find()->where(['code_product' => Array_keys($_SESSION['basket'])])->indexBy('code_product')->all();
        foreach ($_SESSION['basket'] as $index => $item) {
            $table [] = [
                'id' => $All[$index]->code_product,
                'name' => $All[$index]->name,
                'price' => $All[$index]->price,
                'count' => $item,
                'photo' => $All[$index]->getPhotoSrc(),


            ];
        }
        $dataProvider = new ArrayDataProvider(['allModels' => $table]);
        return $this->render('index', ['dataProvider' => $dataProvider]);

    }


}

<?php

namespace app\controllers;

use app\models\Assortment;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Order;
use app\models\Typeflower;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
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
    public function actionIndex()
    {
        $goods = Assortment::find()->limit(10)->orderBy('RAND()')->all();/* это грязный хак, который вешает базу на больших обьемах данных. по этому так делать нельзя, но для таблицы из 10 строк проканает в качестве заплатки*/
        return $this->render('index', ['goods' => $goods]);
    }

    public function actionSitemap()
    {
        $items = [];
        $tmp = '';
        $type = Typeflower::find()->with('assortment')->all();
        /** @var Typeflower $item */
        foreach ($type as $index => $item) {
            $tmp .= '<li><strong>' . $item->category . '</strong>';
            if ($item->assortment)
                $tmp .= '<ul>';
            foreach ($item->assortment as $i => $v) {
                $tmp .= '<li>' . $v->name . '</li>';
            }
            if ($item->assortment)
                $tmp .= '</ul>';
            $tmp .= '</li>';
        }
        return $this->render('sitemap', ['tmp' => $tmp]);
    }

    public function actionLk()
    {
        $dataProvider = new  ActiveDataProvider(['query' => Order::find()->where(['code_client' => Yii::$app->user->identity->client_id])->with(['status', 'items'])]);
        return $this->render('lk', [

            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAddAdmin()
    {
        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User;
            $user->username = 'admin';
            $user->email = 'admin@кодер.укр';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }
    }
}

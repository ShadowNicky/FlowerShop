<?php

namespace app\controllers;

use app\models\Assortment;
use app\models\AssortmentSearch;
use app\models\Tag;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AssortmenController implements the CRUD actions for Assortment model.
 */
class AssortmenController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()/*поведения заимствованные из стандартных классов*/
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
     * Lists all Assortment models.
     * @return mixed
     */
    public function actionIndex() /*страница по умолчанию - ?r=assortmen/index */
    {
        Url::remember();/*запоминаем текущий адрес*/
        $searchModel = new AssortmentSearch();/*модель для поиска*/
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);/*собственно поиск - навешивание критериев в запрос */

        return $this->render('index', [/*вывод наружу тут указываем какой файл в папке с названием контроллера */
            'searchModel' => $searchModel,/*передаем переменную свежесозданную и заполненную данными с формы модель для поиска*/
            'dataProvider' => $dataProvider,/*и провайдер данных который берет их из базы т к унаследован от класса ActiveDataProvider */
        ]);
    }

    /**
     * Lists all Assortment models.
     * @return mixed
     */
    public function actionByTag($tagname)
    {
        Url::remember();
        $tag = Tag::find()->where(['name' => $tagname])->one();/*ищем тег по имени - это создаст правильный запрос добавит условие экранирует вставленные данные выполнит его разберет ответ и заполнит класс данными */
        if (!$tag)/*если не нашли выбрасываем исключение с кодом ответа 404 т е конкретно это исключение с таким названием генерит код ответа сервера = 404*/
            throw new NotFoundHttpException ('' . $tagname);

        $searchModel = new AssortmentSearch();/*опять создаем модель для поиска */
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);/*ищем*/
        if ($tag) {/*нашелся тег по переданному через адрес параметру tagname */

            $dataProvider->query->andFilterWhere(['tag.id' => $tag->id]);/* добавляем в запрос критерий поиска по ид тега который нашли по названию выше */

        }


        return $this->render('index', [/* рендрим index.php*/
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assortment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Url::remember();/*запоминаем адрес */
        return $this->render('view', [/*сразу рендрим */
            'model' => $this->findModel($id),/*передаём модель которую ищем в другом методе findModel*/
        ]);
    }

    /**
     * Finds the Assortment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assortment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assortment::findOne($id)) !== null) {/*выполняет запрос к базе разбор значений заполнение ими специального класса и возвращает это класс */
            return $model;
        }
        /*а вот если модеьл не нашел то ошибка */
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new Assortment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()/* страница создания */
    {
        $model = new Assortment();/* создаём пустой класс модели */

        if ($model->load(Yii::$app->request->post()) && $model->save()) {/*заполняем пустой класс данными с формы вызываем проверку и если все ок то сохраняем */
            return $this->redirect(['view', 'id' => $model->code_product]);/*если сохранилось у нас есть ид свежесозданной записи по этому переадресуем на страницу просмотра эой записи пеедав в адрес id */
        }

        return $this->render('create', [/*если данных еще не отправлено или были ошибки на форме то заново отображаем ее */
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Assortment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);/*ищет модель */

        if ($model->load(Yii::$app->request->post()) && $model->save()) {/*получает проверяет сохраняет данные с формы */
            return $this->redirect(['view', 'id' => $model->code_product]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Assortment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)/*удаляет строчку в базе из таблицы assortmen */
    {
        $this->findModel($id)->delete();/* снвачала создаем т модель заполняет данными а потом вызывает метод delete который в итоге выполняет запрос DELETE FROM tablename WHERE id=*/

        return $this->redirect(['index']);/* запись удалена по этому можем направить только на страницу со всеми записями */
    }
}

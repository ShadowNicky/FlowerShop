<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Url;

/**
 * This is the model class for table "order".
 *
 * @property int $created создан
 * @property int $updated обнавлен
 * @property int $code_order ID заказа
 * @property int $code_client ID клиента
 * @property int $status
 *
 * @property Client $codeClient
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated', 'code_client', 'status'], 'required'],
            [['created', 'updated', 'code_client', 'status'], 'integer'],
            [['code_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['code_client' => 'code_client']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('UNIX_TIMESTAMP()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'created' => 'создан',
            'updated' => 'обнавлен',
            'code_order' => 'ID заказа',
            'code_client' => 'ID клиента',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[CodeClient]].
     *
     * @return ActiveQuery
     */
    public function getCodeClient()
    {
        return $this->hasOne(Client::class, ['code_client' => 'code_client']);
    }

    /**
     * Gets query for [[OrdStatus]].
     *
     * @return ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrdStatus::class, ['id_status' => 'status']);
    }

    public function getOrdStatus()
    {
        return $this->hasOne(OrdStatus::class, ['id_status' => 'status']);
    }

    public function getItems()
    {
        return $this->hasMany(Assortment::class, ['code_product' => 'code_order'])
            ->viaTable('order_items', ['code_order' => 'code_order']);
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['code_order' => 'code_order']);
    }

    public function createorder($args)
    {
        extract($args);

        $_SESSION['basket'] = $_SESSION['basket'] ?? [];
        $All = Assortment::find()->where(['code_product' => Array_keys($_SESSION['basket'])])->indexBy('code_product')->all();
        $order = new Order(['created' => time(), 'updated' => time(), 'code_client' => $args['client']->code_client, 'status' => 1]);
        $savedorder = $order->save();
        foreach ($_SESSION['basket'] as $index => $item) {
            $order_items = new OrderItems(['code_order' => $order->code_order, 'code_product' => $index, 'quantity' => $item]);

            /** @var Client $client */
            $un = $client->number;
            $model = User::find()->where(['username' => $un])->one();
            if (empty($model)) {
                $user = new User(['client_id' => $args['client']->code_client]);
                $user->username = $un;
                $user->email = $client->e_mail;
                $user->setPassword('admin');
                $user->generateAuthKey();
                if ($saveduser = $user->save()) {
                    Yii::$app->user->login($user);

                }
            }
            $savedorderitems = $order_items->save();
        }
        if ($savedorder && $saveduser && $savedorderitems) {
            Yii::$app->session->setFlash('success', "заказ создан");
            Yii::$app->controller->goBack(Url::previous());
        } else {
            Yii::$app->session->setFlash('danger', "ошибка  создания заказа");
        }

    }

    public function detail()
    {
        $all = $this->orderItems;
        foreach ($all as $index => $item) {
            $list [$index . '#' . $item->assortment->name . ' ' . $item->quantity . '&times;' . $item->assortment->price] = intval($item->quantity) * intval($item->assortment->price);
        }
        return $list;
    }

    public function itogo()
    {
        $detail = $this->detail();
        return array_sum($detail);

    }

}

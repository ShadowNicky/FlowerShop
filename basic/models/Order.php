<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "order".
 *
 * @property int $code_order ID заказа
 * @property int $code_client ID клиента
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
            [['code_client'], 'required'],
            [['code_client'], 'integer'],
            [['code_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['code_client' => 'code_client']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code_order' => 'ID заказа',
            'code_client' => 'ID клиента',
        ];
    }

    /**
     * Gets query for [[CodeClient]].
     *
     * @return ActiveQuery
     */
    public function getCodeClient()
    {
        return $this->hasOne(Client::className(), ['code_client' => 'code_client']);
    }

    public function createorder()
    {
        $_SESSION['basket'] = $_SESSION['basket'] ?? [];
        $All = Assortment::find()->where(['code_product' => Array_keys($_SESSION['basket'])])->indexBy('code_product')->all();
        $order = new  Order([]);
        $order->save();
        foreach ($_SESSION['basket'] as $index => $item) {
            $order_items = new  OrderItems(['code_order' => $order->code_order, 'code_product' => $index, 'quantity' => $item]);


            $order_items->save();
        }
        $this->goBack(Url::previous());


    }
}
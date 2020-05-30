<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property int $code_order
 * @property int $code_product
 * @property int $quantity
 */
class OrderItems extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_order', 'code_product', 'quantity'], 'required'],
            [['code_order', 'code_product', 'quantity'], 'integer'],
        ];
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['code_order' => 'code_order']);
    }

    public function getAssortment()
    {
        return $this->hasOne(Assortment::className(), ['code_product' => 'code_product']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code_order' => 'Code Order',
            'code_product' => 'Code Product',
            'quantity' => 'Quantity',
        ];
    }
}

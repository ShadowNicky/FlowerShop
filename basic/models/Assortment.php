<?php

namespace app\models;

/**
 * This is the model class for table "assortmen".
 *
 * @property int $code_product ID продукта
 * @property string $name Наименование
 * @property int $code_type ID типа
 * @property string $price Цена
 * @property string $quantity Количество на складе
 *
 * @property Typeflower $codeType
 * @property Order[] $orders
 */
class Assortment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assortmen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code_type', 'price', 'quantity'], 'required'],
            [['code_type'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['price', 'quantity'], 'string', 'max' => 60],
            [['code_type'], 'exist', 'skipOnError' => true, 'targetClass' => Typeflower::className(), 'targetAttribute' => ['code_type' => 'code_type']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code_product' => 'Code Product',
            'name' => 'Name',
            'code_type' => 'Code Type',
            'price' => 'Price',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[CodeType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodeType()
    {
        return $this->hasOne(Typeflower::className(), ['code_type' => 'code_type']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['code_product' => 'code_product']);
    }
}

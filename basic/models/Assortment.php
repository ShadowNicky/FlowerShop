<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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
class Assortment extends ActiveRecord
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
            'code_product' => 'код  продукта',
            'name' => 'Название',
            'code_type' => 'Тип',
            'price' => 'Стоимость',
            'quantity' => 'остаток на складе',
        ];
    }

    /**
     * Gets query for [[CodeType]].
     *
     * @return ActiveQuery
     */
    public function getCodeType()
    {
        return $this->hasOne(Typeflower::className(), ['code_type' => 'code_type']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['code_product' => 'code_product']);
    }

    public function getPhotoSrc()
    {
        return $this->photo ? Yii::getAlias('@web') . '/img/' . rawurlencode($this->photo) : '';
    }
}

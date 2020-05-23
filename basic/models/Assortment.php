<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assortment".
 *
 * @property int $code_product
 * @property string $name
 * @property int $code_type
 * @property int $price
 * @property resource|null $picture
 * @property int $quantity
 *
 * @property Typeflower $codeType
 */
class Assortment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assortment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code_type', 'price', 'quantity'], 'required'],
            [['code_type', 'price', 'quantity'], 'integer'],
            [['picture'], 'string'],
            [['name'], 'string', 'max' => 11],
         //   [['code_type'], 'exist', 'skipOnError' => true, 'targetClass' => Typeflower::className(), 'targetAttribute' => ['code_type' => 'code_type']],
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
            'picture' => 'Picture',
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
}

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
 * @property string $photo путь к картинке
 * @property string $price Цена
 * @property string $quantity Количество на складе
 * @property int $code_type ID типа
 *
 * @property Typeflower $codeType
 * @property AssortmenTags[] $assortmenTags
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
            [['name', 'photo', 'price', 'quantity', 'code_type'], 'required'],
            [['code_type'], 'integer'],
            [['name', 'photo'], 'string', 'max' => 255],
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
            'code_product' => 'ID продукта',
            'name' => 'Наименование',
            'photo' => 'путь к картинке',
            'price' => 'Цена',
            'quantity' => 'Количество на складе',
            'code_type' => 'ID типа',
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
     * Gets query for [[AssortmenTags]].
     *
     * @return ActiveQuery
     */
    public function getAssortmenTags()
    {
        return $this->hasMany(AssortmenTags::className(), ['id_assortmen' => 'code_product']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'id_tag'])
            ->viaTable('assortmen_tags', ['id_assortmen' => 'code_product']);
    }

    public function getPhotoSrc()
    {
        return $this->photo ? Yii::getAlias('@web') . '/img/' . rawurlencode($this->photo) : '';
    }
}

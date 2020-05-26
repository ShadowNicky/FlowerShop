<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "typeflower".
 *
 * @property int $code_type ID типа
 * @property string $category Категория
 * @property string $description Описание
 *
 * @property Assortmen[] $assortmens
 */
class Typeflower extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'typeflower';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'description'], 'required'],
            [['category'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code_type' => 'Code Type',
            'category' => 'Category',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Assortmens]].
     *
     * @return ActiveQuery
     */
    public function getAssortmens()
    {
        return $this->hasMany(Assortmen::className(), ['code_type' => 'code_type']);
    }
}

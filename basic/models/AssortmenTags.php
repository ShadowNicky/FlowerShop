<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "assortmen_tags".
 *
 * @property int $id
 * @property int $id_assortmen
 * @property int $id_tag
 *
 * @property Assortment $assortmen
 * @property Tag $tag
 */
class AssortmenTags extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assortmen_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_assortmen', 'id_tag'], 'required'],
            [['id_assortmen', 'id_tag'], 'integer'],
            [['id_assortmen'], 'exist', 'skipOnError' => true, 'targetClass' => Assortment::className(), 'targetAttribute' => ['id_assortmen' => 'code_product']],
            [['id_tag'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['id_tag' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_assortmen' => 'Id Assortmen',
            'id_tag' => 'Id Tag',
        ];
    }

    /**
     * Gets query for [[Assortmen]].
     *
     * @return ActiveQuery
     */
    public function getAssortmen()
    {
        return $this->hasOne(Assortment::className(), ['code_product' => 'id_assortmen']);
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'id_tag']);
    }
}

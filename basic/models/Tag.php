<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "tag".
 *
 * @property int $id ид  тега
 * @property int $created создан
 * @property int $updated обновлен
 * @property string $name название тега
 *
 * @property AssortmenTags[] $assortmenTags
 */
class Tag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[/*'created', 'updated',*/ 'name'], 'required'],
            [['created', 'updated'], 'integer'],
            [['name'], 'string', 'max' => 1500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ид  тега',
            'created' => 'создан',
            'updated' => 'обновлен',
            'name' => 'название тега',
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
     * Gets query for [[AssortmenTags]].
     *
     * @return ActiveQuery
     */
    public function getAssortmenTags()
    {
        return $this->hasMany(AssortmenTags::className(), ['id_tag' => 'id']);
    }
}

<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "order_status".
 *
 * @property int $id_status
 * @property string $name название  статуса
 */
class OrdStatus extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_status' => 'Id Status',
            'name' => 'название  статуса',
        ];
    }
}

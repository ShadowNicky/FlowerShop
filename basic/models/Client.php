<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "client".
 *
 * @property int $code_client ID клиента
 * @property string $full_name ФИО
 * @property string $address Адрес
 * @property int $number Номер телефона
 * @property string $e-mail e-mail
 *
 * @property Order[] $orders
 */
class Client extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'address', 'number', 'e_mail'], 'required'],
            [['number'], 'integer'],
            [['full_name', 'address'], 'string', 'max' => 25],
            [['e-mail'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code_client' => 'ID клиента',
            'full_name' => 'ФИО',
            'address' => 'Адрес',
            'number' => 'Номер телефона',
            'e_mail' => 'e-mail',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['code_client' => 'code_client']);
    }
}

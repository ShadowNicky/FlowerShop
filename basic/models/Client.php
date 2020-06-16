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
 * @property string $e_mail e-mail
 *
 * @property Order[] $orders
 */
class Client extends ActiveRecord
{
    public $create_account;
    public $password;
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
            ['create_account', 'safe'],
            [['full_name', 'address', 'number', 'e_mail'], 'required'],
            [['password'], 'required', 'whenClient' => "function(a, v){debugger;return  $('#chekout-box').prop('checked')}"],
            ['number', 'match', 'pattern' => '/^(\+7)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/', 'message' => 'Телефона, должно быть в формате 8(XXX)XXX-XX-XX'],
            ['password', 'match', 'pattern' => '/^.{3,16}$/', 'message' => 'пароль   должно быть длинной  3-16 символов',],
            [['number'], 'filter', 'filter' => function ($value) {
                return str_replace(['(', ')', '-'], '', $value);
            }],
            [['full_name', 'address'], 'string', 'max' => 25],
            [['e_mail'], 'email'],

            ['e_mail', 'unique', 'targetClass' => User::class, 'targetAttribute' => ['e_mail' => 'email']],
            ['number', 'unique', 'targetClass' => User::class, 'targetAttribute' => ['number' => 'username']],

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

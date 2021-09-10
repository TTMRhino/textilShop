<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $mailindex
 * @property string|null $city
 * @property string|null $adress
 * @property string|null $comments
 * @property string $data
 * @property string|null $status
 * @property int|null $orders_id
 *
 * @property Orders[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'safe'],
            [['orders_id'], 'integer'],
            [['name', 'status'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 15],
            [['mailindex'], 'string', 'max' => 20],
            [['city', 'adress'], 'string', 'max' => 30],
            [['comments'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'mailindex' => 'Mailindex',
            'city' => 'City',
            'adress' => 'Adress',
            'comments' => 'Comments',
            'data' => 'Data',
            'status' => 'Status',
            'orders_id' => 'Orders ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['customers_id' => 'id']);
    }
}

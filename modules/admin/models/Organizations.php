<?php

namespace app\modules\admin\models;

use Yii;
use app\models\User;
/**
 * This is the model class for table "organizations".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $inn
 * @property string|null $ogrn
 * @property string|null $kpp
 * @property string|null $adres_registr
 * @property string|null $adres_fact
 * @property string|null $pay_account
 * @property string|null $kor_account
 * @property string|null $bik_bank
 * @property string|null $bank_name
 * @property int|null $discount
 *
 * @property User $user
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'discount'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['inn', 'ogrn', 'kpp'], 'string', 'max' => 50],
            [['adres_registr', 'adres_fact', 'pay_account', 'kor_account', 'bik_bank', 'bank_name'], 'string', 'max' => 250],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'inn' => 'Inn',
            'ogrn' => 'Ogrn',
            'kpp' => 'Kpp',
            'adres_registr' => 'Adres Registr',
            'adres_fact' => 'Adres Fact',
            'pay_account' => 'Pay Account',
            'kor_account' => 'Kor Account',
            'bik_bank' => 'Bik Bank',
            'bank_name' => 'Bank Name',
            'discount' => 'Discount',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserEmail($id)
    {        
       $email= User::findOne(['id'=> $id])->email;        
       return $email;
    }
}

<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "org_buy_hist".
 *
 * @property int $id
 * @property int|null $item_id
 * @property int|null $price
 * @property int|null $Quantity
 * @property string|null $date
 * @property int|null $id_organization
 *
 * @property Items $item
 * @property Organizations $organization
 */
class OrgBuyHist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_buy_hist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'price', 'Quantity', 'id_organization'], 'integer'],
            [['date'], 'safe'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['item_id' => 'id']],
            [['id_organization'], 'exist', 'skipOnError' => true, 'targetClass' => Organizations::className(), 'targetAttribute' => ['id_organization' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'price' => 'Price',
            'Quantity' => 'Quantity',
            'date' => 'Date',
            'id_organization' => 'Id Organization',
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'item_id']);
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'id_organization']);
    }
}

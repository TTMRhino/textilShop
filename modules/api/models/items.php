<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string|null $vendor
 * @property string|null $maingroup_id
 * @property string|null $subgroup_id
 * @property string|null $item
 * @property float|null $price
 * @property float|null $pur_price
 * @property string|null $description
 * @property float|null $old_price
 * @property int $top_product
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'pur_price', 'old_price'], 'number'],
            [['description'], 'string'],
            [['top_product'], 'integer'],
            [['vendor'], 'string', 'max' => 20],
            [['maingroup_id', 'subgroup_id', 'item'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor' => 'Vendor',
            'maingroup_id' => 'Maingroup ID',
            'subgroup_id' => 'Subgroup ID',
            'item' => 'Item',
            'price' => 'Price',
            'pur_price' => 'Pur Price',
            'description' => 'Description',
            'old_price' => 'Old Price',
            'top_product' => 'Top Product',
        ];
    }
}

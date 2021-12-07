<?php

namespace app\modules\admin\models;

use Yii;



/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string|null $vendor
 * @property string|null $maingroup_id
 * @property string|null $subgroup_id
 * @property string|null $subgroup_1с
 * @property string|null $maingroup_1с
 * @property string|null $code1c
 * @property string|null $item
 * @property float|null $price
 * @property float|null $pur_price
 * @property string|null $description
 * @property float|null $old_price
 * @property int $top_product
 * @property int $remains
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
            //[['price'], 'number'],
            [['subgroup_1с','maingroup_1с','code1c','pur_price', 'old_price','price','top_product','description','vendor','maingroup_id', 'subgroup_id', 'item'],'safe'],
            ['remains','integer'] ,
            //[['description'], 'string'],
            //[['top_product','remains'], 'integer'],
            //[['vendor'], 'string', 'max' => 20],
            //[['maingroup_id', 'subgroup_id', 'item'], 'string', 'max' => 200],
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
            'remains' => 'Remains'
        ];
    }


    public function getImageVendor()
    {
       return str_replace('/','',$this->vendor);
    }


   
}

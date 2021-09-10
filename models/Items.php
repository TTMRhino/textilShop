<?php

namespace app\models;

use yii\db\ActiveRecord;

class Items extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'items';
    }

    public function rules()
    {

        return [
            
            [['vendor','maingroup_id','subgroup_id','item'], 'required'],
            [['vendor','maingroup_id','subgroup_id','item'],'string','max'=> 150],
            [['pur_price','price','old_price'],'double','min'=> 0, 'max'=>9999999],
            ['description','string','length' =>[0, 500]],
            [['remains'],'integer']          
           
        ];
    }


    public function getCategory()
    {
        return $this->hasOne(Category::class,['id'=>'maingroup_id']);
    }

    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::class,['id'=>'subgroup_id']);
    }

    /** получение артикула (vendor) без слешей */
    public function getVendorClear()
    {
        $clearVendor = str_replace('/', '', $this->vendor); 
        return $clearVendor;
    }
    
    public function getImageVendor()
    {
       return str_replace('/','',$this->vendor);
    }

    

}
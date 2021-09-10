<?php

namespace app\models;

use yii\db\ActiveRecord;

class SubCategory extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'sub_group';
    }

    public function rules()
    {

        return [
            
            ['title', 'required'],
            [['title'],'string','max'=> 150],          
           
        ];
    }

}
<?php

namespace app\modules\api\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'main_group';
    }

    public function rules()
    {

        return [
            
            ['title', 'required'],
            [['title'],'string','max'=> 150],          
           
        ];
    }

}
<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Category;

use Yii;

/**
 * This is the model class for table "sub_group".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $maingroup_id
 * @property string|null $code1c
 * @property string|null $maingroup_1c
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['maingroup_id'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['code1c','maingroup_1c'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'maingroup_id' => 'Maingroup ID',
        ];
    }

    public function getCategory()
    {      
        return $this->hasOne(Category::class, ['maingroup_id'=>'id']);
    }

    public function getCategoryTitle($id)
    {        
       $title = Category::findOne(['id'=> $id])->title;        
       return $title;
    }

    
}

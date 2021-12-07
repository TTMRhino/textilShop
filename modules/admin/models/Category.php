<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "main_group".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $descrption
 * @property string|null $key_words
 * @property string|null $code1c
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 150],
            [['descrption', 'key_words'], 'string', 'max' => 500],
            ['code1c','safe']
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
            'descrption' => 'Descrption',
            'key_words' => 'Key Words',
        ];
    }
}

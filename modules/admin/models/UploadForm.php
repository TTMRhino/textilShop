<?php

namespace app\modules\admin\models;


use yii\base\Model;
use yii\web\UploadedFile;


class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xml'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            //var_dump($this->file->tempName);die;
            
            //$this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return $this->nomenclatureToBd($this->file->tempName);
        } else {
            return false;
        }
    }

    public function nomenclatureToBd($xmlFile)
    {
        $xml = simplexml_load_file($xmlFile);

        
       //Main groups
        foreach ($xml->Классификатор->Группы->Группа as $Group){
            $findMainGeoup = null;
            $mainGroupId = null;
            $findMainGeoup = Category::findOne(['code1c' => $Group->Ид]);
          
            //если findMainGeoup null => группы не существет. Создаем и записываем новую группу
            if(is_null($findMainGeoup)){
              //  debug($Group->Наименование,true);
                $main_group = new Category();
                $main_group->title = $Group->Наименование;
                $main_group->code1c = $Group->Ид;
                $main_group->save(false);

                $mainGroupId = $main_group->id;
                $mainGroup1c =  $main_group->code1c;
            }   
            
            
             //Sub groups
            foreach ($xml->Классификатор->Группы->Группа->Группы->Группа as $key=>$Group){
                $findSubGroup = null;
                $findSubGroup = SubCategory::findOne(['code1c' => $Group->Ид]);

                //если findSubGroup null => группы не существет. Создаем и записываем новую группу
                if(is_null($findSubGroup)){
                   
                    $sub_group = new SubCategory();
                    $sub_group->title = $Group->Наименование;
                    $sub_group->code1c = $Group->Ид;
                    $sub_group->maingroup_id = $mainGroupId;
                    $sub_group->maingroup_1c = $mainGroup1c;
                    $sub_group->save(false);
                }                    
            }
          
        }

       

        
        //Items

        foreach ($xml->Каталог->Товары->Товар as $key=>$item){
            $findItem = null;
            $findItem = Items::findOne(['code1c' => $item->Ид]);

             //ИдКлассификатора - это main_group товара (прекреп)

             if(is_null($findItem)){

                $main_groupID = Category::findOne(['code1c' => $item->Группы->Ид]);
                $sub_groupID = SubCategory::findOne(['code1c' => $item->Группы->Ид]);

                $new_item = new Items();
                $new_item->item= $item->Наименование;
                $new_item->code1c = $item->Ид;

                $new_item->maingroup_id =  $main_groupID->id;
                $new_item->subgroup_id = $sub_groupID->id;

                $new_item->maingroup_1c = $main_groupID->code1c;
                $new_item->subgroup_1c = $sub_groupID->code1c;

                $new_item->description = $item->Описание;                
                $new_item->price = null;
                $new_item->remains = null;
                $new_item->vendor =  $item->Штрихкод;
                $new_item->save(false);
             }

                   
        }

      

        
       //die();
    }
}
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
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            //var_dump($this->file->tempName);die;
            
            //$this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            return $this->priceToBd($this->file->tempName);
        } else {
            return false;
        }
    }

    public function priceToBd($xmlFile)
    {
       
        
        
        if ( $xlsx = SimpleXLSX::parse($xmlFile) ) {

            //var_dump($xlsx);die;
            
            $mainGroupId =0;
            $subGroupId =0;
        
           
            $message=[];
        
            foreach($xlsx->rows() as $row){
                
                if ($row[1] ==="Группа" ){
                    
                  $findCategory = Category::findOne(['title' => $row[0]]);
                    
                    if (is_null($findCategory)){
                        //die('Нет такой сточки');
                        $main_group = new Category();
                        $main_group->title = $row[0];
                        $main_group->save();

                        $mainGroupId = $main_group->id;
                        array_push($message, " <h3>Группа $row[0] добавлена в БД. </h3>");
                    }else{
                        
                        //array_push($message," <h3 style='color:red'>Группу $row[0] пропускаем. </h3>");
                        $mainGroupId =  $findCategory->id;
                    }                    
                   
        
                }elseif(empty($row[1])){       

                    $findSubCategory = SubCategory::findOne(['title' => $row[0]]);

                    if (is_null($findSubCategory)){
                        $sub_group = new SubCategory();
                        $sub_group->title = $row[0];
                        $sub_group->maingroup_id = $mainGroupId;
                        $sub_group->save();

                        $subGroupId = $sub_group->id;
                        array_push($message, "<h4>Под - Группа $row[0] добавлена в БД. </h4>");
                    }else{
                        //array_push($message, "<h4 style='color:red' >Под - Группу $row[0] пропускаем. </h4>");
                        $subGroupId =   $findSubCategory->id;
                    }                   
                    
                }else{                   
                   
                    $findItem = Items::findOne(['item' => $row[0]]);
                    if (is_null($findItem)){
                        $item = new Items();
                        $item->vendor = $row[1];
                        $item->maingroup_id = $mainGroupId;
                        $item->subgroup_id = $subGroupId;
                        $item->item = $row[0];
                        $item->price = $row[2];
                        $item->pur_price = $row[2];
                        $item->old_price = $row[2];
                        $item->save();
        
                        array_push($message, "<p>товар $row[0] добавлен  </p>");
                    }else{
                        if($findItem->price <> $row[2]){
                            array_push($message, "<p style='color:green'>товар $row[0] - Цена изменена (c $findItem->price на $row[2]).  </p>");
                            
                            $findItem->old_price = $findItem->price;
                            $findItem->price = $row[2];
                            $findItem->update();

                            
                        }
                        
                        //array_push($message, "<p style='color:green'>товар $row[0] пропускаем.  </p>");
                    }

                    
                }
              
            }
        
            array_push($message, "<h2> Готово </h2>");
        
            /*echo "<pre>";
            print_r( $xlsx->rows() );
            echo "</pre>";*/
            return $message;         
            
        } else {
            echo SimpleXLSX::parseError();
            \Yii::$app->session->setFlash('error_uploaded', "Ошибка! Что то пошло не так. ");
            return false;
        }
    }
}
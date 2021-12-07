<?php

namespace app\modules\admin\models;


use yii\base\Model;
use yii\web\UploadedFile;


class UploadPriceForm extends Model
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
            return $this->priceToBd($this->file->tempName);
        } else {
            return false;
        }
    }

    public function priceToBd($xmlFile)
    {

        
        $xml = simplexml_load_file($xmlFile);
        
        foreach ($xml->ПакетПредложений->Предложения->Предложение as $item){
            
           //8f38fd0b-8d5a-11e7-8f42-50465d54779c - это тип(Ид) розничной цены в прайсе
           //ИдТипаЦены
           $price = null;
            //отбираем только розничную цену в списке цен (их по прйсу 3 типа)
            foreach($item->Цены->Цена as $typePrice){
                if($typePrice->ИдТипаЦены == '8f38fd0b-8d5a-11e7-8f42-50465d54779c'){
                    $price =  $typePrice->ЦенаЗаЕдиницу;
                }
            }
          

            
            $findItem = Items::findOne(['code1c' => $item->Ид]);

             //ИдКлассификатора - это main_group товара (прекреп)
            if(!is_null($findItem)){                                   
               $findItem->price = $price;                   
               $findItem->save(false);
            }
              
             

                   
        }

       

  
    }
}
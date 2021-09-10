<?
namespace app\controllers;

use app\models\Category;
use app\models\SubCategory;
use app\models\Items;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{
   
    /**Продкт */

    public function actionView($vendor)    
    {
        $item = Items::findOne(['vendor'=>$vendor]);

        if(empty($item)){
            throw new  NotFoundHttpException('Такого продукта нет...');
        }

        $this->setMeta("{$item->item}::".\Yii::$app->name, null , $item->description);

        return $this->render('view',compact('item'));
    }
}
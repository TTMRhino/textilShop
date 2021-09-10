<?
namespace app\controllers;

use app\models\Category;
use app\models\SubCategory;
use app\models\Items;
use yii\data\Pagination;

class ShopController extends AppController
{
    public function actionIndex($categoryid = null,$subgroup_id = null, $sort = 'price', $type_sort= SORT_DESC)
    {       
        $type_sort = $type_sort =='ASC'? SORT_ASC : SORT_DESC;
        
        if(is_null($categoryid) && !is_null($subgroup_id)){
            $query = Items::find()->where(['subgroup_id'=>$subgroup_id])->orderBy([$sort => $type_sort]);// ищем подгруппы  

            $categoryOne =  SubCategory::find()->where(['id'=>$subgroup_id])->one();
            $this->setMeta("{$categoryOne->title}::".\Yii::$app->name);         

        }elseif(!is_null($categoryid) && is_null($subgroup_id)){
            $query = Items::find()->where(['maingroup_id'=>$categoryid])->orderBy([$sort => $type_sort]);  //ищем группы
            
            $categoryOne =  Category::find()->where(['id'=>$categoryid])->one();
            $this->setMeta("{$categoryOne->title}::".\Yii::$app->name, $categoryOne->key_words, $categoryOne->descrption);
        }else{            
            $query = Items::find()->orderBy([$sort => $type_sort]); //ищем ВСЕ
        }    

        
        $pages = new Pagination([ 'totalCount'=> $query->count(), 'pageSize'=>12,'forcePageParam'=>false, 'pageSizeParam'=>false ]);
        $items = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('index',compact('items','pages','categoryid','subgroup_id','sort'));
    }

    public function actionView($subgroup_id)
    {
        $categoryOne =  Category::find()->where(['subgroup_id'=>$subgroup_id])->one();

       
        $this->setMeta("{$categoryOne->title}::".\Yii::$app->name, $categoryOne->key_words, $categoryOne->descrption);      
        
        return $this->render('index', compact('category','subCategory'));
    }


    /** Поиск */

    public function actionSearch()
    {
        $q = trim(\Yii::$app->request->get('q'));
        
        if(!$q){
            return $this->render('search');
        }
        $query = Items::find()->where(['like', 'item',$q]);
        $pages = new Pagination([ 'totalCount'=> $query->count(), 'pageSize'=>12,'forcePageParam'=>false, 'pageSizeParam'=>false ]);
        $items = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search',compact('items','pages','q'));
    }


    /**Продкт */

    public function actionProduct($vendor)    
    {
        $item = Items::findOne(['vendor'=>$vendor]);

        return $this->render('product',compact('item'));
    }
}
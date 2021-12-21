<?
namespace app\components;

use yii\base\Widget;
use app\models\Category;
use app\models\SubCategory;
use yii\helpers\Html;
use yii\helpers\Url;

class CategoryWidget extends Widget
{
    public $tpl;
    public $ul_class;
    public $menuHtml;
    public $category;
    public $sub_category;


    public function init()
    {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .='.php';
    }

    public function run()
    {       //забераме инфо из кэша
       /* $categoryWidget = \Yii::$app->cache->get('categoryWidget');

        if($categoryWidget){
            return $categoryWidget;
        }*/

        $this->menuHtml  = $this->getMenuHtml();
        
        //если кэша нет - записываем все в кэш

        \Yii::$app->cache->set('categoryWidget',$this->menuHtml, 86400);//86400

        return $this->menuHtml;
    }

    protected function getMenuHtml()
    {
        $category = Category::find()->select('id, title')->all();
        

        $str ='<div class="single-sidebar">
                    <div class="group-title">
                        <h2>categories</h2>
                    </div>
                    <ul>
                ';

        foreach($category as $mainGroup){   
            
            
            $sub_category = SubCategory::findAll([ 'maingroup_id' => $mainGroup->id ]);
            
            if(empty($sub_category)){
                $str .= '<ul class="middle-menu-list menuSideBar">
                <li><a href="'. Url::to([ 'index','maingroup_id' => $mainGroup->id ]) .'">
                '. $mainGroup->title .'</a>';
            }else{
                $str .= '<ul class="middle-menu-list menuSideBar">
                <li><a href="'. Url::to([ 'index','maingroup_id' => $mainGroup->id ]) .'">
                '. $mainGroup->title .'<i class="fa fa-angle-down"></i></a>                        
                <ul class="ht-dropdown dropdown-style-one">   ';

                foreach($sub_category as $subGroup){
                    if($subGroup->maingroup_id == $mainGroup->id){
                       $str .= '<li> <a href="'. Url::to([ 'index','subgroup_id' => $subGroup->id ]) .'">'. $subGroup->title .'</a></li>';
                    }
                }
            }
            
               
            
                
           /* foreach($sub_category as $subGroup){
                if($subGroup->maingroup_id == $mainGroup->id){
                   $str .= '<li> <a href="'. Url::to([ 'index','subgroup_id' => $subGroup->id ]) .'">'. $subGroup->title .'</a></li>';
                }
            }*/
            $str .='</ul> </li> </ul> </ul>';
        }

        $str .='</ul>
        </div>';

        return $str;
    }
  
}
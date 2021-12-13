<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Items;
use app\modules\admin\models\ItemsSearch;
use app\modules\admin\controllers\AppAdminController;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use app\modules\admin\models\SubCategory;


use app\modules\admin\models\UploadForm;
use app\modules\admin\models\UploadPriceForm;
use yii\web\UploadedFile;


/**
 * ItemsController implements the CRUD actions for Items model.
 */
class ItemsController extends AppAdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Items();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

  

    /**
     * Deletes an existing Items model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSubgroupByMaingroup($maingroup_id)
    {       
        if(\Yii::$app->request->isAjax){ 
           
            $data = Subcategory::find()->where(['maingroup_id' => $maingroup_id])->all();  
                 
            return $this->renderPartial('dropdown_subcategory',compact('data'));           
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }


     /** Загрузка номенклатуры */
     public function actionUpload()
     {
         $model = new UploadForm();
 
         if (Yii::$app->request->isPost) {
             $model->file = UploadedFile::getInstance($model, 'file');
             if ($message = $model->upload()) {
                 // file is uploaded successfully
                 \Yii::$app->session->setFlash('success_uploaded', "Успешно загружен!...Но это не точно. ");
                
                //return $this->redirect(['upload' => $model]);
                return $this->render('upload', ['model' => $model,'message'=>$message]);               
               
             }
         }
 
         return $this->render('upload', ['model' => $model]);
     }


       /** Загруска цен */

    public function actionUploadPrice()
    {
        $model = new UploadPriceForm();
       

        if (Yii::$app->request->isPost) {
           
            $model->file = UploadedFile::getInstance($model, 'file');
            
            if ($message = $model->upload()) {
                // file is uploaded successfully
                //\Yii::$app->session->setFlash('success_uploaded', "Успешно загружен!...Но это не точно. ");
               
               //return $this->redirect(['upload' => $model]);
               
               return $this->render('upload', ['model' => $model,'message'=>$model->countMessage]);               
              
            }
        }

        if(Yii::$app->request->isAjax){
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return null;
        }

       
        return $this->render('upload', ['model' => $model,'message'=>$model->countMessage]); 
    }
}

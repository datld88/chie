<?php

class NewsController extends AdminController
{
	public function actionIndex()
	{
            $model= new News('search');
            $model->unsetAttributes();
            
            if(isset($_GET['News']))
                $model->attributes=$this->cleanXss($_GET['News']);
            $this->render('index', array('model'=>$model));
	}

	public function actionCreate()
	{
            $model=new News;
            
            if(isset($_POST['News'])){
                
                $model->attributes=$this->cleanXss($_POST['News']);
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/news/view/id/'.$model->id));
            }
            $this->render('create', array('model'=>$model));
	}
        
        public function actionUpdate($id){
            $model=$this->loadModel($id);
            
            if(isset($_POST['News'])){
                $model->attributes=$this->cleanXss($_POST['News']);
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/news/view/id/'.$model->id));
                
            }
            $this->render('update', array('model'=>$model));
        }
        public function actionDelete($id){
            $this->loadModel($id)->delete();
            
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/admin/news'));
        }
        public function actionView($id){
            $model=$this->loadModel($id);
            $this->render('view', array('model'=>$model));
        }
    public function cleanXSS($data){
        $keys=array_keys($data);
        $p = new CHtmlPurifier();
        foreach($keys as $key){
            $data[$key]=$p->purify($data[$key]);
        }
        return $data;
    }
    public function loadModel($id){
        $id=(int)$id;
            $model=News::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404, 'Không tìm thấy Event cần tìm');
            return $model;
        }
}
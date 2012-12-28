<?php

class PublisherController extends AdminController
{
	public function actionCreate(){
            $model = new Publisher;
            
            $this->render('create', array('model'=>$model));
        }
        
        public function actionIndex(){
            $model=new Publisher('search');
            $model->unsetAttributes();
            if(isset($_GET['Publisher']))
                $model->attributes=$_GET['Publisher'];
            $this->render('index', array('model'=>$model));
        }
        
        public function actionView($id){
            
        }
        public function actionDelete($id){
            
        }
        public function actonUpdate($id){
            
        }
        public function loadModel($id){
            $model=Publisher::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404, 'Không tìm thấy trang cần tìm');
            return $model;
        }
}
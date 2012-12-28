<?php

class PublisherController extends AdminController
{
	public function actionCreate(){
            $model = new Publisher;
            if(isset($_POST['Publisher'])){
                $_POST['Publisher']=$this->cleanXSS($_POST['Publisher']);
                $model->attributes=$_POST['Publisher'];
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/publisher/view/id/'.$model->id));
            }
            $this->render('create', array('model'=>$model));
        }
        
        public function actionUpdate($id){
            $id=(int)$id;
            $model=$this->loadModel($id);
            if(isset($_POST['Publisher'])){
                $_POST['Publisher']=$this->cleanXss($_POST['Publisher']);
                $model->attributes=$_POST['Publisher'];
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/publisher/view/id/'.$model->id));
            }
            $this->render('update', array('model'=>$model));
        }
        public function actionIndex(){
            $model=new Publisher('search');
            $model->unsetAttributes();
            if(isset($_GET['Publisher']))
                $model->attributes=$_GET['Publisher'];
            $this->render('index', array('model'=>$model));
        }
        
        public function actionView($id){
            $id=(int)$id;
            $user=Publisher::model()->with('games')->findByPk($id);
            if($user===null)
                throw new CHttpException(404, 'Không tìm thấy nhà phát hành này');
            $this->render('view', array('user'=>$user));
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
        
    public function cleanXSS($data){
        $keys=array_keys($data);
        $p = new CHtmlPurifier();
        foreach($keys as $key){
            $data[$key]=$p->purify($data[$key]);
        }
        return $data;
    }
}
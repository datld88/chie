<?php

class GameController extends AdminController
{
	
	public function actionIndex(){
            $model=new Game('search');
            $model->unsetAttributes();
            
            if(isset($_GET['Game']))
                $model->attributes=$_GET['Game'];
            $this->render('index', array('model'=>$model));
        }
	public function actionCreate()
	{
            $model= new Game;
            if(isset($_POST['Game'])){
                $_POST['Game']=$this->cleanXss($_POST['Game']);
                $model->attributes=$_POST['Game'];
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/game/view/id/'.$model->id));
                
            }
            $this->render('create', array('model'=>$model));
	}
        public function actionUpdate($id){
            $model=$this->loadModel($id);
            if(isset($_POST['Game'])){
                $_POST['Game']=$this->cleanXSS($_POST['Game']);
                $model->attributes=$_POST['Game'];
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/game/view/id/'.$model->id));
                }
            $this->render('update', array('model'=>$model));
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
            $model=Game::model()->findByPk((int)$id);
            if($model===null)
                throw new CHttpException(404, 'Không tìm thấy Game này');
            return $model;
        }
}
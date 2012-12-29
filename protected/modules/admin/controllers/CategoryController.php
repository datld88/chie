<?php

class CategoryController extends AdminController
{
	
	public function actionIndex()
	{
		$model=new GameCategory('search');
                $model->unsetAttributes();
                if(isset($_GET['Category']))
                    $model->attributes=$_GET['Category'];
                
                $this->render('index', array('model'=>$model));
	}

	public function actionCreate()
	{
            $model=new GameCategory;
            
            if(isset($_POST['GameCategory'])){
                $_POST['GameCategory']=$this->cleanXss($_POST['GameCategory']);
                $model->attributes=$_POST['GameCategory'];
                if($model->parent_id==0)
                    unset($model->parent_id);
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/category/view/id/'.$model->id));
            }
            $this->render('create', array('model'=>$model));
	}
        
        public function actionView($id){
            $model=$this->loadModel($id);
            
            $this->render('view', array('model'=>$model));
        }
        public function actionUpdate($id){
            $model=$this->loadModel($id);
            
            if(isset($_POST['GameCategory'])){
                $model->attributes=$this->cleanXSS($_POST['GameCategory']);
                
                if($model->parent_id==0)
                    unset($model->parent_id);
                if($model->save())
                    $this->redirect(Yii::app()->createUrl('/admin/category/view/id/'.$model->id));
            }
            $this->render('update', array('model'=>$model));
        }
        public function actionDelete($id){
            $this->loadModel($id)->delete();
        }
        public function loadModel($id){
            $id=(int)$id;
            $model=  GameCategory::model()->findByPk($id);
            
            if($model===null)
                throw new CHttpException(404, 'Không tìm thấy category vừa rồi');
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
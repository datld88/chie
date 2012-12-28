<?php

class UserController extends AdminController
{   
	public function actionCreate()
	{
            $model=new User;
            if(isset($_POST['User'])){
                //clean xss and remove html tags
                $p=new CHtmlPurifier;
                $_POST['User']['username']=strtolower(strip_tags($p->purify($_POST['User']['username']))); //username in CI
                $_POST['User']['password']=($p->purify($_POST['User']['password']));    //password is case sensitive
                
                $model->attributes=$_POST['User'];
                if($model->save()){
                    $url=Yii::app()->createUrl('/admin/user/view/id/'.$model->id);
                    $this->redirect($url);
                }
            }
            $this->render('create', array('model'=>$model));
	}
        
        public function actionIndex(){
            $model=new User('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['User']))
                $model->attributes=$_GET['User'];
            $this->render('index',array(
                'model'=>$model,
            ));
        }
        
        public function actionView($id){
            $id=(int)$id;
            $user=User::model()->with('userProfile', 'userLogRates', 
                    'logUserPlaygames', 'logUserPayments', 'logUserOthers', 'logComments'
                    )->findByPk($id);
            if($user===null)
                throw new CHttpException(404, 'Không tìm thấy user');
            $this->render('view', array('user'=>$user));
        }
        
        public function actionDelete($id){
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('user/'));
        }
        
        public function actionUpdate($id){
            $model=$this->loadModel($id);
            if(isset($_POST['User'])){
                $p=new CHtmlPurifier;
                $_POST['User']['username']=strtolower(strip_tags($p->purify($_POST['User']['username']))); //username in CI
                $_POST['User']['password']=($p->purify($_POST['User']['password']));    //password is case sensitive
                $model->attributes=$_POST['User'];
                if($model->save()){
                    $url=Yii::app()->createUrl('/admin/user/view/id/'.$model->id);
                    $this->redirect($url);
                }
            }
            $this->render('create', array('model'=>$model));
        }
        
        public function loadModel($id){
            $id=(int)$id;
            $model=User::model()->findByPk($id);
            if($model===null)
                throw new CHttpException(404, 'Không tìm thấy trang yêu cầu');
            return $model;
        }
        
        protected function performAjaxvalidation($model){
            if(isset($_POST['ajax']) && $_POST['ajax']=='user-form'){
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
}
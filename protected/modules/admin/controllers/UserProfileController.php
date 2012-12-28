<?php

//quan ly tat ca user profile

class UserProfileController extends AdminController{
    //override actions() cho viec su dung xupload
    public function actions(){
        return array(
          'upload'=>array(
              'class'=>'xupload.actions.XUploadAction',
              'path'=>Yii::app()->getBasePath()."/../uploads",
              'publicPath'=>Yii::app()->getBaseUrl()."/uploads",
          )  
        );
    }
    public function actionIndex(){
        $model=new UserProfile('search');
        $model->unsetAttributes();  //clear any default values;
        if(isset($_GET['UserProfile']))
            $model->attributes=$_GET['UserProfile'];
        $this->render('index', array('model'=>$model));
        
    }
    
    public function actionView($id){
        echo 'we will redirect you to view userprofile ID: ', (int)$id;
        /*$model=$this->loadModel($id);
        $user_id=$model->user_id;
        $this->redirect(Yii::app()->createUrl('/admin/user/view/id/').$user_id);
         * 
         */
    }
    public function actionCreate(){
        if(!isset($_GET['id']))
        {
            $this->redirect(Yii::app()->createUrl('/admin/user/'));
        }
        //models
        $model = new UserProfile;
        Yii::import("xupload.models.XUploadForm");
        $photos=new XUploadForm;
        
        if(isset($_POST['UserProfile'])){
            //clean xss code
            $_POST['UserProfile']=$this->cleanXss($_POST['UserProfile']);
            $model->attributes=$_POST['UserProfile'];
            
            if($model->save())
                $this->redirect(Yii::app()->createUrl('/admin/user/view/id/'.$model->user_id));
        }
            $user_id=(int)$_GET['id'];
            //tìm thông tin user
            $user=User::model()->findByPk($user_id);
            if($user===null){
                $errorString='Không Tìm Thấy User với ID là '.$user_id;
                throw new CHttpException(404, $errorString);
            }
            
            $this->render('create', array('model'=>$model, 'user'=>$user, 'photos'=>$photos));
    }
    
    public function actionDelete($id){
        $this->loadModel($id)->delete();
        //if ajax request don't redirect
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('userprofile/'));
    }
    public function loadModel($id){
        $id=(int)($id);
        $model=UserProfile::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404, 'Không tìm thấy profile');
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
?>

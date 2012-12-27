<?php

//quan ly tat ca user profile

class UserProfileController extends AdminController{
    
    public function actionIndex(){
        $model=new UserProfile('search');
        $model->unsetAttributes();  //clear any default values;
        if(isset($_GET['UserProfile']))
            $model->attributes=$_GET['UserProfile'];
        $this->render('index', array('model'=>$model));
        
    }
    
    public function actionView(){
        echo 'view user profile here';
        
    }
    public function actionCreate(){
        echo 'create user profile here';
    }
    public function actionDelete(){
        echo 'delete user profile here';
    }
    public function loadModel($id){
        
    }
}
?>

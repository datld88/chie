 <?php

 class DefaultController extends AdminController
{
    
    public function actionIndex()
    {   
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->createUrl('/admin/default/login'));
        }
        $this->render('index');
    }
    
    public function actionLogin(){
        $model=new AdminLoginForm;
        if(isset($_POST['AdminLoginForm'])){
            $p=new CHtmlPurifier;
            $model->username=$p->purify($_POST['AdminLoginForm']['username']);
            $model->password=$p->purify($_POST['AdminLoginForm']['password']);
            $model->rememberMe=$p->purify($_POST['AdminLoginForm']['rememberMe']);
            echo $model->login();
            if($model->validate() && $model->login()){
               $this->redirect(Yii::app()->createUrl('/admin/'));
            }
        }
        $this->renderPartial('login', array('model'=>$model));
    }
    
    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('/admin'));
    }
}
?>
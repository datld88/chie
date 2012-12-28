<h1>Tạo Profile cho User: <?php echo $user->username?></h1>

<!--Generate needed hidden field-->
<?php $this->renderPartial('_form', array('model'=>$model, 'user_id'=>$user->id, 'photos'=>$photos));?>
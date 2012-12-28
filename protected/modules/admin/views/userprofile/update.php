<?php
echo '<h1>Update User Profile cho User: ', $model->full_name, '</h1>';
$this->renderPartial('_form', array('model'=>$model, 'user_id'=>$model->user_id));
?>
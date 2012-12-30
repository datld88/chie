<?php
echo '<h1>Edit News/Event: ', $model->title, '</h1>';
$this->renderPartial('_form', array('model'=>$model));
?>
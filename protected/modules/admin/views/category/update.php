<?php
echo '<h1>Edit Game Category: ', $model->name, '</h1>';
$this->renderPartial('_form', array('model'=>$model));
?>

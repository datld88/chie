<?php $themeAdmin = Yii::app()->getBaseUrl(true) . '/themes/admin/' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Mucsher">

		<!-- Le styles-->
		<link href="<?php echo $themeAdmin ?>/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo $themeAdmin ?>/css/bootstrap-responsive.css" rel="stylesheet">
        </head>
        <body>
            <div id="header">
                <h1 style="text-align:center">ADMINISTRATOR LOGIN</h1>
            </div>

<div class="span8 offset3">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'htmlOptions'=>array('class'=>'form-horizontal'),
        'enableAjaxValidation'=>false,
    ));?>
    
    <?php echo $form->errorSummary($model);?>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'username', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'username');
            echo $form->error($model, 'username');
            echo "</div>";
            ?>
    </div>
    <div class="control-group">
        <?php
            echo $form->labelEx($model, 'password', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->passwordField($model, 'password');
            echo $form->error($model, 'password');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php
            echo '<div class="controls">';
            echo $form->checkBox($model, 'rememberMe');
            echo $form->label($model, 'rememberMe', array('class'=>'checkbox'));
            echo '</div>';
        ?>
    </div>
    <div class="controls">
        <?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-success'));?>
    </div>
    <?php $this->endWidget();?>
</div>
        </body>
</html>
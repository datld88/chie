<div class="span6">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
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
            echo $form->labelEx($model, 'is_admin', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'is_admin', 
                    User::model()->getAdminOptions());
            echo $form->error($model, 'is_admin');
            echo '</div>';
        ?>
    </div>
    <div class="controls">
        <?php echo CHtml::submitButton($model->isNewRecord? 'Create': 'Save', array('class'=>'btn btn-success'));?>
    </div>
    <?php $this->endWidget();?>
</div>
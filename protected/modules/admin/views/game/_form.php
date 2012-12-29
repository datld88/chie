<div class="span6">
    <?php 
        $form=$this->beginWidget('CActiveForm', array(
            'id'=>'game-form',
            'enableAjaxValidation'=>false,
            'htmlOptions'=>array('class'=>'form-horizontal'),
        ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required</p>
    <?php echo $form->errorSummary($model);?>
    
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'name', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'name');
            echo $form->error($model, 'name');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'publisher_id', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'publisher_id', Publisher::listPublishers());
            echo $form->error($model, 'publisher_id');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'short_description', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textArea($model, 'short_description');
            echo $form->error($model, 'short_description');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'full_description', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textArea($model, 'full_description');
            echo $form->error($model, 'full_description');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'released_at', array('class'=>'control-label'));
            echo '<div class="controls">';
            $this->widget('zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model'=>$model,
                        'attribute'=>'released_at',
                        'options'=>array(
                            'dateFormat'=>'yy-mm-dd',
                            'changeMonth'=>'true',
                            'changeYear'=>'true',
                            'yearRange'=>'-70:+0',
                            'showButtonPanel'=>'true',
                            'constraintInput'=>'true',
                            'duration'=>'fast',
                            'showAnim'=>'slide',
                        ),
                    ));
            echo $form->error($model, 'released_at');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'is_hot', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->checkBox($model, 'is_hot');
            echo $form->error($model, 'is_hot');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'is_featured', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->checkBox($model, 'is_featured');
            echo $form->error($model, 'is_featured');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'rate_point', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'rate_point');
            echo $form->error($model, 'rate_point');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'playnow_title', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'playnow_title');
            echo $form->error($model, 'playnow_title');
            echo '</div>';
        ?>
    </div>
    <div class="controls">
        <?php echo CHtml::submitButton($model->isNewRecord? 'Create' : 'Save', array('class'=>'btn btn-success'));?>
    </div>
    <?php $this->endWidget();?>
</div>
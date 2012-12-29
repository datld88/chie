<div class="span6">
    <?php 
        $form=$this->beginWidget('CActiveForm', array(
            'id'=>'category-form',
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
            echo $form->labelEx($model, 'parent_id', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'parent_id', 
                    GameCategory::getCategoryList(), array('empty'));
            echo $form->error($model, 'parent_id');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'path', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'path');
            echo $form->error($model, 'path');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'position', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'position');
            echo $form->error($model, 'position');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'level', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'level');
            echo $form->error($model, 'level');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'image', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'image');
            echo $form->error($model, 'image');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'description', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textArea($model, 'description');
            echo $form->error($model, 'description');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'sort_order', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'sort_order');
            echo $form->error($model, 'sort_order');
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
    <div class="controls">
        <?php echo CHtml::submitButton($model->isNewRecord? 'Create' : 'Save', array('class'=>'btn btn-success'));?>
    </div>
    <?php $this->endWidget();?>
</div>
<div class="span8">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'News-form',
        'htmlOptions'=>array('class'=>'form-horizontal'),
        'enableAjaxValidation'=>false,
    ));
    ?>
    
    <div class="note">Fields with <span class="required">*</span> are required.</div>
    <div class="control-group">
        <?php
        echo $form->labelEx($model, 'title', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->textField($model, 'title');
        echo $form->error($model, 'title');
        echo '</div>';        
        ?>
    </div>
    
    <div class="control-group">
        <?php
        echo $form->labelEx($model, 'summary', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->textArea($model, 'summary');
        echo $form->error($model, 'summary');
        echo '</div>';        
        ?>
    </div>
    <div class="control-group">
        <?php
        echo $form->labelEx($model, 'content', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->textArea($model, 'content');
        echo $form->error($model, 'content');
        echo '</div>';        
        ?>
    </div>

    <div class="control-group">
        <?php
        echo $form->labelEx($model, 'status', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->dropDownList($model, 'status', News::getStatusOptions());
        echo $form->error($model, 'status');
        echo '</div>';        
        ?>
    </div>
    <div class="control-group">
        <?php
        echo $form->labelEx($model, 'is_event', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->checkBox($model, 'is_event', News::getStatusOptions());
        echo $form->error($model, 'is_event');
        echo '</div>';        
        ?>
    </div>
        <div class="controls">
        <?php echo Chtml::submitButton($model->isNewRecord? 'Create' : 'Save', array('class'=>'btn btn-success'));?>
    </div>
    <?php $this->endWidget();?>
</div>

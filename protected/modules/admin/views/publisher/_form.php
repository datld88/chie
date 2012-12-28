<div class="span6">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'publisher-form',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal'),
    ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required</p>
    <?php echo $form->errorSummary($model); ?>
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
            echo $form->labelEx($model, 'status', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'status', Publisher::model()->getStatusOptions());
            echo $form->error($model, 'status');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'is_vip', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'is_vip', Publisher::model()->getVipOptions());
            echo $form->error($model, 'is_vip');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'address', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'address');
            echo $form->error($model, 'address');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'phone', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'phone');
            echo $form->error($model, 'phone');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'hotline', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'hotline');
            echo $form->error($model, 'hotline');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'website', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'website');
            echo $form->error($model, 'website');
            echo '</div>';
        ?>
    </div>
    <div class="controls">
        <?php echo CHtml::submitButton($model->isNewRecord? 'Create' : 'Save', array('class'=>'btn btn-success'));?>
    </div>
    <?php $this->endWidget();?>
</div>
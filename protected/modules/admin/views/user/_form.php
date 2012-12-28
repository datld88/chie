

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        'enableAjaxValidation'=>false,
    ));?>
    
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model);?>
    <div class="row">
        <?php 
            echo $form->labelEx($model, 'username');
            echo $form->textField($model, 'username');
            echo $form->error($model, 'username');
            ?>
    </div>
    <div class="row">
        <?php
            echo $form->labelEx($model, 'password');
            echo $form->passwordField($model, 'password');
            echo $form->error($model, 'password');
        ?>
    </div>
    <div class="row">
        <?php
            echo $form->labelEx($model, 'is_admin');
            echo $form->dropDownList($model, 'is_admin', 
                    User::model()->getAdminOptions());
            echo $form->error($model, 'is_admin');
        ?>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord? 'Create':'Save');?>
    </div>
    <?php $this->endWidget();?>
</div>
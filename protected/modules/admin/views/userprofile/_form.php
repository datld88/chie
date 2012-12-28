<!--Form để tạo/sửa user profile -->
<div class="span8">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'userprofile-form',
        'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data'),
        'enableAjaxValidation'=>false,
    ));
    ?>
<?php echo $form->errorSummary($model);?>
<div class="control-group">
    <?php
        echo $form->labelEx($model, 'full_name', array('class'=>'control-label'));
        echo '<div class="controls">';
        echo $form->textField($model, 'full_name');
        echo $form->error($model, 'full_name');
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
            echo $form->labelEx($model, 'email', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->textField($model, 'email');
            echo $form->error($model, 'email');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'geneder', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'gender', 
                    UserProfile::model()->getGenderOptions());
            echo $form->error($model, 'gender');
            echo '</div>';
            ?>
    </div>
    <div class="control-group">
        <?php
            echo $form->labelEx($model, 'birthday', array('class'=>'control-label'));
            echo '<div class="controls">';
            $this->widget('zii.widgets.jui.CJuiDatePicker',
                    array(
                        'model'=>$model,
                        'attribute'=>'birthday',
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
            echo $form->error($model, 'birthday');
            echo '</div>';
        ?>
    </div>
    <div class="control-group">
        <?php 
            echo $form->labelEx($model, 'city_id', array('class'=>'control-label'));
            echo '<div class="controls">';
            echo $form->dropDownList($model, 'city_id', City::model()->getCityList());
            echo $form->error($model, 'city_id');
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
        <div class="control-group">
            <?php echo $form->hiddenField($model, 'user_id', array('value'=>$user_id));?>
        </div>
        
        <!--Upload avatar -->
        <div class="control-group">
            <?php echo $form->labelEx($model, 'avatar', array('class'=>'control-label'));?>
            <div class="controls">
                <?php
                    $this->widget('xupload.XUpload', array(
                        'url'=>Yii::app()->createUrl('/admin/userprofile/create/id/'.$user_id),
                        'model'=>$photos,
                        'attribute'=>'file',
                        'multiple'=>false,
                    ))
                ?>
            </div>
        </div>
        
        <!--Submit -->
    <div class="controls">
        <?php echo Chtml::submitButton($model->isNewRecord? 'Create' : 'Save', array('class'=>'btn btn-success'));?>
    </div>
<?php
$this->endWidget();
?>
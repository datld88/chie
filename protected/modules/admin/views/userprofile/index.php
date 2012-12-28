<?php 
/*
$this->menu=array(
    )),
); 
 * 
 */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('userprofile-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'userprofile-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    //'htmlOptions'=>array('class'=>'table table-bordered table-hover'),
    'columns'=>array(
        //load user name
        array(
            'name'=>'user_id',
            'value'=>'$data->user->username',
        ),
        
        //Load User Profile
        'full_name',
        'phone',
        'gender',
        array(
            'name'=>'birthday',
            'value'=>'date_format(date_create_from_format("Y-m-d", $data->birthday), "M j, Y")',
        ),
        'city_id',
        'address',
        'email',
        array(
            'name'=>'created_at',
            'value'=>'date("r", $data->created_at)',
        ),
        array(
            'name'=>'updated_at',
            'value'=>'date("r", $data->updated_at)',
        ),
        array(
            'header'=>'Actions',
            'class'=>'CButtonColumn',
        ),
    ),
    'itemsCssClass'=>'table table-filter table-bordered table-hover',
    'summaryCssClass'=>'span4',
));
?>
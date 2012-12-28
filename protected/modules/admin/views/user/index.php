<?php 
/*
$this->menu=array(
    array('label'=>'Quản Lý User', 'url'=>'index', 'items'=>array(
        array('label'=>'Danh Sách', 'url'=>'index'),
        array('label'=>'Tạo Tài Khoản User', 'url'=>'create'),
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
    $.fn.yiiGridView.update('user-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'username',
        array(
            'name'=>'created_at',
            'value'=>'date("r", $data->created_at)',
        ),
        array(
            'name'=>'updated_at',
            'value'=>'date("r", $data->updated_at)',
        ),
        'is_admin',
        array(
            'header'=>'Actions',
            'class'=>'CButtonColumn',
            'template'=>'{view} {update} {delete} {CreateUserProfile}',
            'buttons'=>array(
                'CreateUserProfile'=>array(
                    'label'=>'',
                    'url'=>'Yii::app()->createUrl("/admin/userprofile/create/", array("id"=>$data->id))',
                    'imageUrl'=>'',
                    'options'=>array('class'=>'icon-user'),
                    
                ),
            ),
        ),
    ),
    'itemsCssClass'=>'table table-filter table-bordered table-hover',
    'summaryCssClass'=>'span4',
));
?>
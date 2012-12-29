<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('category-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->widget('zii.widgets.grid.CGridView', array(
   'id'=>'category-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'name',
        array(
            'name'=>'parent_id',
            'value'=>'$data->getParentName()',
        ),
        'path',
        'position',
        'level',
        'count_children',
        'description',
        'sort_order',
        'is_featured',
        array(
            'name'=>'created_at',
            'value'=>'date("F j, Y", $data->created_at)',
        ),
        array(
            'name'=>'updated_at',
            'value'=>'date("F j, Y", $data->updated_at)',
        ),
    array(
        'class'=>'CButtonColumn',
    ),
        ),
        'itemsCssClass'=>'table table-filter table-hover table-bordered',
        'summaryCssClass'=>'style="float:right"',
));
?>
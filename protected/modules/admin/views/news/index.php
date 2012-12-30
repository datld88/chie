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
    $.fn.yiiGridView.update('news-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'news-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    //'htmlOptions'=>array('class'=>'table table-bordered table-hover'),
    'columns'=>array(
        'title',
        'summary',
        'content',
        array(
            'name'=>'status',
            'value'=>'$data->getStatusString()',
        ),
        'position',
        'is_event',
        array(
            'name'=>'created_at',
            'value'=>'date("r", $data->created_at)',
        ),
        array(
            'name'=>'updated_at',
            'value'=>'date("r", $data->updated_at)',
        ),
        array(
            'class'=>'CButtonColumn',
            'header'=>'Actions',
        )
    ),
    'itemsCssClass'=>'table table-filter table-bordered table-hover',
    'summaryCssClass'=>'span4',
));
?>
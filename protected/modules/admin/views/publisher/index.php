<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('publisher-usergrid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'publisher-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=>array('class'=>'table table-bordered table-hover'),
    'columns'=>array(
        'name',
        array(
            'name'=>'status',
            'value'=>'$data->publisherStatusString()',
        ),
        'logo',
        'address',
        'phone',
        'hotline',
        'website',
        'level',
        array(
            'name'=>'is_vip',
            'value'=>'$data->publisherVipString()',
        ),
        'count_game',
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
        ),
    ),
    'itemsCssClass'=>'table table-filter table-bordered table-hover',
));
?>
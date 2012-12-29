<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('game-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'game-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'name',
        array(
            'name'=>'publisher',
            'value'=>'$data->getPublisherName()',
        ),
        'short_description',
        array(
            'name'=>'released_at',
            'value'=>'date_format(date_create_from_format("Y-m-d", $data->released_at), "M j, Y")',
        ),
        'rate_point',
        'is_hot',
        'is_featured',
        'count_game',
        'count_news',
        'count_user_rated',
        'playnow_title',
        array(
            'header'=>'Actions',
            'class'=>'CButtonColumn',
        ),
    ),
    'itemsCssClass'=>'table table-filter table-bordered table-hover',
    'summaryCssClass'=>'span4',
));
?>

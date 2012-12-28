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
<div class ="btn-group" style="float:right">    
        <a href="<?php echo Yii::app()->createUrl('/admin/publisher/create');?>" class="btn btn-primary"><i class="icon-plus icon-white"></i>Thêm</a>
</div>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'publisher-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=>array('class'=>'table table-bordered table-hover'),
    'columns'=>array(
        'name',
        'status',
        'logo',
        'address',
        'phone',
        'hotline',
        'website',
        'level',
        'is_vip',
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
        )
    ),
));
?>
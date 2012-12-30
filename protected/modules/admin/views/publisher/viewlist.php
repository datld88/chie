
<h3><b><?php echo Chtml::encode($data->getAttributeLabel('name'));?>:</b>
    <?php echo Chtml::link(Chtml::encode($data->name), Yii::app()->createUrl('/admin/game/view/id/'.$data->id));?>
</h3>
    
    <p><strong><?php echo Chtml::encode($data->getAttributeLabel('short_description'));?>:</strong>
    <?php echo Chtml::encode($data->short_description)?></p>
    
    <p><strong><?php echo $data->getAttributeLabel('released_at');?>:</strong>
        <?php echo date_format(date_create_from_format("Y-m-d", $data->released_at), "M j, Y");?></p>
    <p><strong><?php echo $data->getAttributeLabel('rate_point');?>:</strong>
        <?php echo $data->rate_point;?></p>
    
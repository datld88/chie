<div class="tabble">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Publisher Profile</a></li>
        <li><a href="#tab2" data-toggle="tab">Publisher's Games</a></li>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane active row-fluid" id="tab1">
             <?php
             $Labels=$publisher->attributeLabels();
            echo '<div style="border:1px solid black; height:300px;width:300px;float:right;"><img src="',
                     $publisher->logo_path, $publisher->logo, '" height="300" width="300"></div>';
             echo '<h3>', $Labels['name'], ': ', $publisher->name, '</h3>';
             echo '<p>', $Labels['status'], ': ', $publisher->publisherStatusString(), '</p>';
             echo '<p>', $Labels['is_vip'], ': ', $publisher->publisherVipString(), '</p>';
             echo '<address>', $Labels['address'], ': </br>';
             echo $publisher->address, '</br>';
             echo '<abbr title="', $Labels['phone'], '">P: </abbr>', $publisher->phone, '</br>';
             echo '<abbr title="', $Labels['hotline'], '">H: </abbr>', $publisher->hotline, '</br>';
             echo '<abbr title="', $Labels['website'], '">W: </abbr>', $publisher->website, '</br>';
             echo '</address>';
             echo '<p>', $Labels['level'], ': ', $publisher->level, '</p>'; 
             echo '<p>', $Labels['count_game'], ': ', $publisher->count_game, '</p>';
             ?>
        </div>
        
        <div class="tab-pane row-fluid" id="tab2">
            <?php 
                if(empty($publisher->games))
                    echo '<h3>Publisher chưa có game nào trong hệ thống</h3>';
                else{
                    $this->widget('zii.widgets.grid.CGridView', array(
                       'id'=>'game-grid',
                        'dataProvider'=>$publisher->games,
                        'htmlOptions'=>array('class'=>'table table-bordered table-hover'),
                        'columns'=>array(
                            'name',
                            'short_description',
                            
                            array('class'=>'CButtonColumn'),
                        ),
                        'itemsCssClass'=>'table talbe-bordered talbe-hover',
                    ));
                }
            ?>
        </div>
    </div>
</div>
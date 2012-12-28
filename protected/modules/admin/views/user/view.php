<?php

?>
<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Tài Khoản</a></li>
        <li><a href="#tab3" data-toggle="tab">Log Comment</a></li>
        <li><a href="#tab4" data-toggle="tab">Log Play Game</a></li>
        <li><a href="#tab5" data-toggle="tab">Log Rate Game</a></li>
        <li><a href="#tab6" data-toggle="tab">Log Payment</a></li>
        <li><a href="#tab7" data-toggle="tab">Log Other</a></li>
        <li><a href="#tab8" data-toggle="tab">Friendship</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active row-fluid" id="tab1">
            <div class="span4">
            <?php
                echo '<h3>Username: ', $user->username, '</h3>';
                echo '<p>Ngày Khởi Tạo: ', date('r', $user->created_at), '</p>';
                echo '<p>Ngày Thay Đổi Gần Nhất: ', date('r', $user->updated_at), '</p>';
                echo '<p>Phân Quyền Admin: ', ($user->is_admin? 'Có':'Không'), '</p>';
            ?>
            </div>
            <div class="span6">
                <?php
                if(empty($user->userProfile))
                    echo '<h3>User chưa tạo profile</h3>';
                else{
                    echo '<h3>Full Name: ', $user->userProfile->full_name, '</h3>';
                    echo '<div class="span4 offset12"><img src="', $user->userProfile->avatar, '" height="100" width="100">';
                    echo '<p>Birthday: ', $user->userProfile->birthday, '</p>';
                    //echo '<p>Giới Tính: ', UserProfile::getGender, 
                }
                
                
                ?>
            </div>
            
            </div>
        
        <div class="tab-pane" id="tab2">
            <div class="row-fluid">
            </div>
        </div>
    </div>
</div>
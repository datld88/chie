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
                $accLabels=$user->attributeLabels();
                echo '<h3>', $accLabels['username'], ': ', $user->username, '</h3>';
                echo '<p>', $accLabels['created_at'], ': ', date('r', $user->created_at), '</p>';
                echo '<p>', $accLabels['updated_at'], ': ', date('r', $user->updated_at), '</p>';
                echo '<p>', $accLabels['is_admin'], ': ', ($user->is_admin? 'Có':'Không'), '</p>';
            ?>
            </div>
            <div class="span6">
                <?php
                if(empty($user->userProfile))
                    echo '<h3>User chưa tạo profile</h3>';
                else{
                    $profileLabel=$user->userProfile->attributeLabels();
                    echo '<h3>Profile: </h3>';
                    echo '<div style="border: 1px solid black;height:100px;width:100px; float:right;"><img src="', $user->userProfile->avatar_path, $user->userProfile->avatar, '" height="100" width="100"></div>';
                    echo '<p>', $profileLabel['full_name'], ': ', $user->userProfile->full_name, '</p>';
                    echo '<p>', $profileLabel['gender'], ': ', $user->userProfile->getGenderString(), '</p>';
                    echo '<p>', $profileLabel['birthday'], ': ', $user->userProfile->birthday, '</p>';
                    //echo '<p>', $profileLabel['email'], ': ', $user->userProfile->email, '</p>';
                    echo '<address>', $profileLabel['address'], ': <br/>';
                    echo $user->userProfile->address, '<br/>';
                    echo '<abbr title="', $profileLabel['city_id'], '">C:</abbr> ', City::model()->findByPk($user->userProfile->city_id)->name, '<br/>';
                    echo '<abbr title="', $profileLabel['phone'], '">P:</abbr> ', $user->userProfile->phone, '<br/>';
                    echo '<abbr title="', $profileLabel['email'], '">M:</abbr> ', $user->userProfile->email, '<br/>';
                    echo '</address>';
                    echo '<p>', $profileLabel['created_at'], ': ', date('r', $user->userProfile->created_at), '</p>';
                    echo '<p>', $profileLabel['updated_at'], ': ', date('r', $user->userProfile->updated_at), '</p>';
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
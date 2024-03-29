<?php $themeAdmin = Yii::app()->getBaseUrl(true) . '/themes/admin/' ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Mucsher">

		<!-- Le styles-->
		<link href="<?php echo $themeAdmin ?>/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo $themeAdmin ?>/css/bootstrap-responsive.css" rel="stylesheet">
		<link href="<?php echo $themeAdmin ?>/js/google-code-prettify/prettify.css" rel="stylesheet">

	
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Le fav and touch icons
		<link rel="shortcut icon" href="ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $themeAdmin ?>/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $themeAdmin ?>/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $themeAdmin ?>/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo $themeAdmin ?>/ico/apple-touch-icon-57-precomposed.png">-->
	</head>

	<body data-spy="scroll" data-target=".bs-docs-sidebar">
            <div id="header" class="">
                <div class="navbar navbar-inverse">
                    <div class="navbar-inner pd0">
                        <div class="container-fluid">
                            <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="<?php echo Yii::app()->createUrl('/admin');?>" class="brand">CHIE ADMINISTRATOR</a>
                            <div class="nav-collapse collapse">
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'htmlOptions'=>array('class'=>'nav'),
                                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                                    'items' => $this->menu,
                                ));
                                ?>
                            </div>
                            <div id="logout" class="offset11">
                                <a class="btn btn-large btn-danger" href="<?php echo Yii::app()->createUrl('/admin/default/logout');?>" title="Đăng Xuất"><i class="icon-off icon-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End #header--> 
            <div id="wrap-main" class="container-fluid">
                <div class="sidebar">
                    <div class="nav-left accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Quản Lý Tài Khoản User
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse 
                                <?php if(Yii::app()->controller->id=='user' || Yii::app()->controller->id==='userprofile') {echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->action->id=='index'&&Yii::app()->controller->id=='user'){echo 'active';} ?>">
                                            <a href="<?php echo Yii::app()->createUrl('/admin/user/index'); ?>"><i class="icon icon-list"></i>Danh Sách User</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='user'){echo 'active';} ?>">
                                            <a href="<?php echo Yii::app()->createUrl('/admin/user/create'); ?>"><i class="icon icon-plus"></i>Thêm Tài Khoản User</a></li>
                                        <li class="divider"></li>                                        
                                        <li class="<?php if(Yii::app()->controller->action->id=='index' && Yii::app()->controller->id=='userprofile') echo 'active';?>">
                                            <a href="<?php echo Yii::app()->createUrl('/admin/userprofile/index');?>"><i class="icon icon-list"></i>Danh Sách User Profile</a></li>
                                        
                                        <?php if(Yii::app()->controller->action->id=='create' && Yii::app()->controller->id=='userprofile')
                                        echo '<li class="active">
                                            <a href="', Yii::app()->createUrl('/admin/userprofile/create'), '"><i class="icon icon-plus"></i>Thêm User Profile</i></a></li>';
                                        ?>    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    Quản Trị Game
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse <?php if(Yii::app()->controller->id=='game' || Yii::app()->controller->id=='category'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->action->id=='index'&&Yii::app()->controller->id=='game'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/game/index'); ?>"><i class="icon icon-list"></i>Danh Sách Game</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='game'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/game/create'); ?>"><i class="icon icon-plus"></i>Thêm Game</a></li>
                                        <li class="divider"></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='index' && Yii::app()->controller->id=='category') echo 'active';?>"><a href="<?php echo Yii::app()->createUrl('/admin/category/index');?>"><i class="icon icon-list"></i>Danh Sách Danh Mục Game</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create' && Yii::app()->controller->id=='category') echo 'active';?>"><a href="<?php echo Yii::app()->createUrl('/admin/category/create');?>"><i class="icon icon-plus"></i>Thêm Danh Mục Game</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                    Quản lý Nhà Phát Hành
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse <?php if(Yii::app()->controller->id=='publisher'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->action->id=='index'&&Yii::app()->controller->id=='publisher'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/publisher/'); ?>"><i class="icon icon-list"></i>Danh Sách Nhà Phát Hành</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='publisher'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/publisher/create'); ?>"><i class="icon icon-plus"></i>Thêm Nhà Phát Hành</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                    Quản Lý Tin Tức
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse <?php if(Yii::app()->controller->id=='news'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->id=='news' && Yii::app()->controller->action->id=='index') echo 'active';?>">
                                            <a href="<?php echo Yii::app()->createUrl('/admin/news/index'); ?>"><i class="icon icon-list"></i>Danh Sách Tin Tức</a></li>
                                        <li class="<?php if(Yii::app()->controller->id=='news' && Yii::app()->controller->action->id=='create') echo 'active';?>">
                                            <a href="<?php echo Yii::app()->createUrl('/admin/news/create'); ?>"><i class="icon icon-plus"></i>Thêm Tin Tức</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="main">
                    <div class="inner">
                        <!-- Thêm nút create -->
                        
                        <div class ="btn-group" style="float:right">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-plus icon-white"></i>
                                Thêm<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo Yii::app()->createUrl('/admin/user/create');?>">Thêm User</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/admin/userprofile/create');?>">Thêm User Profile</a>
                            </ul>
                        </div>
                        
                        <?php echo $content;?>
                    </div>
                </div>
            </div>
        
	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster-->
        <script type="text/javascript" src="<?php echo $themeAdmin;?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $themeAdmin ?>/js/google-code-prettify/prettify.js"></script>
	<script type="text/javascript" src="<?php echo $themeAdmin ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo $themeAdmin ?>/js/application.js"></script>
        <script type="text/javascript" src="<?php echo $themeAdmin; ?>js/Loading.js"></script>
        <script type="text/javascript" src="<?php echo $themeAdmin;?>js/jquery.yiigridview.js"></script>
        <script type="text/javascript" src="<?php echo $themeAdmin;?>js/jquery.ba-bbq.js"></script>
        </body>
</html>
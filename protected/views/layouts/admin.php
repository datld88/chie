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
                                            <a href="<?php echo Yii::app()->createUrl('/admin/user/create'); ?>"><i class="icon icon-pencil"></i>Thêm Tài Khoản User</a></li>
                                        <li class="divider"></li>                                        
                                        <li class="<?php if(Yii::app()->controller->action->id=='index' && Yii::app()->controller->id=='userprofile') echo 'active';?>">
                                            <a href="<?php echo Yii::app()->createUrl('/admin/userprofile/index');?>"><i class="icon icon-list"></i>Danh Sách User Profile</a></li>
                                        
                                        <?php if(Yii::app()->controller->action->id=='create' && Yii::app()->controller->id=='userprofile')
                                        echo '<li class="active">
                                            <a href="', Yii::app()->createUrl('/admin/userprofile/create'), '<i class="icon icon-pencil"></i>Thêm User Profile</i></a></li>';
                                        ?>    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    Tài khoản quản trị
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse <?php if(Yii::app()->controller->id=='user'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->action->id=='admin'&&Yii::app()->controller->id=='user'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/user/admin'); ?>"><i class="icon icon-list"></i>D.Sách quản trị</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='user'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/user/create'); ?>"><i class="icon icon-pencil"></i>Thêm quản trị</a></li>
                                        <li class="divider"></li>
                                        <li class=""><a href="<?php echo Yii::app()->createUrl('/rights/authItem/permissions'); ?>"><i class="icon icon-list"></i>D.Sách quyền hạn</a></li>
                                        <li class=""><a href="<?php echo Yii::app()->createUrl('/rights/assignment/view'); ?>"><i class="icon icon-pencil"></i>Thêm quyền hạn</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                    Quản lý thành viên
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse <?php if(Yii::app()->controller->id=='member' || Yii::app()->controller->id=='group'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->action->id=='admin'&&Yii::app()->controller->id=='member'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/member/admin'); ?>"><i class="icon icon-list"></i>D.Sách Thành viên</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='member'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/member/create'); ?>"><i class="icon icon-pencil"></i>Thêm Thành viên</a></li>
                                        <li class="divider"></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='admin'&&Yii::app()->controller->id=='group'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/group/admin'); ?>"><i class="icon icon-list"></i>D.Sách mảng thành viên</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='group'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/group/create'); ?>"><i class="icon icon-pencil"></i>Thêm mảng thành viên</a></li>
                                        <li class="divider"></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='employer'&&Yii::app()->controller->id=='member'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/member/employer'); ?>"><i class="icon icon-list"></i>D.Sách TV ban điều hành</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='createemployer'&&Yii::app()->controller->id=='member'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/member/createemployer'); ?>"><i class="icon icon-pencil"></i>Thêm TV ban điều hành</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                    Banner & Video
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse <?php if(Yii::app()->controller->id=='banner'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class=""><a href="<?php echo Yii::app()->createUrl('/admin/banner/admin'); ?>"><i class="icon icon-list"></i>D.Sách banner</a></li>
                                        <li class=""><a href="<?php echo Yii::app()->createUrl('/admin/banner/create'); ?>"><i class="icon icon-pencil"></i>Thêm Banner</a></li>
                                        <li class="divider"></li>
                                        <li class=""><a href="<?php echo Yii::app()->createUrl('/admin/video/admin'); ?>"><i class="icon icon-list"></i>D.Sách Video</a></li>
                                        <li class=""><a href="<?php echo Yii::app()->createUrl('/admin/video/create'); ?>"><i class="icon icon-pencil"></i>Thêm Video</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                                    Menu & Footer
                                </a>
                            </div>
                            <div id="collapseFive" class="accordion-body collapse <?php if(Yii::app()->controller->id=='menu'){echo 'in';} ?>">
                                <div class="accordion-inner">
                                    <ul class="sub-menu">
                                        <li class="<?php if(Yii::app()->controller->action->id=='index'&&Yii::app()->controller->id=='menu'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/menu/index'); ?>"><i class="icon icon-list"></i>D.Sách Menu</a></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='create'&&Yii::app()->controller->id=='menu'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/menu/create'); ?>"><i class="icon icon-pencil"></i>Thêm menu</a></li>
                                        <li class="divider"></li>
                                        <li class="<?php if(Yii::app()->controller->action->id=='updatefooter'&&Yii::app()->controller->id=='menu'){echo 'active';} ?>"><a href="<?php echo Yii::app()->createUrl('/admin/menu/updatefooter'); ?>"><i class="icon icon-pencil"></i>Sửa footer</a></li>
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
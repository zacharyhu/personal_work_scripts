<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<?php Yii::app()->bootstrap->register(); ?>
				<?php 
				if (!Yii::app()->user->isGuest){
					$show_name  = GpDcUser::model()->getUserName(Yii::app()->user->name);
					$user_id =GpDcUser::model()->getUserId(Yii::app()->user->name);
				}else{
					$show_name = Yii::app()->user->name;
					$user_id = '0';
				}
				$this->widget('bootstrap.widgets.TbNavbar', array(
                      'type'=>'inverse', // null or 'inverse'
                      'brand'=>  CHtml::encode(Yii::app()->name),
                      'brandUrl'=> $this->createAbsoluteUrl('//'),
                      'collapse'=>true, // requires bootstrap-responsive.css
                      'items'=>array(
                                    array(
                                          'class'=>'bootstrap.widgets.TbMenu',
                                          'items'=>array(
						                         array('label'=>'Home', 'url'=>array('/site/index')),
             		                             array('label'=>'运营数据分析', 'url'=>'#', 'items'=>array(
             		    	                           array("label"=>"每日收入汇总数据","url"=>array("GpDcDailyTurnover/viewlist")),
             		                             	   array("label"=>"每日游戏表现数据","url"=>array("GpDcDailyGameActive/viewlist")),
             		                             	   array("label"=>"每日用户表现数据","url"=>array("GpDcDailyUserReport/viewlist")),
             		    	                           array("label"=>"管理每月收入","url"=>array("GpDcMonthlyTurnover/viewlist")),
             		    	                           array("label"=>"管理每月用户数据","url"=>array("GpDcMonthlyUserReport/viewlist")),
             		    	                           array("label"=>"管理每月游戏表现数据","url"=>array("GpDcMonthlyGameActive/viewlist")),
             		    		                       ),"visible"=>Yii::app()->user->checkAccess('运营角色'),
             		                             		),
                                          		array('label'=>'用户查询功能', 'url'=>'#', 'items'=>array(
                                          				array("label"=>"充值详单记录查询(新)","url"=>array('/site/page', 'view'=>'build')),
                                          				array("label"=>"用户信息表查询","url"=>array('/site/page', 'view'=>'build')),
                                          				array("label"=>"游戏点变更记录查询","url"=>array('/site/page', 'view'=>'build')),
                                          				array("label"=>"往期历史充值记录","url"=>array('/site/page', 'view'=>'build')),
                                          				array("label"=>"用户限额查询","url"=>array('/site/page', 'view'=>'build')),
                                          		),"visible"=>Yii::app()->user->checkAccess('客服角色'),
                                          		),
                                          		array('label'=>'系统管理', 'url'=>'#', 'items'=>array(
                                          				array("label"=>"用户管理","url"=>array("GpDcUser/admin"),),
														array("label"=>"权限分配","url"=>array("srbac/authitem/manage"),"visible"=>Yii::app()->user->checkAccess('Authority'),),	
                                          		),"visible"=>Yii::app()->user->checkAccess('管理员'),
                                          		),
                                          		array('label'=>'所有地址汇总', 'url'=>array('/site/page', 'view'=>'build'),'visible'=>!Yii::app()->user->isGuest,
                                          		),
						                        array('label'=>'关于', 'url'=>array('/site/page', 'view'=>'about')),
						                        //array('label'=>'Contact', 'url'=>array('/site/contact')),
						                        array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
             		                            ),
                                          ),
                                    
						
						       array(
								    'class'=>'bootstrap.widgets.TbMenu',
								    'htmlOptions'=>array('class'=>'pull-right'),
								    'items'=>array(
										    array('label'=>'HI，'.$show_name, 'url'=>array('GpDcUser/updateself','id'=>$user_id), 'visible'=>!Yii::app()->user->isGuest),
										    array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
								     ),
						             ),
						        ),
						 ));
						?>

			</div>
		</div>
	</div>
	
	<div class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('BBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>' / ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	</div>
	
	<?php echo $content; ?>
	
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; <?php echo date('Y'); ?> by 游戏基地.<br/>
			All Rights Reserved.<br/>
		</div>
	</footer>
	
</body>
</html>
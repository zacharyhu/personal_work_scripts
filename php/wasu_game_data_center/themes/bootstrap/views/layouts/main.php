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
             		    		                       ),
             		                             		),
						                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
						                        array('label'=>'Contact', 'url'=>array('/site/contact')),
						                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
             		                            ),
                                          ),
                                    
						
						       array(
								    'class'=>'bootstrap.widgets.TbMenu',
								    'htmlOptions'=>array('class'=>'pull-right'),
								    'items'=>array(
										    array('label'=>Yii::app()->user->name, 'url'=>array('site/profile'), 'visible'=>!Yii::app()->user->isGuest),
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
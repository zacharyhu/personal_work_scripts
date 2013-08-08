<?php $this->beginContent('//layouts/maindc'); ?>
<div class="container">
	<div class="appcontent">
<?php if($this->pageCaption !== '') : ?>
		<div class="page-header">
			<h1><?php echo CHtml::encode($this->pageCaption); ?> <small><?php echo CHtml::encode($this->pageDescription)?></small></h1>
		</div>
<?php endif; ?>
		<div class="row">
			<div class="span8">
				<?php echo $content; ?>
			</div>
			<div class="span4">
				<h3><?php echo CHtml::encode($this->sidebarCaption); ?></h3>
				<?php
					$this->beginWidget('zii.widgets.CPortlet', array(
						'title'=>'Operations',
					));
					$this->widget('zii.widgets.CMenu', array(
						'items'=>$this->menu,
						'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					$this->beginWidget('zii.widgets.CPortlet', array(
							'title'=>'收入报表',
					));
					$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array("label"=>"管理每日收入","url"=>array("GpDcDailyTurnover/admin")),
									array("label"=>"管理每月收入","url"=>array("GpDcMonthlyTurnover/admin")),
							),
							'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					$this->beginWidget('zii.widgets.CPortlet', array(
							'title'=>'用户表现',
					));
					$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array("label"=>"管理每日用户数据","url"=>array("GpDcDailyUserReport/admin")),
									array("label"=>"管理每月用户数据","url"=>array("GpDcMonthlyUserReport/admin")),
							),
							'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					$this->beginWidget('zii.widgets.CPortlet', array(
							'title'=>'游戏表现',
					));
					$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array("label"=>"管理游戏表现数据","url"=>array("GpDcDailyGameActive/admin")),
									array("label"=>"管理游戏表现数据","url"=>array("GpDcMonthlyGameActive/admin")),
							),
							'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					$this->beginWidget('zii.widgets.CPortlet', array(
							'title'=>'管理CPcode',
					));
					$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array("label"=>"adminCP信息","url"=>array("tvGpCfgCpInfo/admin"),'visible'=>'1'),
							),
							'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					$this->beginWidget('zii.widgets.CPortlet', array(
							'title'=>'管理actionID',
					));
					$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array("label"=>"adminACTION信息","url"=>array("tvGpCfgAction/admin")),
							),
							'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
					
					$this->beginWidget('zii.widgets.CPortlet', array(
							'title'=>'管理大厅ID',
					));
					$this->widget('zii.widgets.CMenu', array(
							'items'=>array(
									array("label"=>"大厅id","url"=>array("tvGpCfgGameLobbyInfo/admin")),
							),
							'htmlOptions'=>array('class'=>'operations'),
					));
					$this->endWidget();
				?>
			</div>
		</div>
	</div>
</div> <!-- /container -->
<?php $this->endContent(); ?>
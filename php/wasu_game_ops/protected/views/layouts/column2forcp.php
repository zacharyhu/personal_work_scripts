<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main2'); ?>



<div class="span-19">

	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	
	<?php
	

	$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'CP日常进度日志',
	));
	$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
					array('label'=>'日志列表', 'url'=>array('CpOperationLogs/index')),
					array('label'=>'新建日志', 'url'=>array('CpOperationLogs/create')),
					array('label'=>'管理日志列表', 'url'=>array('CpOperationLogs/admin')),
			),
			'htmlOptions'=>array('class'=>'operations'),
	));
	
	
	$this->endWidget();
	
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'CP基本信息',
		));
		$this->widget('zii.widgets.CMenu', array(
 			'items'=>array(
 					array('label'=>'列表所有CP信息', 'url'=>array('CpBaseInfo/index')),
 					array('label'=>'新建CP信息', 'url'=>array('CpBaseInfo/create')),
 					array('label'=>'管理CP信息', 'url'=>array('CpBaseInfo/admin')),
 					),
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Cp联系人',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
		array('label'=>'列表所有联系人', 'url'=>array('CpContactInfo/index')),
		array('label'=>'新建联系人', 'url'=>array('CpContactInfo/create')),
		array('label'=>'管理联系人', 'url'=>array('CpContactInfo/admin')),
                ),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'游戏列表',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array('label'=>'所有游戏列表', 'url'=>array('CpGameInfo/index')),
						array('label'=>'新建游戏', 'url'=>array('CpGameInfo/create')),
						array('label'=>'管理游戏', 'url'=>array('CpGameInfo/admin')),
				),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'大厅列表',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array('label'=>'大厅列表', 'url'=>array('CpGameInfo/index')),
						array('label'=>'新建大厅', 'url'=>array('CpGameInfo/create')),
						array('label'=>'管理大厅', 'url'=>array('CpGameInfo/admin')),
				),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'游戏状态列表',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array('label'=>'游戏状态列表', 'url'=>array('CpGameInfo/index')),
						array('label'=>'新建游戏状态', 'url'=>array('CpGameInfo/create')),
						array('label'=>'管理游戏状态', 'url'=>array('CpGameInfo/admin')),
				),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'机顶盒外借列表',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array('label'=>'所有机顶盒列表', 'url'=>array('CpTvBoxInfo/index')),
						array('label'=>'新建机顶盒信息', 'url'=>array('CpTvBoxInfo/create')),
						array('label'=>'管理机顶盒', 'url'=>array('CpTvBoxInfo/admin')),
				),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'CP资源列表',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array('label'=>'CP资源列表', 'url'=>array('CpResourceInfo/index')),
						array('label'=>'新建CP资源', 'url'=>array('CpResourceInfo/create')),
						array('label'=>'管理', 'url'=>array('CpResourceInfo/admin')),
				),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		

		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'用户管理',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array('label'=>'新建用户', 'url'=>array('OpsUser/create')),
						array('label'=>'用户管理', 'url'=>array('OpsUser/admin')),
				),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
	?>
	
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>
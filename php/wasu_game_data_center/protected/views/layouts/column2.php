<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
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
				'title'=>'每日收入',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
				  array("label"=>"admin daily turnover","url"=>array("dailyTurnover/admin")),		
                 ),
				'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'管理CPcode',
		));
		$this->widget('zii.widgets.CMenu', array(
				'items'=>array(
						array("label"=>"adminCP信息","url"=>array("tvGpCfgAction/admin")),
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
	</div><!-- sidebar -->
</div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
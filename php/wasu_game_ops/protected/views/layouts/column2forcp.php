<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'可执行操作',
		));
		$this->widget('zii.widgets.CMenu', array(
 			'items'=>$this->menu,
//             'items'=>array(
//                 array('label'=>'CP信息', 'url'=>array('/CpBaseInfo/', 'view'=>'index')),
//                 array('label'=>'CP联系人信息', 'url'=>array('/CpContactInfo/', 'view'=>'index')),
//                 array('label'=>'CP游戏信息', 'url'=>array('/CpGameInfo/', 'view'=>'index')),
//                 array('label'=>'CP资源信息', 'url'=>array('/CpResourceInfo/', 'view'=>'index')),
//                 array('label'=>'机顶盒设备外借信息', 'url'=>array('/CpTvBoxInfo/', 'view'=>'index')),

//              ),
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>
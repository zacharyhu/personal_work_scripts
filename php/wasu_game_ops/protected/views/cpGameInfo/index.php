<?php
/* @var $this CpGameInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'CP游戏信息',
);

$this->menu=array(
	array('label'=>'新建  游戏信息', 'url'=>array('create')),
	array('label'=>'管理  游戏信息', 'url'=>array('admin')),
);
?>

<h1>CP游戏信息</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

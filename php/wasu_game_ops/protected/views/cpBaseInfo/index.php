<?php
/* @var $this CpBaseInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'游戏CP基本信息',
);

$this->menu=array(
	array('label'=>'新建Cp基本信息', 'url'=>array('create')),
	array('label'=>'管理所有CP信息', 'url'=>array('admin')),
);
?>

<h1>游戏厂商基本信息查询</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

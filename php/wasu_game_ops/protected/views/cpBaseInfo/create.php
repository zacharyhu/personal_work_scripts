<?php
/* @var $this CpBaseInfoController */
/* @var $model CpBaseInfo */

$this->breadcrumbs=array(
	'游戏CP基本信息'=>array('index'),
	'新建',
);

$this->menu=array(
	array('label'=>'列表所有CP信息', 'url'=>array('index')),
	array('label'=>'管理所有CP信息', 'url'=>array('admin')),
);
?>

<h1>新建CP基本信息</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CpBaseInfoController */
/* @var $model CpBaseInfo */

$this->breadcrumbs=array(
	'游戏CP基本信息'=>array('index'),
	$model->cp_name=>array('view','id'=>$model->cp_id),
	'更新',
);

$this->menu=array(
	array('label'=>'列表所有CP信息', 'url'=>array('index')),
	array('label'=>'新建Cp基本信息', 'url'=>array('create')),
	array('label'=>'查看该CP基本信息', 'url'=>array('view', 'id'=>$model->cp_id)),
	array('label'=>'管理所有CP信息', 'url'=>array('admin')),
);
?>

<h1>更新Cp基本信息 <?php echo $model->cp_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
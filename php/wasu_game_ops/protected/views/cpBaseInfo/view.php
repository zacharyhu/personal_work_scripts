<?php
/* @var $this CpBaseInfoController */
/* @var $model CpBaseInfo */

$this->breadcrumbs=array(
	'游戏CP基本信息'=>array('index'),
	$model->cp_name,
);

$this->menu=array(
	array('label'=>'列表所有CP信息', 'url'=>array('index')),
	array('label'=>'新建Cp基本信息', 'url'=>array('create')),
	array('label'=>'更新该CP信息', 'url'=>array('update', 'id'=>$model->cp_id)),
	array('label'=>'删除该CP信息', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'管理所有CP信息', 'url'=>array('admin')),
);
?>

<h1>查看 Cp基础信息   #<?php echo $model->cp_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
// 		'cp_id',
		'cp_name',
		'cpcode',
		'create_time',
		'update_time',
		'cp_desc',
		//'cp_status',
		array('label'=>'厂商状态','value'=>CpBaseInfo::model()->getCPStatus($model->cp_status)),
	),
)); ?>

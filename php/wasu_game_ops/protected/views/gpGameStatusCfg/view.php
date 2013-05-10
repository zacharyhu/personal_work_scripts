<?php
/* @var $this GpGameStatusCfgController */
/* @var $model GpGameStatusCfg */

$this->breadcrumbs=array(
	'Gp Game Status Cfgs'=>array('index'),
	$model->ip,
);

$this->menu=array(
	array('label'=>'List GpGameStatusCfg', 'url'=>array('index')),
	array('label'=>'Create GpGameStatusCfg', 'url'=>array('create')),
	array('label'=>'Update GpGameStatusCfg', 'url'=>array('update', 'id'=>$model->ip)),
	array('label'=>'Delete GpGameStatusCfg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ip),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GpGameStatusCfg', 'url'=>array('admin')),
);
?>

<h1>View GpGameStatusCfg #<?php echo $model->ip; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ip',
		'game_status',
		'status_name',
	),
)); ?>

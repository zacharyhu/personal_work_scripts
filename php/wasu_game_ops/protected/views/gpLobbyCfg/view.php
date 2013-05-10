<?php
/* @var $this GpLobbyCfgController */
/* @var $model GpLobbyCfg */

$this->breadcrumbs=array(
	'Gp Lobby Cfgs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GpLobbyCfg', 'url'=>array('index')),
	array('label'=>'Create GpLobbyCfg', 'url'=>array('create')),
	array('label'=>'Update GpLobbyCfg', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpLobbyCfg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GpLobbyCfg', 'url'=>array('admin')),
);
?>

<h1>View GpLobbyCfg #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'game_lobby',
		'lobby_name',
	),
)); ?>

<?php
/* @var $this CpGameInfoController */
/* @var $model CpGameInfo */

$this->breadcrumbs=array(
	'Cp Game Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CpGameInfo', 'url'=>array('index')),
	array('label'=>'Create CpGameInfo', 'url'=>array('create')),
	array('label'=>'Update CpGameInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpGameInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpGameInfo', 'url'=>array('admin')),
);
?>

<h1>View CpGameInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cp_id',
		'game_name',
		'game_id',
		'game_cp_code',
		'game_action_id',
		'game_desc',
		'game_status',
		'game_lobby',
		'game_server_ip',
		'game_server_port',
	),
)); ?>

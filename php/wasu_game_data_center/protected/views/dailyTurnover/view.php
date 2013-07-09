<?php
/* @var $this DailyTurnoverController */
/* @var $model DailyTurnover */

$this->breadcrumbs=array(
	'Daily Turnovers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DailyTurnover', 'url'=>array('index')),
	array('label'=>'Create DailyTurnover', 'url'=>array('create')),
	array('label'=>'Update DailyTurnover', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DailyTurnover', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DailyTurnover', 'url'=>array('admin')),
);
?>

<h1>View DailyTurnover #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'lobby_id',
		'cp_code',
		'action_id',
		'sum',
		'user_no',
		'user_time',
		'arpu',
	),
)); ?>

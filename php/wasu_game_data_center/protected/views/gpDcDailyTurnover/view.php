<?php
$this->pageCaption='View GpDcDailyTurnover #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Daily Turnovers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Turnovers', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyTurnover', 'url'=>array('create')),
	array('label'=>'Update GpDcDailyTurnover', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpDcDailyTurnover', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gp Dc Daily Turnovers', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id',
		'l_date',
		'lobby_id',
		'cp_code',
		'action_id',
		'sum',
		'user_no',
		'user_time',
		'arpu',
	),
)); ?>

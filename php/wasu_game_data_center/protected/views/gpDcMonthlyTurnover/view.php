<?php
$this->pageCaption='View GpDcMonthlyTurnover #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Monthly Turnovers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly Turnovers', 'url'=>array('index')),
	array('label'=>'Create GpDcMonthlyTurnover', 'url'=>array('create')),
	array('label'=>'Update GpDcMonthlyTurnover', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpDcMonthlyTurnover', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gp Dc Monthly Turnovers', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id',
		'month',
		'lobby_id',
		'cp_code',
		'action_id',
		'sum',
		'user_no',
		'user_time',
		'arpu',
	),
)); ?>

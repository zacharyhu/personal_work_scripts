<?php
$this->pageCaption='View GpDcMonthlyUserReport #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Monthly User Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly User Reports', 'url'=>array('index')),
	array('label'=>'Create GpDcMonthlyUserReport', 'url'=>array('create')),
	array('label'=>'Update GpDcMonthlyUserReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpDcMonthlyUserReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gp Dc Monthly User Reports', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'id',
		'l_month',
		'lobby_id',
		'user_login_num',
		'user_login_time',
		'user_register',
		'user_new',
		'beyond_5',
		'beyond_10',
		'beyond_15',
		'beyond_20',
		'beyond_25',
	),
)); ?>

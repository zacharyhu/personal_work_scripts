<?php
$this->pageCaption='View GpDcDailyUserReport #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Daily User Reports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily User Reports', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyUserReport', 'url'=>array('create')),
	array('label'=>'Update GpDcDailyUserReport', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpDcDailyUserReport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gp Dc Daily User Reports', 'url'=>array('admin')),
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
		'user_login_num',
		'user_login_time',
		'user_register',
		'user_new',
	),
)); ?>

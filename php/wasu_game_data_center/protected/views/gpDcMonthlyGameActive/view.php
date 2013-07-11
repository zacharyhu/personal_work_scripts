<?php
$this->pageCaption='View GpDcMonthlyGameActive #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Monthly Game Actives'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly Game Actives', 'url'=>array('index')),
	array('label'=>'Create GpDcMonthlyGameActive', 'url'=>array('create')),
	array('label'=>'Update GpDcMonthlyGameActive', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpDcMonthlyGameActive', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gp Dc Monthly Game Actives', 'url'=>array('admin')),
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
		'cp_code',
		'game_id',
		'user_num',
		'user_time',
	),
)); ?>

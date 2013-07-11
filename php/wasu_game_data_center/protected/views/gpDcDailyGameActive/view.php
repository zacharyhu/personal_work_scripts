<?php
$this->pageCaption='View GpDcDailyGameActive #'.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Daily Game Actives'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Game Actives', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyGameActive', 'url'=>array('create')),
	array('label'=>'Update GpDcDailyGameActive', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GpDcDailyGameActive', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Gp Dc Daily Game Actives', 'url'=>array('admin')),
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
		'game_id',
		'user_num',
		'user_time',
	),
)); ?>

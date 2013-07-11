<?php
$this->pageCaption='Update GpDcDailyTurnover '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Daily Turnovers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Turnovers', 'url'=>array('index')),
	array('label'=>'Create GpDcDailyTurnover', 'url'=>array('create')),
	array('label'=>'View GpDcDailyTurnover', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gp Dc Daily Turnovers', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
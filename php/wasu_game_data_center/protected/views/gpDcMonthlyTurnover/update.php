<?php
$this->pageCaption='Update GpDcMonthlyTurnover '.$model->id;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Gp Dc Monthly Turnovers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly Turnovers', 'url'=>array('index')),
	array('label'=>'Create GpDcMonthlyTurnover', 'url'=>array('create')),
	array('label'=>'View GpDcMonthlyTurnover', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Gp Dc Monthly Turnovers', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
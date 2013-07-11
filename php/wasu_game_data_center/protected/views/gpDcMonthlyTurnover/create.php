<?php
$this->pageCaption='Create GpDcMonthlyTurnover';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new gpdcmonthlyturnover';
$this->breadcrumbs=array(
	'Gp Dc Monthly Turnovers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly Turnovers', 'url'=>array('index')),
	array('label'=>'Manage Gp Dc Monthly Turnovers', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
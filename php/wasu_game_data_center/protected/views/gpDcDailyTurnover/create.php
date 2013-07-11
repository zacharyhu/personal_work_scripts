<?php
$this->pageCaption='Create GpDcDailyTurnover';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new gpdcdailyturnover';
$this->breadcrumbs=array(
	'Gp Dc Daily Turnovers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily Turnovers', 'url'=>array('index')),
	array('label'=>'Manage Gp Dc Daily Turnovers', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
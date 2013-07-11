<?php
$this->pageCaption='Create GpDcDailyUserReport';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new gpdcdailyuserreport';
$this->breadcrumbs=array(
	'Gp Dc Daily User Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gp Dc Daily User Reports', 'url'=>array('index')),
	array('label'=>'Manage Gp Dc Daily User Reports', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
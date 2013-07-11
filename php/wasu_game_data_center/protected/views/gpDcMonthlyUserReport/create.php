<?php
$this->pageCaption='Create GpDcMonthlyUserReport';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new gpdcmonthlyuserreport';
$this->breadcrumbs=array(
	'Gp Dc Monthly User Reports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Gp Dc Monthly User Reports', 'url'=>array('index')),
	array('label'=>'Manage Gp Dc Monthly User Reports', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>